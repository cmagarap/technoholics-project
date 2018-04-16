<?php
$image = $this->item_model->fetch("content", array("content_id" => 1))[0];
if (isset($_POST["generate_pdf"])) {
    $space = str_repeat(" ", 65);
    $temp = unserialize($_POST["pdf"]);
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetTitle("Sold and Unsold Report");
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
    <th colspan="5"><h2 align="center">'.$_POST["title"].' for '.$_POST["date"].' </h2></th>
    </tr>
    <tr>
                            <td><p><b>Product ID</b></p></td>
                            <td><p><b>Product</b></p></td>
                            <td><p><b>Brand</b></p></td>
                            <td align="right"><p><b>Stock</b></p></td>
                            <td align="right"><p><b>Price</b></p></td>>
    </tr>
    ';
    foreach ($temp as $products) {
        $content .='
        <tr>
        <td>' . $products->product_id . '</td>
        <td align="right">' . $products->product_name. '</td>
        <td align="right">' . ucfirst($products->product_brand). '</td>
        <td align="right">' . $products->product_quantity. '</td>
        <td align="right">&#8369;' . number_format($products->product_price, 2) . '</td>
        </tr>
        ';
    }

    $content .= '</table>';
    $pdf->writeHTML($content);
    $pdf->Output('Sold_and_Unsold_Report.pdf', 'I');
    exit;
}
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <div class="col-sm-4">
                            <h3 class="title"><span class="ti-shopping-cart-full" style="color: #dc2f54;2"></span> &nbsp;<b><?= $title_of_report ?></b></h3>
                            <p class="category">
                                <i class="ti-reload" style = "font-size: 12px;"></i> <?= $subtitle ?>
                            </p><br>
                            <form target="_blank" method="post">
                                <input type="hidden" name="title" value="<?php echo $title_of_report?>">
                                <input type="hidden" name="date" value="<?php echo $temp_date ?>">
                                <input type="hidden" name="pdf" value="<?php echo htmlspecialchars(serialize($products)) ?>">
                                <input type="submit" name="generate_pdf" class="btn btn-info btn-fill" style="background-color: #F3BB45; border-color: #F3BB45; color: white;" value="Generate PDF" />
                            </form>
                        </div>
                        <form role="form" method="post">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Choose:</label>
                                    <select name="select_type" class="form-control border-input file">
                                        <option value="sold" <?php if ($title_of_report == "Sold Products") echo "selected"; ?>>Sold Products</option>
                                        <option value="unsold" <?php if ($title_of_report == "Unsold Products") echo "selected"; ?>>Unsold Products</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Select Month:</label>
                                    <select name="select_month" class="form-control border-input file">
                                        <option value="—">—</option>
                                        <option value="Jan">January</option>
                                        <option value="Feb">February</option>
                                        <option value="Mar">March</option>
                                        <option value="Apr">April</option>
                                        <option value="May">May</option>
                                        <option value="Jun">June</option>
                                        <option value="Jul">July</option>
                                        <option value="Aug">August</option>
                                        <option value="Sep">September</option>
                                        <option value="Oct">October</option>
                                        <option value="Nov">November</option>
                                        <option value="Dec">December</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Select Year:</label>
                                    <select name="select_year" class="form-control border-input file">
                                        <option value="—">—</option>
                                        <?php foreach ($sales_years as $year): ?>
                                            <option value="<?= $year->formatted ?>"><?= $year->formatted ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label style="color: white;">`</label>
                                    <br>
                                    <button type="submit" class="btn btn-info btn-fill" style="background-color: #31bbe0; border-color: #31bbe0; color: white; width: 55px" name="filter" title="Filter"><i class="ti-filter"></i></button>
                                    <a href = "<?= base_url() ?>reports/inventory" class="btn btn-info btn-fill" style = "background-color: #dc2f54; border-color: #dc2f54; color: white;" title="Go Back"><i class="ti-arrow-left"></i></a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php
                    if (!$products) {
                        echo "<center><h3><hr><br>There are no products recorded.</h3><br></center><br><br>";
                    } else {
                    ?>
                    <br><br><br><br><br>
                    <hr style="margin-bottom: -10px">
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                            <td><p><b>Product ID</b></p></td>
                            <td><p><b>Product</b></p></td>
                            <td><p><b>Brand</b></p></td>
                            <td align="right"><p><b>Stock</b></p></td>
                            <td align="right"><p><b>Price</b></p></td>
                            </thead>
                            <tbody>
                            <?php foreach ($products as $products): ?>
                                    <tr>
                                        <td><?= $products->product_id ?></td>
                                        <td><?= $products->product_name ?></td>
                                        <td><?= ucfirst($products->product_brand) ?></td>
                                        <td align="right"><?= $products->product_quantity ?></td>
                                        <td align="right">&#8369; <?= number_format($products->product_price, 2) ?></td>
                                    </tr>
                                <?php
                            endforeach; ?>
                            </tbody>
                        </table>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>