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
                                            <td colspan="5"><p>Your cart is empty.</p></td>
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
                                        <a href="javascript:history.go(-1)" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue shopping</a>
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
                        <div id="hot">
                            <div class="product-slider">
                                <?php if($this->session->has_userdata('suggest')){ $temp_suggest = $this->session->userdata('suggest'); shuffle($temp_suggest);} else{ $temp_suggest = $product;} foreach ($temp_suggest as $temp_suggest): 
                                $suggest = $this->item_model->fetch('product',"product_id = '$temp_suggest' AND status = 1")[0];?>
                                <div class="item" style="margin: 0 10px; visibility: hidden;">
                                    <div class="product">
                                        <div class="image_container" align="center">
                                            <a href="<?= base_url() . 'home/detail/' . $suggest->product_category . '/' . $suggest->product_brand . '/' . $suggest->product_id .'/page'?>">
                                                <img src="<?= base_url() . 'uploads_products/' . $suggest->product_image1 ?>" alt="<?= $suggest->product_name ?>" class="product_image">
                                            </a>
                                        </div>
                                        <div class="text">
                                            <h3><a href="<?= base_url() . 'home/detail/' . $suggest->product_category . '/' . $suggest->product_brand . '/' . $suggest->product_id .'/page'?>"><?= $suggest->product_name ?></a></h3>
                                            <p class="price">&#8369;<?= number_format($suggest->product_price, 2) ?></p>
                                        </div>
                                        <!-- /.text -->
                                    </div>
                                    <!-- /.product -->
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-9 -->
                <div class="col-md-3">
                    <div class="box">
                        <div class="box-header">
                            <h4>Coupon code</h4>
                        </div>
                        <p class="text-muted">If you have a coupon code, please enter it in the box below.</p>
                        <form method="post" action="<?= base_url().'home/promo_exec';?>" >
                            <div class="input-group">

                                <input type="text" name="promo_code" class="form-control">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-gift"></i></button>
                                </span>
                            </div>
                            <!-- /input-group -->
                            <?php if(validation_errors()):
                            echo "<span style = 'color: red'>" . form_error("promo_code") . "</span>";
                        elseif ($this->session->flashdata('error')): 
                            echo "<span style = 'color: red'>" . $this->session->flashdata('error') . "</span>";
                            endif; ?>
                        </form>
                    </div>
                </div>
                <!-- /.col-md-3 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
    </div>
