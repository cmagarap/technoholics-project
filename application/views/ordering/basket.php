<div id="all">

    <div id="content">
        <div class="container">

            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li>Shopping cart</li>
                </ul>
            </div>

            <div class="col-md-9" id="basket">

                <div class="box">

                    <form method="post" action="<?= base_url().'home/checkout1'; ?>">

                        <h1>Shopping cart</h1>
                        <p class="text-muted">You currently have <?=$CTI?> item(s) in your cart.</p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th colspan="2">Product</th>
                                    <th>Quantity</th>
                                    <th>Unit price</th>
                                    <!-- <th>Discount</th> -->
                                    <th colspan="2">Subtotal</th>
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
                                    <td><a href="#"><?= $item["name"] ?></a>
                                    </td>
                                    <td>
                                        <input type="number" id="update" name="update" class="form-control text-center update" value="<?= $item["qty"]; ?>" data-productid= "<?=$item["rowid"]?>">
                                    </td>
                                    <td><?php echo '₱'.number_format($item["price"],2)?> </td>
                                    <!-- <td>$0.00</td> -->
                                    <td><?php echo '₱'.number_format($item["subtotal"],2) ?></td>
                                    <td>
                                    <button type="button" name="remove" class="btn btn-danger btn-xs remove_inventory" id="<?=$item["rowid"]?>">Remove</button>
                                    </td>
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
                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="<?= base_url().'home/category'; ?>" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue shopping</a>
                            </div>
                            <?php if($CTI > 0){ ?>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary">Proceed to checkout <i class="fa fa-chevron-right"></i>
                                </button>
                            </div>
                            <?php } ?>
                        </div>

                    </form>

                </div>
                <!-- /.box -->


                <div class="row same-height-row">
                    <div class="col-md-3 col-sm-6">
                        <div class="box same-height">
                            <h3>You may also like these products</h3>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="product same-height">
                            <div class="flip-container">
                                <div class="flipper">
                                    <div class="front">
                                        <a href="<?= base_url().'home/detail'; ?>">
                                            <img src="<?= base_url().'assets/ordering/img/product2.jpg'; ?>" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="back">
                                        <a href="<?= base_url().'home/detail'; ?>">
                                            <img src="<?= base_url().'assets/ordering/img/product2_2.jpg'; ?>" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <a href="<?= base_url().'home/detail'; ?>" class="invisible">
                                <img src="<?= base_url().'assets/ordering/img/product2.jpg'; ?>" alt="" class="img-responsive">
                            </a>
                            <div class="text">
                                <h3>Fur coat</h3>
                                <p class="price">$143</p>
                            </div>
                        </div>
                        <!-- /.product -->
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="product same-height">
                            <div class="flip-container">
                                <div class="flipper">
                                    <div class="front">
                                        <a href="<?= base_url().'home/detail'; ?>">
                                            <img src="<?= base_url().'assets/ordering/img/product1.jpg'; ?>" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="back">
                                        <a href="<?= base_url().'home/detail'; ?>">
                                            <img src="<?= base_url().'assets/ordering/img/product1_2.jpg'; ?>" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <a href="<?= base_url().'home/detail'; ?>" class="invisible">
                                <img src="<?= base_url().'assets/ordering/img/product1.jpg'; ?>" alt="" class="img-responsive">
                            </a>
                            <div class="text">
                                <h3>Fur coat</h3>
                                <p class="price">$143</p>
                            </div>
                        </div>
                        <!-- /.product -->
                    </div>


                    <div class="col-md-3 col-sm-6">
                        <div class="product same-height">
                            <div class="flip-container">
                                <div class="flipper">
                                    <div class="front">
                                        <a href="<?= base_url().'home/detail'; ?>">
                                            <img src="<?= base_url().'assets/ordering/img/product3.jpg'; ?>" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="back">
                                        <a href="<?= base_url().'home/detail'; ?>">
                                            <img src="<?= base_url().'assets/ordering/img/product3_2.jpg'; ?>" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <a href="<?= base_url().'home/detail'; ?>" class="invisible">
                                <img src="<?= base_url().'assets/ordering/img/product3.jpg'; ?>" alt="" class="img-responsive">
                            </a>
                            <div class="text">
                                <h3>Fur coat</h3>
                                <p class="price">$143</p>

                            </div>
                        </div>
                        <!-- /.product -->
                    </div>

                </div>


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


                <div class="box">
                    <div class="box-header">
                        <h4>Coupon code</h4>
                    </div>
                    <p class="text-muted">If you have a coupon code, please enter it in the box below.</p>
                    <form>
                        <div class="input-group">

                            <input type="text" class="form-control">

                            <span class="input-group-btn">

					<button class="btn btn-primary" type="button"><i class="fa fa-gift"></i></button>

				    </span>
                        </div>
                        <!-- /input-group -->
                    </form>
                </div>

            </div>
            <!-- /.col-md-3 -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /#content -->