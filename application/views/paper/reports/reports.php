<div class="content">
    <div class="container-fluid">
        <!--=====================================================================-->

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="header">
                        <div align = "left">
                            <h3 class="title"><b>Daily Sales</b></h3><br>
                        </div>
                    </div>
                    <?php
                    if (!$daily) {
                        echo "<center><h3><hr><br>There are no reports recorded today.</h3><br></center><br><br>";
                    } else {
                    ?>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                            <th><b>Date</b></th>
                            <th><b>Items sold</b></th>
                            <th><b>Income</b></th>
                            <th></th>
                            </thead>
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

            <div class="col-md-6">
                <div class="card">
                    <div class="header">
                        <div align = "left">
                            <h3 class="title"><b>Weekly Sales</b></h3></br>
                        </div>
                    </div>
                    <?php
                    if (!$weekly) {
                        echo "<center><h3><hr><br>There are no reports recorded this week.</h3><br></center><br><br>";
                    } else {
                    ?>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                            <th><b>Date</b></th>
                            <th><b>Items Sold</b></th>
                            <th><b>Income</b></th>
                            <th></th>
                            </thead>
                            <tbody>
                            <?php $total_items = 0;
                            foreach ($weekly as $weekly): ?>
                                <tr>
                                    <td><?= $weekly->sales_d ?></td>
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
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="header">
                        <div align = "left">
                            <h3 class="title"><b>Monthly Sales</b></h3></br>
                        </div>
                    </div>

                    <?php
                    if (!$monthly) {
                        echo "<center><h3><hr><br>There are no reports recorded this month.</h3><br></center><br><br>";
                    } else {
                    ?>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                            <th><b>Month</b></th>
                            <th><b>Items Sold</b></th>
                            <th><b>Income</b></th>
                            </thead>
                            <tbody>
                            <?php $total_items = 0;
                            foreach ($monthly as $monthly): ?>
                                <tr>
                                    <td><?= $monthly->sales_month ?></td>
                                    <td align="right"><?= $monthly->order_quantity ?></td>
                                    <?php $total_items += $monthly->order_quantity; ?>
                                    <td align="right">&#8369;<?= number_format($monthly->income, 2) ?></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td><h3>Total</h3></td>
                                <td align="right"><b><?= $total_items ?></b></td>
                                <td align="right"><h3>&#8369;<?= number_format($monthlytotal, 2) ?></h3></td>
                            </tr>
                            </tbody>
                        </table>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="header">
                        <div align = "left">
                            <h3 class="title"><b>Annual Sales</b></h3></br>
                        </div>
                    </div>
                    <?php
                    if (!$annual) {
                        echo "<center><h3><hr><br>There are no reports recorded in this year.</h3><br></center><br><br>";
                    } else {
                    ?>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                            <th><b>Year</b></th>
                            <th><b>Items Sold</b></th>
                            <th><b>Income</b></th>
                            </thead>
                            <tbody>
                            <?php $total_items = 0;
                            foreach ($annual as $annual): ?>
                                <tr>
                                    <td><?= $annual->sales_y ?></td>
                                    <td align="right"><?= $annual->order_quantity ?></td>
                                    <?php $total_items += $annual->order_quantity; ?>
                                    <td align="right">&#8369;<?= number_format($annual->income, 2) ?></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td><h3>Total</h3></td>
                                <td align="right"><b><?= $total_items ?></b></td>
                                <td align="right"><h3>&#8369;<?= number_format($annualtotal, 2) ?></h3></td>
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
