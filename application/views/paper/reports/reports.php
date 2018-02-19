<?php
# for Active Customers
$acc = 0;
$week = 604800;
foreach ($customer as $customer1){
    $date1 = $this->item_model->max('user_log', 'customer_id = ' . $customer1->customer_id, 'date');
    $active_identifier1 = time() - $date1->date;
    if ($active_identifier1 < $week)
        $acc++;
}
?>
<div class="content">
    <div class="container-fluid">
        <!--=====================================================================-->
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="header">
                        <h4 class="title"><b>Customer Product Preferences</b></h4>
                        <p class="category">
                            <i class="ti-reload" style = "font-size: 12px;"></i> As of <?= date("F j, Y h:i A"); ?>
                        </p>
                    </div>
                    <?php
                    if (!$customer) {
                        echo "<center><h3><hr><br>There are no product preferences recorded.</h3><br></center><br><br>";
                    } else {
                    ?>

                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                            <th colspan="2"><b>Customer</b></th>
                            <th><b>Product/s</b></th>
                            </thead>
                            <tbody>
                            <?php foreach ($customer as $cust):
                                if($cust->product_preference == NULL) continue;
                                else { ?>
                                <tr>
                                    <?php $user_image = (string)$cust->image;
                                    $image_array = explode(".", $user_image); ?>
                                    <td><p><img src="<?= $this->config->base_url() ?>uploads_users/<?= $image_array[0] . "_thumb." . $image_array[1]; ?>" class="img-responsive img-circle" alt="<?= $cust->username ?>" title="<?= $cust->firstname . " " . $cust->lastname ?>"></p></td>
                                    <td><?= $cust->firstname . " " . $cust->lastname ?></td>
                                    <td><?= $cust->product_preference ?></td>
                                </tr>
                            <?php }
                            endforeach; ?>
                            <tr>

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
                                <?php #$this->db->select("order_quantity");
                                #$items_sold = $this->item_model->fetch("orders", "order_id = " . $daily->order_id)[0]; ?>
                                <tr>
                                    <td><?= date("F j, Y", $daily->sales_date) ?>
                                    </td>
                                    <td></td>

                                    <td align="right">&#8369; <?= number_format($daily->income, 2) ?></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td><h3>Total</h3></td>
                                <td><?= $total_items ?></td>
                                <td align="right"><h3>&#8369; <?= number_format($dailytotal, 2) ?></h3></td>
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
                                    <td><?= date("m-j-Y", $weekly->sales_date) ?></td>
                                    <td></td>
                                    <td align="right">&#8369;<?= number_format($weekly->income, 2) ?></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td><h3>Total</h3></td>
                                <td><?= $total_items ?></td>
                                <td align="right"><h3>&#8369; <?= number_format($weeklytotal, 2) ?></h3></td>
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
                            <th><b>Income</b></th>
                            <th></th>
                            </thead>
                            <tbody>
                            <?php foreach ($monthly as $monthly): ?>
                                <tr>
                                    <td><?= $monthly->sales_month ?>
                                    </td>
                                    <td align="right">&#8369;<?= number_format($monthly->income, 2) ?></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td><h3>Total</h3></td>
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
                            <th><b>Income</b></th>
                            <th></th>
                            </thead>
                            <tbody>
                            <?php foreach ($annual as $annual): ?>
                                <tr>
                                    <td><?= $annual->sales_y ?>
                                    </td>
                                    <td align="right">&#8369;<?= number_format($annual->income, 2) ?></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td><h3>Total</h3></td>
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
