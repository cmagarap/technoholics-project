<?php
// to count Active Customers
$acc = 0;
$week = 604800;
foreach ($customer_all as $customer_all) {
    $date1 = $this->item_model->max('user_log', 'customer_id = ' . $customer_all->customer_id, 'date');
    $active_identifier1 = time() - $date1->date;
    if ($active_identifier1 < $week)
        $acc++;
}
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-2">
                                <div class="icon-big icon-success text-center">
                                    <i class="ti-wallet"></i>
                                </div>
                            </div>
                            <div class="col-xs-10">
                                <div class="numbers">
                                    <p>Revenue</p>
                                    &#8369; <?php
                                    $revenue = $revenue[0];
                                    # try {
                                    echo number_format($revenue->income, 0);
                                    /* } catch (Exception $e) {
                                      echo 'Message: ' .$e->getMessage();
                                      } */
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                <i class="ti-calendar"></i> Updated last
                                <?php
                                $sales_date = $sales_date[0];
                                echo date("F j, Y", $sales_date->sales_date);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-3">
                                <div class="icon-big icon-warning text-center">
                                    <i class="ti-user"></i>
                                </div>
                            </div>
                            <div class="col-xs-9">
                                <div class="numbers">
                                    <p>Active Customers</p>
                                    <?= $acc ?>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                <i class="ti-reload"></i> As of <?= date('F j, Y') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-3">
                                <div class="icon-big icon-info text-center">
                                    <i class="ti-package"></i>
                                </div>
                            </div>
                            <div class="col-xs-9">
                                <div class="numbers">
                                    <p>Product Stocks</p>
                                    <?php
                                    $product_quantity = $product_quantity[0];
                                    echo $product_quantity->product_quantity;
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                <i class="ti-reload"></i> As of <?= date('F j, Y') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-3">
                                <div class="icon-big icon-info text-center">
                                    <i class="ti-shopping-cart" style = "color: #dc2f54"></i>
                                </div>
                            </div>
                            <div class="col-xs-9">
                                <div class="numbers">
                                    <p>Current Transactions</p>
                                    <?= $no_of_orders; ?>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                <i class="ti-calendar"></i> Updated last
                                <?php
                                $orders_date = $orders_date[0];
                                echo date("F j, Y", $orders_date->transaction_date);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h3 class="title"><i>to be replaced by sales forecast graph...</i></h3>
                    </div>
                    <div class="content">
                        <div id="chart-container">
                            <canvas id="trendLine" style="height: 300px"></canvas>
                        </div>
                        <div class="footer">
                            <hr>
                            <div class="stats">
                                <i class="ti-reload"></i> Updated <?= date('F j, Y h:i A') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="header">
                        <h3 class="title" style = "margin-bottom: 10px"><b>Brand Stock</b></h3>
                        <p class="category">
                            <i class="ti-archive" style = "font-size: 12px;"></i> Product stock per brand.
                        </p>
                    </div>
                    <hr>
                    <div class="content">
                        <div id="chart-container">
                            <canvas id="inventoryBar"></canvas>
                        </div>
                        <div class="footer">
                            <hr>
                            <div class="stats">
                                <a href="<?= $this->config->base_url() ?>inventory" style = "text-decoration: underline">See more on Inventory</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card ">
                    <div class="header">
                        <h3 class="title" style = "margin-bottom: 10px"><b>2017 Sales</b></h3>
                        <p class="category"><i class="ti-stats-up" style = "font-size: 12px;"></i> Sales per month in 2017.</p>
                    </div>
                    <hr>
                    <div class="content">
                        <div id="chart-container">
                            <canvas id="salesLine"></canvas>
                        </div>
                        <div class="footer">
                            <hr>
                            <div class="stats">
                                <a href="<?= $this->config->base_url() ?>sales" style = "text-decoration: underline">See more on Sales page</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="header">
                        <h3 class="title" style="margin-bottom: 10px"><b>Latest Customer Activities</b></h3>
                        <p class="category">
                            <i class="ti-reload" style="font-size: 12px;"></i> As of <?= date("F j, Y h:i A"); ?>
                        </p><hr style = 'margin: 5px'>
                    </div>

                    <div class="content table-responsive" style="overflow-y: scroll; height: 200px;">
                        <?php if ($trail): ?>
                            <table class="table table-striped" style = "margin-top: -20px">
                                <thead>
                                <th></th>
                                <th><u style = "color: #31bbe0">Customer</u></th>
                                <th><u style = "color: #31bbe0">Action</u></th>
                                <th><u style = "color: #31bbe0">Date</u></th>
                                <th><u style = "color: #31bbe0">Time</u></th>
                                </thead>
                                <tbody>
                                <?php foreach ($trail as $trail): ?>
                                    <tr>
                                        <?php
                                        $this->db->select("image");
                                        $this->db->select("lastname");
                                        $this->db->select("firstname");
                                        $image = $this->item_model->fetch("customer", "customer_id = " . $trail->customer_id);
                                        foreach ($image as $image):
                                            $user_image = (string) $image->image;
                                            $image_array = explode(".", $user_image);
                                            ?>
                                            <td><p><img src="<?= $this->config->base_url() ?>uploads_users/<?= $image_array[0] . "_thumb." . $image_array[1]; ?>" class="img-responsive img-circle" alt="<?= $trail->customer_name ?>" title="<?= $image->firstname . " " . $image->lastname ?>"></p></td>
                                        <?php endforeach; ?>
                                        <td><?= $trail->customer_name ?></td>
                                        <td><?php if ($trail->at_detail == NULL)
                                                echo "<font color = '#ccc' ><i>NULL</i></font>";
                                            else
                                                echo $trail->at_detail;
                                            ?></td>
                                        <td><?= date("m-j-Y", $trail->at_date) ?></td>
                                        <td><?= date("h:i A", $trail->at_date) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <br>
                            <h3 align="center"><i>There are no recent customer activities recorded.</i></h3>
                        <?php endif; ?>
                    </div>
                    <div class="content">
                        <div class="footer">
                            <hr>
                            <div class="stats">
                                <a href="<?= $this->config->base_url() ?>audit_trail" style = "text-decoration: underline;">See more on Audit Trail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="header">
                        <h3 class="title" style = "margin-bottom: 10px"><b>Weekly Active Customers</b></h3>
                        <p class="category">
                            <i class="ti-reload" style = "font-size: 12px;"></i> As of <?= date("F j, Y h:i A"); ?>
                        </p><hr style = 'margin: 5px'>
                    </div>
                    <div class="content table-responsive" style = "overflow-y: scroll; height: 200px;">
                        <?php if ($customer_limit): ?>
                            <table class="table table-striped" style = "margin-top: -20px">
                                <thead>
                                <th></th>
                                <th ><u style = "color: #31bbe0">Customer</u></th>
                                <th><u style = "color: #31bbe0">Status</u></th>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($customer_limit as $customer):
                                    $date = $this->item_model->max('user_log', array('customer_id' => $customer->customer_id), 'date');
                                    $active_identifier = time() - $date->date;
                                    $userinformation = $this->item_model->fetch('customer', array('customer_id' => $customer->customer_id))[0];
                                    $user_image = (string) $userinformation->image;
                                    $image_array = explode(".", $user_image);
                                    ?>
                                    <tr>
                                        <td><p><img src="<?= $this->config->base_url() ?>uploads_users/<?= $image_array[0] . "_thumb." . $image_array[1]; ?>" class="img-responsive img-circle" alt="<?= $customer->username ?>" title="<?= $customer->firstname . " " . $customer->lastname ?>"></p></td>
                                        <td><?= $customer->username ?></td>
                                        <?php if ($active_identifier < $week) : ?>
                                            <td><span class="text-success">ACTIVE</span></td>
                                        <?php else : ?>
                                            <td><span class="text-danger">INACTIVE</span></td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <br>
                            <h3 align="center"><i>There are no weekly active customers.</i></h3>
                        <?php endif; ?>
                    </div>
                    <div class="content">
                        <div class="footer">
                            <hr>
                            <div class="stats">
                                <a href="<?= $this->config->base_url() ?>reports/active_customers" style = "text-decoration: underline;">See more on User Log</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="header">
                        <h3 class="title" style = "margin-bottom: 10px"><b>Age of Male Customers</b></h3>
                    </div>
                    <hr>
                    <div class="content">
                        <div id="chart-container">
                            <div class="doughnut-chart-container" style = "margin-top: -25px; margin-bottom: 10px;">
                                <canvas id="gender_doughnut1" style = "height: 300px"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="header">
                        <h3 class="title" style = "margin-bottom: 10px"><b>Orders by Gender</b></h3>
                    </div>
                    <hr>
                    <div class="content">
                        <div id="chart-container">
                            <div class="doughnut-chart-container" style = "margin-top: -25px; margin-bottom: 10px;">
                                <canvas id="gender_doughnut" style = "height: 300px"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="header">
                        <h3 class="title" style = "margin-bottom: 10px"><b>Age of Female Customers</b></h3>
                    </div>
                    <hr>
                    <div class="content">
                        <div id="chart-container">
                            <div class="doughnut-chart-container" style = "margin-top: -25px; margin-bottom: 10px;">
                                <canvas id="gender_doughnut2" style = "height: 300px"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="header">
                        <h3 class="title"><b>Most Viewed Products</b></h3>
                    </div>
                    <hr>
                    <div class="content">
                        <div id="chart-container" style = "margin-top: -20px">
                            <canvas id="productViews"></canvas>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="header">
                        <h3 class="title"><b>Most Searched Products</b></h3>
                    </div>
                    <hr>
                    <div class="content">
                        <div id="chart-container" style = "margin-top: -20px">
                            <canvas id="productSearch"></canvas>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="header">
                        <h3 class="title"><b>Most Purchased Products</b></h3>
                    </div>
                    <hr>
                    <div class="content">
                        <div id="chart-container" style = "margin-top: -20px">
                            <canvas id="mostPurchased"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?= base_url() ?>assets/paper/js/inventory_bar.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/paper/js/views_hbar.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/paper/js/purchase_hbar.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/paper/js/search_hbar.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/paper/js/sales_line.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/paper/js/male_doughnut.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/paper/js/female_doughnut.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/paper/js/gender_doughnut.js"></script>