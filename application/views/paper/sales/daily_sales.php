<?php
$total_items = 0;
$image = $this->item_model->fetch("content",  array("content_id" => 1))[0];
if(isset($_POST["generate_pdf"]))  
{
    $space = str_repeat(" ", 65);
    $temp = unserialize($_POST["pdf"]);  
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle("Daily Sales Report");  
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
    <th colspan="3"><h2 align="center">Daily Sales Report</h2></th>
    </tr>
    <tr>
    <th><b>Date</b></th>
    <th align="right"><b>Items sold</b></th>
    <th align="right"><b>Income</b></th>
    </tr>
    ';  
    foreach($temp as $daily)
    {       
        $content .='
        <tr>
        <td>'.$daily->sales_d.'</td>
        <td align="right">'. $daily->items_sold .'</td>
        <td align="right">&#8369;'.number_format($daily->income, 2).'</td>
        </tr>
        '; 
        $total_items += $daily->items_sold;
    }  

    $content .='                                
    <tr>
    <td><h3>Total</h3></td>
    <td align="right"><b>'. $total_items .'</b></td>
    <td align="right"><h3>&#8369;'.$_POST["dailytotal"].'</h3></td>
    </tr>'; 

    $content .= '</table>';
    $pdf->writeHTML($content);  
    $pdf->Output('Daily_Sales_Report.pdf', 'I');  
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
                        <div class="col-md-6">
                            <h3 class="title"><span class="ti-money" style = "color: #dc2f54;"></span> <b>Daily Sales</b></h3>
                            <p class="category"><?= $sub ?></p>
                        </div>

                        <?php
                        $from = (isset($_POST['enter'])) ? $this->input->post('from_date') : '';
                        $to = (isset($_POST['enter'])) ? $this->input->post('to_date') : '';
                        ?>

                        <form role="form" method="POST">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Change Date Range</label>
                                    <input type="text" id="text-calendar" class="calendar form-control border-input file" name="from_date" placeholder="From" value="<?= $from ?>" required/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label style="color: white;">`</label>
                                    <input type="text" id="text-calendar" class="calendar form-control border-input file" name="to_date" placeholder="To" value="<?= $to ?>" required/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label style="color: white;">`</label><br>
                                    <button type="submit" class="btn btn-info btn-fill" style="background-color: #31bbe0; border-color: #31bbe0; color: white;" name="enter" title="Filter"><i class="ti-filter"></i></button>
                                    <a href = "<?= base_url() ?>reports/sales" class="btn btn-info btn-fill" style = "background-color: #dc2f54; border-color: #dc2f54; color: white;" title="Go Back"><i class="ti-arrow-left"></i></a>
                                </div>
                            </div>
                        </form>
                        <form target="_blank" role="form" method="post">
                           <input type="submit" name="generate_pdf" class="btn btn-info btn-fill" style="background-color: #31bbe0; border-color: #31bbe0; color: white;" value="Generate PDF" /> 
                           <input type="hidden" name="pdf" value="<?php echo htmlspecialchars(serialize($daily)) ?>">
                           <input type="hidden" name="dailytotal" value="<?= number_format($dailytotal, 2) ?>">  
                       </form>
                   </div>
                   <?php
                   if (!$daily) {
                    echo "<center><h3><br><br><br><hr><br>There are no daily sales recorded for this week.</h3><br></center><br><br></div>";
                } else {
                    ?>
                    <br><br><br><br>
                    <hr style="margin-bottom: -20px">
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                                <th><b><p>Date</b></th>
                                    <th align="right"><b><p>Items sold</p></b></th>
                                    <th align="right"><b><p>Income</p></b></th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    <?php $total_items = 0;
                                    foreach ($daily as $daily): ?>
                                    <tr>
                                        <td><?= $daily->sales_d ?></td>
                                        <td align="right"><?= $daily->items_sold ?></td>
                                        <?php $total_items += $daily->items_sold; ?>
                                        <td align="right">&#8369;<?= number_format($daily->income, 2) ?></td>
                                        <td></td>
                                    </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <td><h3>Total</h3></td>
                                    <td align="right"><b><?= $total_items ?></b></td>
                                    <td align="right"><h3>&#8369;<?= number_format($dailytotal, 2) ?></h3></td>
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
<script>
    $(function() {
        $('input.calendar').pignoseCalendar({
            format: 'YYYY-MM-DD'
        });
    });
</script>