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
                                    <a href = "<?= base_url() ?>reports/sales_reports" class="btn btn-info btn-fill" style = "background-color: #dc2f54; border-color: #dc2f54; color: white;" title="Go Back"><i class="ti-arrow-left"></i></a>
                                </div>
                            </div>
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
                            <td><b><p>Date</b></td>
                            <td align="right"><b><p>Items sold</p></b></td>
                            <td align="right"><b><p>Income</p></b></td>
                            <th></th>
                            </thead></p>
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
