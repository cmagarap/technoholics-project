<?php
$total_price = 0;
$total_items = 0;
$image = $this->item_model->fetch("content",  array("content_id" => 1))[0];
if(isset($_POST["generate_pdf"]))  
{  
  $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
  $pdf->SetCreator(PDF_CREATOR);  
  $pdf->SetTitle("Inventory Reports");  
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
  '.$pdf->Image($this->config->base_url().'assets/ordering/img/'.$image->company_logo, 54, 8, 0,15, '','','',true,300,'C').$pdf->Cell(0, 0, 'Grass Residences,Unit 1717-B                                                                 '.date("F j, Y"), 0, 1, 'L', 0, '', 0).$pdf->Cell(0, 0, 'Tower 1 SMDC The,Nueva', 0, 1, 'L', 0, '', 0).$pdf->Cell(0, 0, 'Viscaya, Bago Bantay, Quezon', 0, 1, 'L', 0, '', 0).$pdf->Cell(0, 0, 'City, Metro Manila Philippines', 0, 1, 'L', 0, '', 0).'
  <br><br>
  <table border="1" cellspacing="0" cellpadding="3">  
  <tr>  
  <th><b title = "Product ID">#</b></th>
  <th><b>Asset</b></th>
  <th><b>Quantity</b></th>
  <th><b>Value</b></th>
  <th><b>Exact Value</b></th>
  </tr>  
  ';  
  foreach($inventory as $product)
  {       
    $content .='
    <tr>  
    <td>'.$product->product_id.'</td>
    <td>'.$product->product_name.'</td>
    <td align="right">'.$product->product_quantity.'</td>
    <td align="right">&#8369;'.number_format($product->product_price, 2).'</td>
    <td align="right">&#8369;'.number_format($product->product_price * $product->product_quantity, 2).'</td>
    </tr>  
    ';  
    $total_price += $product->product_price * $product->product_quantity;
    $total_items += $product->product_quantity;
}  

$content .='                                
<tr>
<td></td>
<td><h3>Total Inventory Value</h3></td>
<td><h3 align="right">'.$total_items.'</h3></td>
<td align="right"><b>-</b></td>
<td align="right"><h3>&#8369;'.number_format($total_price, 2).'</h3></td>
</tr>'; 

$content .= '</table>';
$pdf->writeHTML($content);  
$pdf->Output('Inventory_Report.pdf', 'I');  
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
                        <h3 class="title"><b>Inventory Report</b></h3>
                        <p class="category">
                            <i class="ti-reload" style = "font-size: 12px;"></i> As of <?= date("F j, Y h:i A"); ?>
                        </p>
                        <br>
                        <form target="_blank" method="post">
                         <a href = "javascript:history.go(-1)" class="btn btn-info btn-fill btn-wd" style = "background-color: #dc2f54; border-color: #dc2f54; color: white;">Go back</a>
                         <input type="submit" name="generate_pdf" class="btn btn-info btn-fill" style="background-color: #31bbe0; border-color: #31bbe0; color: white;" value="Generate PDF" />  
                     </form> 
                 </div>
                 <?php
                 if (!$inventory) {
                    echo "<center><h3><hr><br>There are no products recorded in the database.</h3><br></center><br><br>";
                } else {
                    ?>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th><b title = "Product ID">#</b></th>
                                    <th><b>Asset</b></th>
                                    <th><b>Quantity</b></th>
                                    <th><b>Value</b></th>
                                    <th><b>Exact Value</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total_price = 0;
                                $total_items = 0;
                                foreach ($inventory as $product): ?>
                                <tr>
                                    <td><u><a href="<?= base_url() ?>inventory/view/<?= $product->product_id ?>"><?= $product->product_id ?></a></u>
                                    </td>
                                    <td><?= $product->product_name ?></td>
                                    <td align="right"><?= $product->product_quantity ?></td>
                                    <td align="right">&#8369; <?= number_format($product->product_price, 2) ?></td>
                                    <td align="right">&#8369; <?= number_format($product->product_price * $product->product_quantity, 2) ?></td>
                                    <?php $total_price += $product->product_price * $product->product_quantity;
                                    $total_items += $product->product_quantity; ?>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td></td>
                                <td><h3>Total Inventory Value</h3></td>
                                <td><h3 align="right"><?= $total_items ?></h3></td>
                                <td align="right"><b>-</b></td>
                                <td align="right"><h3>&#8369; <?= number_format($total_price, 2) ?></h3></td>
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
