<div id="all">
    <div id="content">
        <div class="container">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="<?= base_url().'home'; ?>">Home</a>
                    </li>
                    <li>Shopping cart</li>
                </ul>
            </div>
            <div class="col-md-9" id="basket">
                <div class="box">
                    <form method="post" action="<?= base_url().'home/checkout1'; ?>" id="form">
                        <h1>Shopping cart</h1>
                        <p class="text-muted">You currently have <?= $CTI ?> item(s) in your cart.</p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="2">Product</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
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
                                                        <img src="<?= base_url().'uploads_products/'.$item["img"]?>" alt="<?= $item["name"] ?>">
                                                    </a>
                                                </td>
                                                <td><a href="#"><?= $item["name"] ?></a>
                                                </td>
                                                <td>
                                                    <input type="number" id="update" name="update" class="form-control text-center update" value="<?= $item["qty"]; ?>" data-rowid="<?=$item["rowid"]?>" data-maxqty="<?=$item["maxqty"]?>">
                                                </td>
                                                <td><?php echo '₱'.number_format($item["price"],2)?> </td>
                                                <!-- <td>$0.00</td> -->
                                                <td id="subtotal<?=$item["id"]?>" >&#8369;<?php echo number_format($item["subtotal"],2) ?></td>
                                                <td>
                                                    <button type="button" name="remove" class="btn btn-danger remove_inventory" data-rowid="<?=$item["rowid"]?>"><i class="fa fa-trash-o fa-lg"></i></button>
                                                </td>
                                            </tr>
                                            <?php } }else{ ?>
                                            <tr><td colspan="5"><p>Your cart is empty.</p></td>
                                                <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <?php if($CTI > 0){ ?>
                                                    <th colspan="5">Total</th>
                                                    <th colspan="2">&#8369;<?=number_format($CT,2)?></th>
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
                            <div class="box">
                                <h3>You may also like these products.</h3>
                            </div>
                            <div class="row products">
                                <?php if($this->session->has_userdata('suggest')){ $suggest = $this->session->userdata('suggest'); } else{ $suggest = $product;} foreach ($suggest as $suggest): ?>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="product" style="box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);">
                                            <div class="image_container" align="center" >
                                                <a href="<?= base_url() . 'home/detail/' . $suggest->product_category . '/' . $suggest->product_brand . '/' . $suggest->product_id .'/page'?>">
                                                    <img class="product_image img-responsive" src="<?= base_url() . 'uploads_products/' . $suggest->product_image1 ?>" alt="<?= $suggest->product_name ?>">
                                                </a>
                                            </div>
                                            <div class="text">
                                                <h3><a href="<?= base_url() . 'home/detail/' . $suggest->product_category . '/' . $suggest->product_brand . '/' . $suggest->product_id.'/page'?>"><?= $suggest->product_name ?></a></h3>
                                                <p class="price">&#8369;<?= number_format($suggest->product_price, 2) ?></p>
                                                <p class="buttons"><a href="<?= base_url() . 'home/detail/' . $suggest->product_category . '/' . $suggest->product_brand . '/' . $suggest->product_id.'/page' ?>"  class="btn btn-default">View detail</a>
                                                    <button <?php if(!$suggest->product_quantity) { echo 'disabled'; }?> type="button" class="btn btn-primary add_cart" data-productname="<?= $suggest->product_name ?>" data-productimg="<?= $suggest->product_image1 ?>"  data-productquantity="<?= $suggest->product_quantity ?>" data-price="<?= $suggest->product_price ?>" data-productid="<?= $suggest->product_id ?>"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                </p>
                                            </div>
                                            <!-- /.text -->
                                            <?php if (!$suggest->product_quantity): ?>
                                                <div class="ribbon sale" >
                                                    <div class="theribbon" style="background-color:#dc2f54">OUT OF STOCK</div>
                                                    <div class="ribbon-background"></div>
                                                </div>
                                            <?php endif ?>
                                        </div>
                                        <!-- /.product -->
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <!-- /.col-md-9 -->
                        <div class="col-md-3">
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
         </div>
