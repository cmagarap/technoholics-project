<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="card">
                    <div class="header">
                        <div align = "left">
                            <h3 class="title"><span class="ti-money" style = "color: #dc2f54;"></span> <b>Weekly Sales</b></h3>
                            <p class="category"><?= $sub ?></p>
                        </div>
                    </div>
                    <?php
                    if(isset($_POST['enter'])) {
                        $month = $this->input->post('month');
                        $year = $this->input->post('year');
                    } else {
                        $month = '';
                        $year = '';
                    }
                    ?>
                    <div class="content">
                        <form role="form" method="POST">
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label>Change Report Month and Year</label>
                                    <select name="month" class="form-control border-input file">
                                        <option value="0">Select Month</option>
                                        <option value="Jan" <?php if($this->input->post('month') == "Jan") echo 'selected'; ?>>January</option>
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
                                <div class="col-md-4">
                                    <label style="color: white;">`</label>
                                    <select name="year" class="form-control border-input file">
                                        <option value="0">Select Year</option>
                                        <?php foreach ($years as $y): ?>
                                            <option value="<?= $y->sales_year ?>"><?= $y->sales_year ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label style="color: white;">`</label><br>
                                    <button type="submit" class="btn btn-info btn-fill btn-wd" style="background-color: #31bbe0; border-color: #31bbe0; color: white;" name="enter">Enter</button>
                                    <a href = "<?= base_url() ?>reports/sales_reports" class="btn btn-info btn-fill btn-wd" style = "background-color: #dc2f54; border-color: #dc2f54; color: white;">Go back</a>
                                </div>
                            </div>
                        </form>
                        <?php
                        if (!$weekly) {
                            echo "<center><h3><br><br><br><hr><br>There are no daily sales recorded for this week.</h3><br></center><br><br></div>";
                        } else {
                        ?>
                    </div>
                    <br><br><br>
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
                                    <td align="right"><?= $weekly->order_quantity ?></td>
                                    <?php $total_items += $weekly->order_quantity; ?>
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
