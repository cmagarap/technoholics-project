<?php $products = $products[0]; ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-1 col-md-5"></div>
            <div class="col-lg-5 col-md-5">
                <div class="card card-user">
                    <div class="content">
                        <div>
                            <img src="<?= $this->config->base_url() ?>uploads_products/<?= $products->product_image1 ?>" alt="<?= $products->product_name ?>" title = "<?= $products->product_name ?>" width= "100%"/>
                        </div>
                        <div align = "center">
                            <br><hr><br>
                            <h4 class="title"><?= $products->product_name ?><br />
                                <a><small><?= $products->product_category ?></small></a>
                            </h4>
                            <br>
                            <h7 class = "text-info"><i><?= $products->product_desc ?></i></h7>
                            <br>
                        </div>
                    </div>
                    <hr>
                    <div class="text-center">
                        <div class="row">
                            <div class="col-md-3 col-md-offset-1">
                                <h5><?= $products->times_bought; ?><br /><small>Sold</small></h5> <!-- not yet sure about this -->
                            </div>
                            <div class="col-md-4">
                                <h5>&#8369; <?= number_format($products->product_price, 2) ?><br /><small>Price</small></h5>
                            </div>
                            <div class="col-md-3">
                                <h5><?php
                                    if($products->product_quantity == 0) {
                                        echo "<font color = 'red'>$products->product_quantity</font>";
                                    } else {
                                        echo $products->product_quantity;
                                    }
                                     ?><br><small>Stock</small>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <br>
                    <div align="center">
                        <a href = "<?= base_url() ?>inventory/page" class="btn btn-info btn-fill btn-wd" style = "background-color: #dc2f54; border-color: #dc2f54; color: white;">Go back</a>
                    </div>
                    <br>
                </div>
            </div>
            <div class="col-lg-5 col-md-7">
                <div class="card">
                    <div class="header">
                        <h4 class="title"><b>Previous Buyers</b></h4>
                        <!--<p class="category"><i>The last buyers of the product</i></p>-->
                    </div>
                    <div class="content">
                        <ul class="list-unstyled team-members">
                            <?php if($buyers):
                            for($i = 0; $i < sizeof($buyers); $i++): ?>
                            <li>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <div class="avatar">
                                            <?php
                                            $user_image = (string)$buyers[$i][0]->image;
                                            $image_array = explode(".", $user_image);
                                            ?>
                                            <img src="<?= $this->config->base_url() ?>uploads_users/<?= $image_array[0] . "_thumb." . $image_array[1]; ?>" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <?= $buyers[$i][0]->username ?>
                                        <br />
                                        <span class="text-muted"><small>Offline</small></span>
                                    </div>
                                    <div class="col-xs-3 text-right">
                                        <button class="btn btn-sm btn-success btn-icon"><i class="fa fa-envelope"></i></button>
                                    </div>
                                </div>
                            </li>
                            <?php endfor;
                            else:
                                echo "<center><h5><hr><br>There are no past buyers recorded or buyer's account is deactivated.</h5><br></center>";
                            endif; ?>
                        </ul>
                    </div> <!-- content -->
                </div> <!-- card -->
            </div> <!-- col-lg-5 col-md-7 -->
        </div> <!-- row -->
    </div> <!-- container fluid -->
</div> <!-- content -->