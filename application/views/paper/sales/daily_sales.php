<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="card">
                    <div class="header">
                        <div align = "left">
                            <h3 class="title"><span class="ti-money" style = "color: #dc2f54;"></span> <b>Daily Sales</b></h3>
                            <p class="category"><?= $sub ?></p>
                        </div>
                    </div>
                    <?php
                    if(isset($_POST['enter'])) {
                        $from = $this->input->post('from_date');
                        $to = $this->input->post('to_date');
                    } else {
                        $from = '';
                        $to = '';
                    }
                    ?>
                    <div class="content">
                        <form role="form" method="POST">
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label>Change Report Date Range</label>
                                    <input type="text" id="text-calendar" class="calendar form-control border-input file" name="from_date" placeholder="From" value="<?= $from ?>" required/>
                                </div>
                                <div class="col-md-4">
                                    <label style="color: white;">`</label>
                                    <input type="text" id="text-calendar" class="calendar form-control border-input file" name="to_date" placeholder="To" value="<?= $to ?>" required/>
                                </div>
                                <div class="col-md-4">
                                    <label style="color: white;">`</label><br>
                                    <button type="submit" class="btn btn-info btn-fill btn-wd" style="background-color: #31bbe0; border-color: #31bbe0; color: white;" name="enter">Enter</button>
                                    <a href = "<?= base_url() ?>reports/sales_reports" class="btn btn-info btn-fill btn-wd" style = "background-color: #dc2f54; border-color: #dc2f54; color: white;">Go back</a>
                                </div>
                            </div>
                        </form>
                        <?php
                        if (!$daily) {
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
                            foreach ($daily as $daily): ?>
                                <tr>
                                    <td><?= $daily->sales_d ?></td>
                                    <?php
                                    try {
                                        $quantity = $daily->order_quantity;
                                    } catch (Exception $e) {
                                        $quantity = 0;
                                        //echo $e->errorMessage();
                                    }
                                    ?>
                                    <td align="right"><?= $quantity ?></td>
                                    <?php $total_items += $quantity; ?>
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
