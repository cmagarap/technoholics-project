<?php
$total_items = 0;
$image = $this->item_model->fetch("content",  array("content_id" => 1))[0];
if(isset($_POST["generate_pdf"]))  
{
    $space = str_repeat(" ", 65);
    $temp = unserialize($_POST["pdf"]);  
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle("Annual Sales Report");  
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
    '.$pdf->Image($this->config->base_url().'assets/ordering/img/'.$image->company_logo, 54, 8, 0,15, '','','',true,300,'C').$pdf->Cell(0, 0, 'Grass Residences,Unit 1717-B'.$space.date("F j, Y"), 0, 1, 'L', 0, '', 0).$pdf->Cell(0, 0, 'Tower 1 SMDC The,Nueva', 0, 1, 'L', 0, '', 0).$pdf->Cell(0, 0, 'Viscaya, Bago Bantay, Quezon', 0, 1, 'L', 0, '', 0).$pdf->Cell(0, 0, 'City, Metro Manila Philippines', 0, 1, 'L', 0, '', 0).'
    <br><br>
    <table border="1" cellspacing="0" cellpadding="3"> 
    <tr>
    <th colspan="3"><h2 align="center">Annual Sales Report</h2></th>
    </tr>
    <tr>
    <th><b>Date</b></th>
    <th align="right"><b>Items sold</b></th>
    <th align="right"><b>Income</b></th>
    </tr>
    ';  
    foreach($temp as $annual)
    {       
        $content .='
        <tr>
        <td>'.$annual->sales_y.'</td>
        <td align="right">'. $annual->items_sold.'</td>
        <td align="right">&#8369;'.number_format($annual->income, 2).'</td>
        </tr>
        '; 
        $total_items += $annual->items_sold;
    }  

    $content .='                                
    <tr>
    <td><h3>Total</h3></td>
    <td align="right"><b>'. $total_items .'</b></td>
    <td align="right"><h3>&#8369;'.$_POST["annualtotal"].'</h3></td>
    </tr>'; 

    $content .= '</table>';
    $pdf->writeHTML($content);  
    $pdf->Output('Annual_Sales_Report.pdf', 'I');  
    exit;
}  
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="card">
                    <div class="header">
                        <div class="col-md-4">
                            <h3 class="title"><span class="ti-money" style = "color: #dc2f54;"></span> <b>Annual Sales</b></h3>
                            <p class="category"><?= $sub ?></p>
                        </div>
                        <?php $year = (isset($_POST['enter'])) ? $this->input->post('year') : ''; ?>
                        <div class="col-md-3"></div>
                        <form role="form" method="POST">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Filter by Years:</label>
                                    <select name="year" class="form-control border-input file">
                                        <option value="0">Select Years</option>
                                        <option value="5" <?php if($this->input->post('year') == 5) echo "selected"; ?>>For the last five years.</option>
                                        <option value="10" <?php if($this->input->post('year') == 10) echo "selected"; ?>>For the last ten years.</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label style="color: white;">`</label><br>
                                    <button type="submit" class="btn btn-info btn-fill" style="background-color: #31bbe0; border-color: #31bbe0; color: white;" name="enter"><i class="ti-filter"></i></button>
                                    <a href = "<?= base_url() ?>reports/sales_reports" class="btn btn-info btn-fill" style = "background-color: #dc2f54; border-color: #dc2f54; color: white;" title="Go Back"><i class="ti-arrow-left"></i></a>
                                </div>
                            </div>
                        </form>
                        <form target="_blank" role="form" method="post">
                           <input type="submit" name="generate_pdf" class="btn btn-info btn-fill" style="background-color: #31bbe0; border-color: #31bbe0; color: white;" value="Generate PDF" /> 
                           <input type="hidden" name="pdf" value="<?php echo htmlspecialchars(serialize($annual)) ?>"> 
                           <input type="hidden" name="annualtotal" value="<?= number_format($annualtotal, 2) ?>">  
                       </form>
                   </div>
                   <?php
                   if (!$annual) {
                    echo $no_fetched;
                } else {
                    ?>
                    <br><br><br><br>
                    <hr style="margin-bottom: -20px">
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                                <td><b><p>Date</b></td>
                                    <td align="right"><b><p>Items sold</p></b></td>
                                    <td align="right"><b><p>Income</p></b></td>
                                    <th></th>
                                </thead></p>
                                <tbody>
                                    <?php $total_items = 0;
                                    foreach ($annual as $annual): ?>
                                    <tr>
                                        <td><?= $annual->sales_y ?></td>
                                        <td align="right"><?= $annual->items_sold ?></td>
                                        <?php $total_items += $annual->items_sold; ?>
                                        <td align="right">&#8369;<?= number_format($annual->income, 2) ?></td>
                                        <td></td>
                                    </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <td><h3>Total</h3></td>
                                    <td align="right"><b><?= $total_items ?></b></td>
                                    <td align="right"><h3>&#8369;<?= number_format($annualtotal, 2) ?></h3></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
