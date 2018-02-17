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
?>
<div id="content">
    <div class="container">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="<?= base_url() . 'home'; ?>">Home</a>
                </li>
                <li><a href="<?= base_url() . 'home/trackorder'; ?>">My Orders</a></li>
                <li><?=$title?></li>
            </ul>
            <div class="box">
                <h1>Order Status</h1>
            </div>
            <div class="box">
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
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($orderstatus as $orderstatus): ?>
                        <tr>
                            <td><?=date("F j, Y",$orderstatus->transaction_date)?></td>
                            <td><?=$orderstatus->description_status?></td>
                        </tr>
                        <?php endforeach ?>
                        </tbody>
                        <tfoot>
                        <tr>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

