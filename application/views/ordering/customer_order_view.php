<?php
if($order->process_status == 0){
    $percent = 0;
}
elseif($order->process_status == 1){
    $percent = 16;
}
elseif($order->process_status == 2){
    $percent = 50;
}
elseif($order->process_status == 3){
    $percent = 100;
}

$userinfo = $this->item_model->fetch('customer',array('customer_id' => $order->customer_id))[0];
?>
<div id="all">
    <div id="content">
        <div class="container">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="<?= base_url().'home'?>">Home</a>
                    </li>
                    <li><a href="<?= base_url().'home/customer_orders'?>">My orders</a>
                    </li>
                    <li>Order #<?=$order->order_id?></li>
                </ul>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default sidebar-menu">
                    <div class="panel-heading">
                        <h3 class="panel-title">Customer section</h3>
                    </div>
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">
                            <li class="active">
                                <a href="<?= base_url().'home/customer_orders'?>"><i class="fa fa-list"></i> My orders</a>
                            </li>
                            <li>
                                <a href="<?= base_url().'home/wishlist'?>"><i class="fa fa-heart"></i> My wishlist</a>
                            </li>
                            <li>
                                <a href="<?= base_url().'home/account'?>"><i class="fa fa-user"></i> My account</a>
                            </li>
                            <li>
                                <a href="<?= base_url().'home/logout'?>"><i class="fa fa-sign-out"></i> Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9" id="customer-order">
                <div class="box">
                    <h1>Order #<?=$order->order_id?></h1>
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 form-box">
                            <form class="order" role="form" action="" method="post" class="f1">
                                <div class="f1-steps">
                                    <div class="f1-progress">
                                        <div class="f1-progress-line" data-number-of-steps="3" style="width: <?=$percent?>%;" >    
                                        </div>
                                    </div>
                                    <div class="f1-step <?php if($order->process_status == 1 || $order->process_status == 2 || $order->process_status == 3 ) echo "active" ?>">
                                        <div class="f1-step-icon"><i class="fa fa-info"></i></div>
                                        <p>Order Confirmation</p>
                                    </div>
                                    <div class="f1-step <?php if($order->process_status == 2 || $order->process_status == 3) echo "active" ?>">
                                        <div class="f1-step-icon"><i class="fa fa-truck"></i></div>
                                        <p>Shipped</p>
                                    </div>
                                    <div class="f1-step <?php if($order->process_status == 3) echo "active" ?>">
                                        <div class="f1-step-icon"><i class="fa fa-shopping-bag"></i></div>
                                        <p>Delivered</p>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th colspan="2">Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($order_status as $order_status): ?>
                                    <tr>
                                        <td><?=date("F j, Y",$order_status->transaction_date)?></td>
                                        <td><?=$order_status->description_status?></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th colspan="2">Product</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($order_items as $order_items): ?>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <a href="#">
                                                <img src = "<?= $this->config->base_url() ?>uploads_products/<?=$order_items->product_image1?>">
                                            </a>
                                        </td>
                                        <td><a href="#"><?= $order_items->product_name ?></a></td>
                                        <td><?= $order_items->quantity ?></td>
                                        <td>&#8369;<?= number_format($order_items->product_price, 2) ?></td>
                                        <td>&#8369;<?= number_format($order_items->product_subtotal, 2) ?></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
<!--                                 <tfoot>
                                    <tr>
                                        <th colspan="5" class="text-right">Order subtotal</th>
                                        <th>$446.00</th>
                                    </tr>
                                    <tr>
                                        <th colspan="5" class="text-right">Shipping and handling</th>
                                        <th>$10.00</th>
                                    </tr>
                                    <tr>
                                        <th colspan="5" class="text-right">Tax</th>
                                        <th>$0.00</th>
                                    </tr>
                                    <tr>
                                        <th colspan="5" class="text-right">Total</th>
                                        <th>$456.00</th>
                                    </tr>
                                </tfoot> -->
                                <tfoot>
                                    <tr>
                                        <th colspan="5"><b>Total</b></th>
                                        <th colspan="2"><b>&#8369;<?=number_format($order->total_price,2)?></b></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.table-responsive -->

                        <div class="row addresses">
                            <div class="col-md-6" align="left">
                                <h2>Shipping address</h2>
                                <p><?=$userinfo->firstname?> <?=$userinfo->lastname?>
                                    <br><?=$order->shipping_address?>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <!-- /.container -->
        </div>