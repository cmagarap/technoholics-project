<?php
$total_items = 0;
$image = $this->item_model->fetch("content", array("content_id" => 1))[0];
if (isset($_POST["generate_pdf"])) {
    $space = str_repeat(" ", 65);
    $temp = unserialize($_POST["pdf"]);
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetTitle("Monthly Sales Report");
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
    <th colspan="3"><h2 align="center">Monthly Sales Report</h2></th>
    </tr>
    <tr>
    <th><b>Date</b></th>
    <th align="right"><b>Items sold</b></th>
    <th align="right"><b>Income</b></th>
    </tr>
    ';
    foreach ($temp as $monthly) {
        $content .='
        <tr>
        <td>' . $monthly->sales_month . '</td>
        <td align="right">' . $monthly->items_sold . '</td>
        <td align="right">&#8369;' . number_format($monthly->income, 2) . '</td>
        </tr>
        ';
        $total_items += $monthly->items_sold;
    }

    $content .='                                
    <tr>
    <td><h3>Total</h3></td>
    <td align="right"><b>' . $total_items . '</b></td>
    <td align="right"><h3>&#8369;' . $_POST["monthlytotal"] . '</h3></td>
    </tr>';

    $content .= '</table>';
    $pdf->writeHTML($content);
    $pdf->Output('Monthly_Sales_Report.pdf', 'I');
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
                        <div class="col-sm-4">
                            <h3 class="title"><span class="ti-money" style = "color: #dc2f54;"></span> <b>Monthly Sales</b></h3>
                            <p class="category"><?= $sub ?></p>
                            <br>
                            <form target="_blank" role="form" method="post">
                                <input type="submit" name="generate_pdf" class="btn btn-info btn-fill" style="background-color: #F3BB45; border-color: #F3BB45; color: white;" value="Generate PDF" />
                                <input type="hidden" name="pdf" value="<?php echo htmlspecialchars(serialize($monthly)) ?>">
                                <input type="hidden" name="monthlytotal" value="<?= number_format($monthlytotal, 2) ?>">
                            </form>
                            <br>
                        </div>
                        <?php $year = (isset($_POST['enter'])) ? $this->input->post('year') : ''; ?>
                        <div class="col-sm-4"></div>
                        <form role="form" method="POST">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Filter by Year:</label>
                                    <select name="year" class="form-control border-input file">
                                        <option value="0">Select Year</option>
                                        <?php foreach ($years as $y): ?>
                                            <option value="<?= $y->sales_year ?>"><?= $y->sales_year ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label style="color: white;">`</label><br>
                                    <button type="submit" class="btn btn-info btn-fill" style="background-color: #31bbe0; border-color: #31bbe0; color: white;" name="enter" title="Filter"><i class="ti-filter"></i></button>
                                    <a href = "<?= base_url() ?>reports/sales" class="btn btn-info btn-fill" style = "background-color: #dc2f54; border-color: #dc2f54; color: white;" title="Go Back"><i class="ti-arrow-left"></i></a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php
                    if (!$monthly) {
                        echo "<center><h3><br><br><br><br><hr><br>There are no monthly sales recorded for this year.</h3><br></center><br><br></div>";
                    } else {
                    ?>
                    <br><br><br><br><br><br><br>
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
                            foreach ($monthly as $monthly):
                                ?>
                                <tr>
                                    <td><?= $monthly->sales_month ?></td>
                                    <td align="right"><?= $monthly->items_sold ?></td>
                                    <?php $total_items += $monthly->items_sold; ?>
                                    <td align="right">&#8369;<?= number_format($monthly->income, 2) ?></td>
                                    <td></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td><h3>Total</h3></td>
                                <td align="right"><b><?= $total_items ?></b></td>
                                <td align="right"><h3>&#8369;<?= number_format($monthlytotal, 2) ?></h3></td>
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
