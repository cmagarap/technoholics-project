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
                                    <a href = "<?= base_url() ?>reports/sales_reports" class="btn btn-info btn-fill" style = "background-color: #dc2f54; border-color: #dc2f54; color: white;" title="Go Back"><i class="ti-arrow-left"></i></a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php
                        if (!$monthly) {
                            echo "<center><h3><br><br><hr><br>There are no monthly sales recorded for this year.</h3><br></center><br><br></div>";
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
                            foreach ($monthly as $monthly): ?>
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
