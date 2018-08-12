<?php
# for Active Customers
$acc = 0;
$week = 604800;
foreach ($customer as $customer1){
    $date1 = $this->item_model->max('user_log', 'customer_id = ' . $customer1->customer_id, 'date');
    $active_identifier1 = time() - $date1->date;
    if ($active_identifier1 < $week)
        $acc++;
}

$total_action = 0;
$image = $this->item_model->fetch("content", array("content_id" => 1))[0];
if (isset($_POST["generate_pdf"])) {
    $space = str_repeat(" ", 65);
    $temp = unserialize($_POST["pdf"]);
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetTitle("Weekly Active Customers Report");
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $pdf->SetDefaultMonospacedFont('Deja Vu Sans Mono');
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    $pdf->SetAutoPageBreak(TRUE, 10);
    $pdf->SetFont('Deja Vu Sans Mono', '', 8);
    $pdf->AddPage();
    $content = '';
    $content .= '
    ' . $pdf->Image($this->config->base_url() . 'assets/ordering/img/' . $image->company_logo, 54, 8, 0, 15, '', '', '', true, 300, 'C') . $pdf->Cell(0, 0, 'Grass Residences,Unit 1717-B' . $space . date("F j, Y"), 0, 1, 'L', 0, '', 0) . $pdf->Cell(0, 0, 'Tower 1 SMDC The,Nueva', 0, 1, 'L', 0, '', 0) . $pdf->Cell(0, 0, 'Viscaya, Bago Bantay, Quezon', 0, 1, 'L', 0, '', 0) . $pdf->Cell(0, 0, 'City, Metro Manila Philippines', 0, 1, 'L', 0, '', 0) . '
    <br><br>
    <table border="1" cellspacing="0" cellpadding="3">
    <tr>
    <th colspan="5"><h2 align="center">Weekly Active Customers Report</h2></th>
    </tr>
    <tr>
    <th align="right"><b><p>Customer</p></b></th>
    <th align="right"><b><p>Latest Login</p></b></th>
    <th align="right"><b><p>Latest Action</p></b></th>
    <th align="right"><b><p>Total Actions</p></b></th>
    <th align="right"><b><p>Status</p></b></th>
    </tr>
    ';
    foreach ($temp as $customer) {
       $date = $this->item_model->max('user_log', 'customer_id = ' . $customer->customer_id, 'date');
       $active_identifier = time() - $date->date;

       $count_action = $this->item_model->getCount("user_log", "customer_id = " . $customer->customer_id) + $this->item_model->getCount("audit_trail", "customer_id = " . $customer->customer_id);

       $this->db->select(array('at_detail', 'at_date'));
       $trail =  $this->item_model->fetch("audit_trail", "status = 1 AND customer_id = " . $customer->customer_id, "at_date", "DESC", 1)[0];

       $this->db->select(array('action', 'date'));
       $log = $this->item_model->fetch("user_log", "status = 1 AND customer_id = " . $customer->customer_id, "date", "DESC", 1)[0];

       if ($log AND $trail)
        $action = ($trail->at_date > $log->date) ? $log->action : $trail->at_detail;
    elseif ($log AND !$trail)
        $action = $log->action;
    elseif (!$log AND $trail) # least likely to happen, but still included
    $action = $trail->at_detail;
    elseif (!$log AND !$trail)
        $action = "None";
    if($active_identifier < $week){
    $content.= '
    <tr>';
        if($customer->username != NULL){ $content.= '<td>'.$customer->username.'</td>';} else{ $content.= '<td>'.$customer->email.'</td>';}
        $content.='<td>'.date("M-d-Y h:i A", $date->date).'</td>
        <td>'.$action.'</td>
        <td align="right">'.$count_action.'</td>
        <td align="right">ACTIVE</td>';
    $total_action += $count_action; 
    }
    else{
        continue;
    }
    $content.= '</tr>';
}

$content .='                                
<tr>
<td><h3>Total Weekly Active Customers</h3></td>
<td><b>-</b></td>
<td><b>-</b></td>
<td align="right"><h3>'. $total_action .'</h3></td>
<td align="right"><h3>'. $acc .'</h3></td>
</tr>';

$content .= '</table>';
$pdf->writeHTML($content);
$pdf->Output('Weekly_Active_Customers_Report.pdf', 'I');
exit;
}
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                            <h3 class="title"><span class="ti-user" style="color: #dc2f54;2"></span>&nbsp; <b>Weekly Active Customers</b></h3>
                            <p class="category">
                                <i class="ti-reload" style = "font-size: 12px;"></i> As of <?= date("F j, Y h:i A"); ?>
                            </p>
                            <br>
                            <form target="_blank" role="form" method="post">
                                <input type="submit" name="generate_pdf" class="btn btn-info btn-fill" style="background-color: #F3BB45; border-color: #F3BB45; color: white;" value="Generate PDF" />
                                <input type="hidden" name="pdf" value="<?php echo htmlspecialchars(serialize($customer)) ?>">
                            </form>
                        </div>
                        <div class="col-sm-1"></div>
                        <form role="form" method="post">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Filter by:</label>
                                    <select name="filter_active" id="filter_inventory" class="form-control border-input file" onchange="populate(this.id, 'select_f')">
                                        <option value="all">All</option>
                                        <option value="product_brand">Latest Login</option>
                                        <option value="added_at">Latest Action</option>
                                        <option value="product_price">Total Actions Range</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Select:</label>
                                    <select name="select_f" id="select_f" class="form-control border-input file">
                                        <option value="">—</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Sort by:</label>
                                    <select name="sort_inventory" class="form-control border-input file">
                                        <option value="product_name" >Username</option>
                                        <option value="product_brand" >Latest Login</option>
                                        <option value="added_at" >Latest Action</option>
                                        <option value="product_quantity" >Total Actions</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label style="color: white;">`</label>
                                    <br>
                                    <button type="submit" class="btn btn-info btn-fill" style="background-color: #31bbe0; border-color: #31bbe0; color: white; width: 55px" name="filter" title="Filter"><i class="ti-filter"></i></button>
                                    <a href = "javascript:history.go(-1)" class="btn btn-info btn-fill" style = "background-color: #dc2f54; border-color: #dc2f54; color: white;">Go back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php
                    if (!$customer) {
                        echo "<center><h3><hr><br>There are currently no weekly active users.</h3><br></center><br><br>";
                    } else {
                    ?>
                    <hr style="margin-bottom: -10px">
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                                <td colspan="2"><b><p>Customer</p></b></td>
                                <td><b><p>Latest Login</p></b></td>
                                <td><b><p>Latest Action</p></b></td>
                                <td align="right"><b><p>Total Actions</p></b></td>
                                <td align="right"><b><p>Status</p></b></td>
                            </thead>
                            <tbody>
                                <?php
                                $total_action = 0;
                                foreach ($customer as $customer):
                                    $date = $this->item_model->max('user_log', 'customer_id = ' . $customer->customer_id, 'date');
                                    $active_identifier = time() - $date->date;

                                    $count_action = $this->item_model->getCount("user_log", "customer_id = " . $customer->customer_id) + $this->item_model->getCount("audit_trail", "customer_id = " . $customer->customer_id);

                                    $this->db->select(array('at_detail', 'at_date'));
                                    $trail =  $this->item_model->fetch("audit_trail", "status = 1 AND customer_id = " . $customer->customer_id, "at_date", "DESC", 1)[0];

                                    $this->db->select(array('action', 'date'));
                                    $log = $this->item_model->fetch("user_log", "status = 1 AND customer_id = " . $customer->customer_id, "date", "DESC", 1)[0];

                                    if ($log AND $trail)
                                        $action = ($trail->at_date > $log->date) ? $log->action : $trail->at_detail;
                                    elseif ($log AND !$trail)
                                        $action = $log->action;
                                    elseif (!$log AND $trail) # least likely to happen, but still included
                                        $action = $trail->at_detail;
                                    elseif (!$log AND !$trail)
                                        $action = "None";

                                    $user_image = (string)$customer->image;
                                    $image_array = explode(".", $user_image);

                                    if ($active_identifier < $week) : ?>
                                        <tr>
                                            <td><p><img src="<?= $this->config->base_url() ?>uploads_users/<?= $image_array[0] . "_thumb." . $image_array[1]; ?>" class="img-responsive img-circle" alt="<?= $customer->username ?>" title="<?= $customer->firstname . " " . $customer->lastname ?>"></p></td>
                                            <td><a href="<?= base_url() ?>accounts/view/<?= $customer->customer_id ?>" style="text-decoration: underline"><?php if($customer->username != NULL) echo $customer->username; else echo $customer->email; ?></a></td>
                                            <td><?= date("M-d-Y h:i A", $date->date) ?></td>
                                            <td><?= $action ?></td>
                                            <td align="right"><?= $count_action ?></td>
                                            <?php $total_action += $count_action; ?>
                                            <td align="right"><span class="text-success">ACTIVE</span></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><h3>Total Weekly Active Customers</h3></td>
                                            <td><b>-</b></td>
                                            <td><b>-</b></td>
                                            <td align="right"><h3><?= $total_action ?></h3></td>
                                            <td align="right"><h3><?= $acc ?></h3></td>
                                        </tr>
                                            <?php else: continue;
                                            endif; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>