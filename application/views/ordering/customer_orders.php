<div id="all">
    <div id="content">
        <div class="container">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="<?= base_url().'home'?>">Home</a>
                    </li>
                    <li>My orders</li>
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
                                <a href="customer-wishlist.html"><i class="fa fa-heart"></i> My wishlist</a>
                            </li>
                            <li>
                                <a href="customer-account.html"><i class="fa fa-user"></i> My account</a>
                            </li>
                            <li>
                                <a href="index.html"><i class="fa fa-sign-out"></i> Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9" id="customer-orders">
                <div class="box">
                    <h1>My Orders</h1>
                    <p class="lead">Your orders on one place.</p>
                    <p class="text-muted">If you have any questions, please feel free to <a href="<?= base_url().'home/contact'?>">contact us</a>, our customer service center is working for you 24/7.</p>
                    <hr>
                    <?php if (!$orders): ?>
                        <div align = "center">
                            <h3>Oops! You don't have any orders yet.</h3>
                        </div>
                    <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Order</th>
                                <th>Date</th>
                                <th>Total Quantity</th>
                                <th>Total Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($orders as $orders): ?>
                            <tr>
                                <th>#<?=$orders->order_id?></th>
                                <td><?=date("F d, Y",$orders->delivery_date)?></td>
                                <td><?=$orders->order_quantity?></td>
                                <td>&#8369;<?= number_format($orders->total_price, 2) ?></td>
                                <td>
                                <a href="<?= base_url() . 'home/customer_order_view/' . $orders->order_id ?>" class="btn btn-primary" alt = "View Order" title = "View order" >VIEW</a> 
                                <a class="btn btn-danger  cancel <?php if ($orders->process_status == 0 || $orders->process_status == 3) echo 'disabled'; ?>" data-id="<?= $orders->order_id ?>" title = "Cancel order" alt = "Cancel order">CANCEL</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php endif ?>
                        </tbody>
                    </table>
                    <?php echo "<div align = 'center'>" . $links . "</div>"; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(".cancel").click(function () {
    var id = $(this).data('id');
    swal({
        title: "Are you sure you want to cancel this order?",
        text: "You won't be able to undo this action once cancelled.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "<?= $this->config->base_url() ?>home/cancel_order/" + id;
            } else {
                swal("This order is safe!");
            }
        });
});
</script>