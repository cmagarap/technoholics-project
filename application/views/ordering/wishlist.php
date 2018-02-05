
            <div class="col-md-9" id="wishlist">

                <ul class="breadcrumb">
                    <li><a href="<?= base_url().'home'; ?>">Home</a>
                    </li>
                    <li>Wishlist</li>
                </ul>

                <div class="box">
                    <h1>My Wishlist</h1>
                </div>
                <?php if (!$wishes): ?>
                    <div class="col-md-12">
                        <div class="box" align = "center">
                            <h3>Oops! You don't have any wishes yet.</h3>
                        </div>
                    </div>
                <?php else: ?>
                <?php foreach ($wishes as $row): ?>
                    <div class="col-md-4 col-sm-6">
                        <div class="product" style="height:430px;">
                            <div class="flip-container" style="padding: 10px;">
                                <p align="right"><button type="submit" name="remove" class="btn btn-danger remove_inventory" value="<? $row->wishlist_id ?>"><i class="fa fa-trash-o fa-lg"></i></button></p>
                                <div class="flipper">
                                    <div class="front"><center>
                                            <a href="<?= base_url() . 'home/detail/' . $row->product_category . '/' . $row->product_brand . '/' . $row->product_id ?>">
                                                <img src="<?= base_url() . 'uploads_products/' . $row->product_image1 ?>" alt="" class="img-responsive" style="width: auto; height: 150px;">
                                            </a></center>
                                    </div>
                                    <div class="back"><center>
                                            <a href="<?= base_url() . 'home/detail/' . $row->product_category . '/' . $row->product_brand . '/' . $row->product_id ?>">
                                                <img src="<?= base_url() . 'uploads_products/' . $row->product_image1 ?>" alt="" class="img-responsive" style="width: auto; height: 150px;">
                                            </a></center>
                                    </div>
                                </div>
                            </div>
                            <a href="<?= base_url() . 'home/detail/' . $row->product_category . '/' . $row->product_brand . '/' . $row->product_id ?>" class="invisible">
                                <img src="<?= base_url() . 'uploads_products/' . $row->product_image1 ?>" alt="" class="img-responsive" style="width: auto; height: 150px;">
                            </a>
                            <div class="text">
                                <h3><a href="<?= base_url() . 'home/detail/' . $row->product_category . '/' . $row->product_brand . '/' . $row->product_id ?>"><?= $row->product_name ?></a></h3>
                                <p class="price">₱<?= number_format($row->product_price, 2) ?></p>
                                <p class="buttons">
                                    <a href="<?= base_url() . 'home/detail/' . $row->product_category . '/' . $row->product_brand . '/' . $row->product_id ?>"  class="btn btn-default">View detail</a>
                                </p>
                            </div>
                            <!-- /.text -->
                        </div>
                        <!-- /.product -->
                    </div>
                    <!-- /.col-md-4 -->
                <?php endforeach ?>
            </div>
            <?php endif ?>


            </div> <!-- /.container -->
    </div>
    <!-- /#content -->