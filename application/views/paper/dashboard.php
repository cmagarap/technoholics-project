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
                                    &#8369; <?php $revenue = $revenue[0];
                                    echo number_format($revenue->income, 0);
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                <i class="ti-calendar"></i> Updated last
                                <?php $sales_date = $sales_date[0];
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
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                <i class="ti-reload"></i> Updated now
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
                                    <?php $product_quantity = $product_quantity[0];
                                    echo $product_quantity->product_quantity;
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                <i class="ti-reload"></i> Updated now
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
                                <?php $orders_date = $orders_date[0];
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
                        <h4 class="title">Users Behavior</h4>
                        <p class="category">24 Hours performance</p>
                    </div>
                    <div class="content">
                        <div id="chartHours" class="ct-chart"></div>
                        <div class="footer">
                            <div class="chart-legend">
                                <i class="fa fa-circle text-info"></i> Open
                                <i class="fa fa-circle text-danger"></i> Click
                                <i class="fa fa-circle text-warning"></i> Click Second Time
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="ti-reload"></i> Updated 3 minutes ago
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
                        <h4 class="title" style = "margin-bottom: 10px"><b>Brand Stock</b></h4>
                        <p class="category">
                            <i class="ti-reload" style = "font-size: 12px;"></i> As of <?= date("F j, Y h:i A"); ?>
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
                        <h4 class="title" style = "margin-bottom: 10px"><b>Monthly Sales</b></h4>
                        <p class="category">All products including Taxes</p>
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
                        <h4 class="title" style = "margin-bottom: 10px"><b>Latest Customer Activities</b></h4>
                        <p class="category">
                            <i class="ti-reload" style = "font-size: 12px;"></i> As of <?= date("F j, Y h:i A"); ?>
                        </p><hr style = 'margin: 5px'>
                    </div>
                    <div class="content table-responsive" style = "overflow-y: scroll; height: 200px;">
                        <table class="table table-striped" style = "margin-top: -20px">
                            <thead>
                            <th>#</th>
                            <th><u style = "color: #31bbe0">Customer</u></th>
                            <th><u style = "color: #31bbe0">Action</u></th>
                            <th><u style = "color: #31bbe0">Date</u></th>
                            <th><u style = "color: #31bbe0">Time</u></th>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($trail as $trail):?>
                                <tr>
                                    <td><?= $trail->at_id ?></td>
                                    <td><?= $trail->customer_name ?></td>
                                    <td><?php if($trail->at_detail == NULL) echo "<font color = '#ccc' ><i>NULL</i></font>";
                                        else echo $trail->at_detail; ?></td>
                                    <td><?= date("m-j-Y", $trail->at_date) ?></td>
                                    <td><?= date("h:i A", $trail->at_date) ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
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
                        Brand trend sana, di pa sure yung sa chart dito
                        <br>- seej
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="header">
                        <h4 class="title" style = "margin-bottom: 10px"><b>Age of Male Customers</b></h4>
                    </div>
                    <hr>
                    <div class="content">
                        <div id="chart-container">
                            <div class="doughnut-chart-container" style = "margin-top: -25px; margin-bottom: 10px;">
                                <canvas id="gender_doughnut1" style = "height: 300px"></canvas>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                <i class="ti-reload"></i> Updated Now
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="header">
                        <h4 class="title" style = "margin-bottom: 10px"><b>Orders by Gender</b></h4>
                    </div>
                    <hr>
                    <div class="content">
                        <div id="chart-container">
                            <div class="doughnut-chart-container" style = "margin-top: -25px; margin-bottom: 10px;">
                                <canvas id="gender_doughnut" style = "height: 300px"></canvas>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                <i class="ti-reload"></i> Updated Now
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="header">
                        <h4 class="title" style = "margin-bottom: 10px"><b>Age of Female Customers</b></h4>
                    </div>
                    <hr>
                    <div class="content">
                        <div id="chart-container">
                            <div class="doughnut-chart-container" style = "margin-top: -25px; margin-bottom: 10px;">
                                <canvas id="gender_doughnut2" style = "height: 300px"></canvas>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                <i class="ti-reload"></i> Updated Now
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="header">
                        <h4 class="title" style = "margin-bottom: 10px"><b>Top 5 Most Viewed Products</b></h4>
                    </div>
                    <hr>
                    <div class="content">
                        <div id="chart-container" style = "margin-top: -20px">
                            <canvas id="productViews"></canvas>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                <i class="ti-reload"></i> Updated Now
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="header">
                        <h4 class="title" style = "margin-bottom: 10px"><b>Top 5 Most Searched Products</b></h4>
                    </div>
                    <hr>
                    <div class="content">
                        <div id="chart-container" style = "margin-top: -20px">
                            <canvas id="productSearch"></canvas>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                <i class="ti-reload"></i> Updated Now
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="header">
                        <h4 class="title" style = "margin-bottom: 10px"><b>Top 5 Most Purchased Products</b></h4>
                    </div>
                    <hr>
                    <div class="content">
                        <div id="chart-container" style = "margin-top: -20px">
                            <canvas id="mostPurchased"></canvas>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                <i class="ti-reload"></i> Updated Now
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?= base_url() ?>assets/js/inventory_bar.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/views_hbar.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/purchase_hbar.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/search_hbar.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/sales_line.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/male_doughnut.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/female_doughnut.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/gender_doughnut.js"></script>