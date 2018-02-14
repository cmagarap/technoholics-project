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
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title"><b>Weekly Active Customers</b></h4>
                        <p class="category">
                            <i class="ti-reload" style = "font-size: 12px;"></i> As of <?= date("F j, Y h:i A"); ?>
                        </p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                            <th colspan="2"><b>Customer</b></th>
                            <th><b>Latest Login</b></th>
                            <th><b>Latest Action</b></th>
                            <th><b>Total Actions</b></th>
                            <th><b>Status</b></th>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($customer as $customer):
                                $date = $this->item_model->max('user_log', 'customer_id = ' . $customer->customer_id, 'date');
                                $active_identifier = time() - $date->date;

                                $count_action = $this->item_model->getCount("user_log", "customer_id = " . $customer->customer_id);

                                $this->db->select("action");
                                $action = $this->item_model->fetch("user_log", "status = 1 AND customer_id = " . $customer->customer_id, "date", "DESC", 1)[0];

                                $userinformation = $this->item_model->fetch('customer', array('customer_id' => $customer->customer_id))[0];
                                $user_image = (string)$userinformation->image;
                                $image_array = explode(".", $user_image);
                                ?>
                                <tr>
                                    <?php if ($active_identifier < $week) : ?>
                                        <td><p><img src="<?= $this->config->base_url() ?>uploads_users/<?= $image_array[0] . "_thumb." . $image_array[1]; ?>" class="img-responsive img-circle" alt="<?= $customer->username ?>" title="<?= $customer->firstname . " " . $customer->lastname ?>"></p></td>
                                        <td><a href="<?= base_url() ?>accounts/view/customer/<?= $customer->customer_id ?>" style="text-decoration: underline"><?= $customer->username ?></a></td>
                                        <td><?= date("m-j-Y h:i A", $date->date) ?></td>
                                        <td><?= $action->action ?></td>
                                        <td><?= $count_action ?></td>
                                        <td><span class="text-success">ACTIVE</span></td>
                                    <?php else: continue;
                                    endif; ?>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td></td>
                                <td><h3>Total Weekly Active Customers</h3></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><h3><?= $acc ?></h3></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title"><b>Customer Feedback</b></h4>
                        <p class="category">
                            <i class="ti-reload" style = "font-size: 12px;"></i> As of <?= date("F j, Y h:i A"); ?>
                        </p>
                    </div>
                    <?php
                    if (!$feedback) {
                        echo "<center><h3><hr><br>There are no feedback recorded today.</h3><br></center><br><br>";
                    } else {
                    ?>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                            <th><b title = "Feedback ID">#</b></th>
                            <th colspan="2"><b>Customer</b></th>
                            <th><b>Feedback</b></th>
                            <th><b>Date</b></th>
                            <th><b>Rating</b></th>
                            <th><b title = "Product ID">Product #</b></th>
                            </thead>
                            <tbody>
                            <?php foreach ($feedback as $feed): ?>
                                <tr>
                                    <?php $customer = $this->item_model->fetch("customer", "customer_id = " . $feed->customer_id)[0];
                                    $user_image = (string)$customer->image;
                                    $image_array = explode(".", $user_image); ?>

                                    <td><?= $feed->feedback_id ?></td>
                                    <td><p><img src="<?= $this->config->base_url() ?>uploads_users/<?= $image_array[0] . "_thumb." . $image_array[1]; ?>" class="img-responsive img-circle" alt="<?= $customer->username ?>" title="<?= $customer->firstname . " " . $customer->lastname ?>"></p></td>
                                    <td><a href="<?= base_url() ?>accounts/view/customer/<?= $customer->customer_id ?>" style="text-decoration: underline"><?= $customer->username ?></a></td>
                                    <td><?= $feed->feedback ?></td>
                                    <td><?= date("m-j-Y h:i A", $feed->added_at) ?></td>
                                    <td><p class="starability-result" data-rating="<?= $feed->rating ?>"><?= $feed->rating ?></p></td>
                                    <td><a href="<?= base_url() ?>inventory/view/<?= $feed->product_id ?>" style="text-decoration: underline"><?= $feed->product_id ?></a></td>
                                </tr>
                            <?php endforeach; ?>
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
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <div align = "left">
                            <h3 class="title"><b>Inventory Report</b></h3></br>
                        </div>
                    </div>
                    <?php
                    if (!$annual) {
                        echo "<center><h3><hr><br>There are no products recorded in the database.</h3><br></center><br><br>";
                    } else {
                    ?>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th><b title = "Product ID">#</b></th>
                                <th><b>Asset</b></th>
                                <th><b>Quantity</b></th>
                                <th><b>Value</b></th>
                                <th><b title = "Exact Value">Ext. Value</b></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $total_price = 0;
                            $total_items = 0;
                            foreach ($inventory as $product): ?>
                                <tr>
                                    <td><?= $product->product_id ?>
                                    </td>
                                    <td><?= $product->product_name ?></td>
                                    <td align="right"><?= $product->product_quantity ?></td>
                                    <td align="right">&#8369; <?= number_format($product->product_price, 2) ?></td>
                                    <td align="right">&#8369; <?= number_format($product->product_price * $product->product_quantity, 2) ?></td>
                                    <?php $total_price += $product->product_price * $product->product_quantity;
                                    $total_items += $product->product_quantity; ?>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td></td>
                                <td><h3>Total Inventory Value</h3></td>
                                <td><h3 align="right"><?= $total_items ?></h3></td>
                                <td align="right"><b>-</b></td>
                                <td align="right"><h3>&#8369; <?= number_format($total_price, 2) ?></h3></td>
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
