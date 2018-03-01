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
                    <form Method="post" action="<?= base_url().'home/placeorder';?>">
                        <h1>Checkout - Order review</h1>
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="<?= base_url().'home/checkout1';?>"><i class="fa fa-map-marker"></i><br>Address</a>
                            </li>
                            <li><a href="<?= base_url().'home/checkout2';?>"><i class="fa fa-truck"></i><br>Delivery Method</a>
                            </li>
                            <li><a href="<?= base_url().'home/checkout3';?>"><i class="fa fa-money"></i><br>Payment Method</a>
                            </li>
                            <li class="active"><a href="#" style = "cursor: auto"><i class="fa fa-eye"></i><br>Order review</a>
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
                                    <td><?php echo '&#8369;'.number_format($item["price"],2)?> </td>
                                    <!-- <td>$0.00</td> -->
                                    <td><?php echo '&#8369;'.number_format($item["subtotal"],2) ?></td>
                                </tr>
                                    <?php } }else{ ?>
                                    <tr><td colspan="5"><p>Your cart is empty.</p></td>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                <?php if($CTI > 0){ ?>
                                    <th colspan="5">Total Product Price</th>
                                    <th colspan="2"><?= '&#8369;'.number_format($CT,2)?></th>
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
                                <a href="<?= base_url().'home/checkout3'; ?>" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to Payment Method</a>
                            </div>
                            <div class="pull-right">
                            <button type="submit" class="btn btn-primary">Place Order<i class="fa fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    <?php if (!$this->session->has_userdata('isloggedin')) :?>
                        <input type="hidden" name="firstname" value="<?= $fname ?>">
                        <input type="hidden" name="lastname" value="<?= $lname ?>">
                        <input type="hidden" name="address" value="<?= $address ?>">
                        <input type="hidden" name="province" value="<?= $province ?>">
                        <input type="hidden" name="city" value="<?= $city ?>">
                        <input type="hidden" name="barangay" value="<?= $barangay ?>">
                        <input type="hidden" name="zip" value="<?= $zip ?>">
                        <input type="hidden" name="email" value="<?= $email ?>">
                        <input type="hidden" name="contact" value="<?= $contact ?>">
                        <input type="hidden" name="payment" value="<?= $payment ?>">
                        <input type="hidden" name="shipper_name" value="<?= $shipper_name ?>">
                        <input type="hidden" name="shipper_price" value="<?= $shipper_price?>">
                    <?php else :?>
                        <input type="hidden" name="payment" value="<?= $payment ?>">
                        <input type="hidden" name="shipper_name" value="<?= $shipper_name ?>">
                        <input type="hidden" name="shipper_price" value="<?= $shipper_price?>">
                    <?php endif;?>
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
                                <th><p style = "font-size: 12px; display: inline">&#8369;</p><?= number_format($CT,2); ?></th>
                            </tr>
                            <tr>
                                <td>Shipping and handling</td>
                                <!-- SHIPPING FEE IS STILL STATIC, THE AMOUNT SHOULD BE ASKED TO THE CLIENT -->
                                <th><p style = "font-size: 12px; display: inline">&#8369;</p><?=$shipper_price?></th>
                            </tr>
                            <!--<tr>
                                <td>Discount</td>
                                <th><p style = "font-size: 12px; display: inline">&#8369;</p>0.00</th>
                            </tr>-->
                            <tr class="total">
                                <td>Total</td>
                                <th><u>&#8369;<?= number_format($CT + $shipper_price,2)?></u></th>
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
