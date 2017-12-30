<div id="all">

    <div id="content">
        <div class="container">

            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li>Checkout - Order review</li>
                </ul>
            </div>

            <div class="col-md-9" id="checkout">

                <div class="box">
                    <form method="post" action="<?= base_url().'home/checkout4'; ?>">
                        <h1>Checkout - Order review</h1>
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="<?= base_url().'home/checkout1'; ?>"><i class="fa fa-map-marker"></i><br>Address</a>
                            </li>
                            <li><a href="<?= base_url().'home/checkout2'; ?>"><i class="fa fa-truck"></i><br>Delivery Method</a>
                            </li>
                            <li><a href="<?= base_url().'home/checkout3'; ?>"><i class="fa fa-money"></i><br>Payment Method</a>
                            </li>
                            <li class="active"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a>
                            </li>
                        </ul>

                        <div class="content">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th colspan="2">Product</th>
                                        <th></th>
                                        <th>Quantity</th>
                                        <th>Unit price</th>
                                        <th>Subtotal</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if($CTI > 0){
                                        //get cart items from session
                                        foreach($cartItems as $item){
                                    ?>
                                    <tr>
                                    <td>
                                        <a href="#">
                                            <img src="<?= base_url().'uploads_products/'.$item["img"]?>" alt="White Blouse Armani">
                                        </a>
                                    </td>
                                    <td>
                                    </td>
                                    <td><a href="#"><?= $item["name"] ?></a>
                                    </td>
                                    <td>
                                        <?= $item["qty"]; ?>
                                    </td>
                                    <td><?php echo '₱'.number_format($item["price"],2)?> </td>
                                    <!-- <td>$0.00</td> -->
                                    <td><?php echo '₱'.number_format($item["subtotal"],2) ?></td>
                                </tr>
                                    <?php } }else{ ?>
                                    <tr><td colspan="5"><p>Your cart is empty.....</p></td>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                <?php if($CTI > 0){ ?>
                                    <th colspan="5">Total</th>
                                    <th colspan="2"><?='₱'.number_format($CT,2)?></th>
                                    <?php } ?>
                                </tr>
                                </tfoot>
                                </table>

                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.content -->

                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="<?= base_url().'home/checkout3'; ?>" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to Payment method</a>
                            </div>
                            <div class="pull-right">
                            <a href="<?= base_url().'home/placeorder'; ?>">
                                <button type="submit" class="btn btn-primary">Place an order<i class="fa fa-chevron-right"></i>
                            </a>
                            </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box -->


            </div>
            <!-- /.col-md-9 -->

            <div class="col-md-3">

                <div class="box" id="order-summary">
                    <div class="box-header">
                        <h3>Order summary</h3>
                    </div>
                    <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>Order subtotal</td>
                                <th>$446.00</th>
                            </tr>
                            <tr>
                                <td>Shipping and handling</td>
                                <th>$10.00</th>
                            </tr>
                            <tr>
                                <td>Tax</td>
                                <th>$0.00</th>
                            </tr>
                            <tr class="total">
                                <td>Total</td>
                                <th>$456.00</th>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
            <!-- /.col-md-3 -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /#content -->
