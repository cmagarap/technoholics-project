<?php
$image = $this->item_model->fetch("content", array("content_id" => 1))[0];
if (isset($_POST["generate_pdf"])) {
    $space = str_repeat(" ", 65);
    $temp = unserialize($_POST["pdf"]);
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetTitle("Customer Transaction Behavioral Analysis Report");
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
    <th colspan="5"><h2 align="center">Customer Transaction Behavioral Analysis Report</h2></th>
    </tr>
    <tr>
    <th><b>Customer</b></th>
    <th><b>Recent Action</b></th>
    <th><b>Most Performed Action</b></th>
    <th><b>Preferred Product/s</b></th>
    <th><b>Preference Basis</b></th>
    </tr>
    ';
    foreach ($temp as $cust) {
        if($cust->product_preference == NULL) continue;
        else{
            $this->db->select('at_detail');
            $recent_action = $this->item_model->fetch('audit_trail', 'status = 1 AND customer_id = ' . $cust->customer_id, 'at_date', 'DESC', 1);
            $most_performed = $this->db->query("SELECT COUNT(at_detail) as count_detail, at_detail FROM audit_trail WHERE customer_id = '" . $cust->customer_id . "' AND status = 1 GROUP BY at_detail ORDER BY count_detail DESC LIMIT 1");
            $content .='
            <tr>
            <td>' . $cust->firstname . " " . $cust->lastname. '</td>';
            if($recent_action){ $content.= '<td>'.$recent_action[0]->at_detail.'</td>';}else{ $content.= '<td>NULL</td>';}
            if($most_performed->result()){
                foreach ($most_performed->result() as $result) {
                    $content.= '<td>'.$result->at_detail.'</td>';
                }
            }else{ 
                $content.= '<td>NULL</td>';
            }
            $content .= '
            <td align="right">' . $cust->product_preference . '</td>
            <td align="right">' . $cust->preference_basis . '</td>
            </tr>
            ';
        }
    }

    $content .= '</table>';
    $pdf->writeHTML($content);
    $pdf->Output('Customer_Transaction_Behavioral_Analysis_Report.pdf', 'I');
    exit;
}
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h3 class="title"><span class="ti-shopping-cart-full" style="color: #dc2f54;2"></span> &nbsp;<b>Customer Transaction Behavioral Analysis Report</b></h3>
                        <p class="category">
                            <i class="ti-reload" style = "font-size: 12px;"></i> As of <?= date("F j, Y h:i A"); ?>
                        </p>
                        <br>
                        <form target="_blank" role="form" method="post">
                            <a href = "javascript:history.go(-1)" class="btn btn-info btn-fill btn-wd" style = "background-color: #dc2f54; border-color: #dc2f54; color: white;">Go back</a>
                            <input type="submit" name="generate_pdf" class="btn btn-info btn-fill" style="background-color: #F3BB45; border-color: #F3BB45; color: white;" value="Generate PDF" />
                            <input type="hidden" name="pdf" value="<?php echo htmlspecialchars(serialize($customer)) ?>">
                        </form>
                    </div>
                    <?php
                    if (!$customer) {
                        echo "<center><h3><hr><br>There are no product preferences recorded.</h3><br></center><br><br>";
                    } else {
                        ?>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped">
                                <thead>
                                    <th colspan="2"><b>Customer</b></th>
                                    <th><b>Recent Action</b></th>
                                    <th><b>Most Performed Action</b></th>
                                    <th><b>Preferred Product/s</b></th>
                                    <th><b>Preference Basis</b></th>
                                </thead>
                                <tbody>
                                    <?php foreach ($customer as $cust):
                                    if($cust->product_preference == NULL) continue;
                                    else { ?>
                                    <tr>
                                        <?php $user_image = (string)$cust->image;
                                        $image_array = explode(".", $user_image); ?>
                                        <td><p><img src="<?= $this->config->base_url() ?>uploads_users/<?= $image_array[0] . "_thumb." . $image_array[1]; ?>" class="img-responsive img-circle" alt="<?= $cust->username ?>" title="<?= $cust->firstname . " " . $cust->lastname ?>"></p></td>
                                        <td><?= $cust->firstname . " " . $cust->lastname ?></td>
                                        <?php
                                        $this->db->select('at_detail');
                                        $recent_action = $this->item_model->fetch('audit_trail', 'status = 1 AND customer_id = ' . $cust->customer_id, 'at_date', 'DESC', 1);
                                        $most_performed = $this->db->query("SELECT COUNT(at_detail) as count_detail, at_detail FROM audit_trail WHERE customer_id = '" . $cust->customer_id . "' AND status = 1 GROUP BY at_detail ORDER BY count_detail DESC LIMIT 1");
                                        ?>
                                        <td><?php if($recent_action) echo $recent_action[0]->at_detail;
                                        else echo "<i style='color: #CCCCCC'>NULL</i>"; ?></td>
                                        <td><?php if($most_performed->result()) {
                                            foreach ($most_performed->result() as $result) {
                                                echo $result->at_detail;
                                            }
                                        }
                                        else echo "<i style='color: #CCCCCC'>NULL</i>"; ?></td>

                                        <td><?= $cust->product_preference ?></td>
                                        <td><?= $cust->preference_basis ?></td>
                                    </tr>
                                <?php }
                            endforeach; ?>
                            </tbody>
                        </table>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>