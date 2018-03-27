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
                    <div class="content">
                        <form role="form" method="POST">
                            <div class="form-group">
                                <div class="col-md-5">
                                    <label>Change Report Date Range</label>
                                    <input type="text" id="text-calendar" class="calendar form-control border-input file" name="from_date" placeholder="From" value="" required/>
                                </div>
                                <div class="col-md-5">
                                    <label style="color: white;">`</label>
                                    <input type="text" id="text-calendar" class="calendar form-control border-input file" name="to_date" placeholder="To" value="" required/>
                                </div>
                                <div class="col-md-2">
                                    <label style="color: white;">`</label><br>
                                    <button type="submit" class="btn btn-info btn-fill btn-wd" style="background-color: #31bbe0; border-color: #31bbe0; color: white;" name="enter">Enter</button>
                                </div>
                            </div>
                        </form>
                        <?php
                        if (!$daily) {
                            echo "<center><h3><br><br><br><hr><br>There are no daily sales report recorded for this week.</h3><br></center><br><br></div>";
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
                                    <td align="right"><?= $daily->order_quantity ?></td>
                                    <?php $total_items += $daily->order_quantity; ?>
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
