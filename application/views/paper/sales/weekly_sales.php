<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="card">
                    <div class="header">
                        <div class="col-md-5">
                            <h3 class="title"><span class="ti-money" style = "color: #dc2f54;"></span> <b>Weekly Sales</b></h3>
                            <p class="category"><?= $sub ?></p>
                        </div>

                        <?php
                            $month = (isset($_POST['enter'])) ? $this->input->post('month') : '';
                            $year = (isset($_POST['enter'])) ? $this->input->post('year') : '';
                        ?>
                        <form role="form" method="POST">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Change Report Month and Year</label>
                                    <select name="month" class="form-control border-input file">
                                        <option value="0">Select Month</option>
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
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label style="color: white;">`</label>
                                    <select name="year" class="form-control border-input file">
                                        <option value="0">Select Year</option>
                                        <?php foreach ($years as $y): ?>
                                            <option value="<?= $y->sales_year ?>"><?= $y->sales_year ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label style="color: white;">`</label><br>
                                    <button type="submit" class="btn btn-info btn-fill" style="background-color: #31bbe0; border-color: #31bbe0; color: white;" name="enter"><i class="ti-filter"></i></button>
                                    <a href = "<?= base_url() ?>reports/sales" class="btn btn-info btn-fill" style = "background-color: #dc2f54; border-color: #dc2f54; color: white;"><i class="ti-arrow-left" title="Go Back"></i></a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php
                    if (!$weekly) {
                        echo "<center><h3><br><br><br><hr><br>There are no daily sales recorded for this week.</h3><br></center><br><br></div>";
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
                            foreach ($weekly as $weekly): ?>
                                <tr>
                                    <td><?= $weekly->sales_date ?></td>
                                    <td align="right"><?= $weekly->items_sold ?></td>
                                    <?php $total_items += $weekly->items_sold; ?>
                                    <td align="right">&#8369;<?= number_format($weekly->income, 2) ?></td>
                                    <td></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td><h3>Total</h3></td>
                                <td align="right"><b><?= $total_items ?></b></td>
                                <td align="right"><h3>&#8369;<?= number_format($weeklytotal, 2) ?></h3></td>
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
