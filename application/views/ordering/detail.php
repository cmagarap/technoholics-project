<?php $row = $product[0];
# whenever viewed, update the no_of_views in the products table
$stat_views = $row->no_of_views + 1;
$this->item_model->updatedata("product", array("no_of_views" => $stat_views), "product_id = " . $this->uri->segment(5));
?>
        <!-- header_top -->
        <!-- content -->
        <div id="all">
            <div id="content">
                <div class="container">

                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="<?= base_url() . 'home'; ?>">Home</a>
                            </li>
                            <li><a href="<?= base_url() . 'home/category/' . $category; ?>"><?= $category ?></a>
                            </li>
                            <li><a href="<?= base_url() . 'home/category/' . $category . '/' . $brand; ?>"><?= $brand ?></a>
                            </li>
                            <li><?= $row->product_name ?></li>
                        </ul>

                    </div>

                    <div class="col-md-3">
                        <!-- *** MENUS AND FILTERS ***
_________________________________________________________ -->
                        <div class="panel panel-default sidebar-menu">

                            <div class="panel-heading">
                                <h3 class="panel-title">Categories</h3>
                            </div>

                            <div class="panel-body">
                                <ul class="nav nav-pills nav-stacked category-menu">

                                    <?php if ($category == "Accessories") : ?>
                                        <li class="active">
                                        <?php else : ?>
                                        <li>
                                        <?php endif; ?>
                                        <a href="<?= base_url() . 'home/category/accessories'; ?>">Accessories<span class="badge pull-right"><?= $this->item_model->getCount('product', "product_category = 'Accessories'"); ?></span></a>
                                    </li></li>

                                    <?php if ($category == "Chargers") : ?>
                                        <li class="active">
                                        <?php else : ?>
                                        <li>
                                        <?php endif; ?>
                                        <a href="<?= base_url() . 'home/category/chargers'; ?>">Chargers<span class="badge pull-right"><?= $this->item_model->getCount('product', "product_category = 'Chargers'"); ?></span></a>
                                    </li></li>

                                    <?php if ($category == "Laptop") : ?>
                                        <li class="active">
                                        <?php else : ?>
                                        <li>
                                        <?php endif; ?>
                                        <a href="<?= base_url() . 'home/category/laptop'; ?>">Laptops<span class="badge pull-right"><?= $this->item_model->getCount('product', "product_category = 'Laptop'"); ?></span></a>
                                        <ul>
                                            <li><a href="<?= base_url() . 'home/category/laptop/Acer'; ?>">Acer</a>
                                            </li>
                                            <li><a href="<?= base_url() . 'home/category/laptop/ASUS'; ?>">ASUS</a>
                                            </li>
                                            <li><a href="<?= base_url() . 'home/category/laptop/Dell'; ?>">Dell</a>
                                            </li>
                                            <li><a href="<?= base_url() . 'home/category/laptop/HP'; ?>">HP</a>
                                            </li>
                                            <li><a href="<?= base_url() . 'home/category/laptop/Lenovo'; ?>">Lenovo</a>
                                            </li>
                                            <li><a href="<?= base_url() . 'home/category/laptop/Sony'; ?>">Sony</a>
                                            </li>
                                        </ul>
                                    </li></li>

                                    <?php if ($category == "Smartphone") : ?>
                                        <li class="active">
                                        <?php else : ?>
                                        <li>
                                        <?php endif; ?>
                                        <a href="<?= base_url() . 'home/category/smartphone'; ?>">Smartphones<span class="badge pull-right"><?= $this->item_model->getCount('product', "product_category = 'Smartphone'"); ?></span></a>
                                        <ul>
                                            <li><a href="<?= base_url() . 'home/category/smartphone/Apple'; ?>">Apple</a>
                                            </li>
                                            <li><a href="<?= base_url() . 'home/category/smartphone/Samsung'; ?>">Samsung</a>
                                            </li>
                                            <li><a href="<?= base_url() . 'home/category/smartphone/ASUS'; ?>">Asus</a>
                                            </li>
                                        </ul>
                                    </li></li>

                                    <?php if ($category == "Tablet") : ?>
                                        <li class="active">
                                        <?php else : ?>
                                        <li>
                                        <?php endif; ?>
                                        <a href="<?= base_url() . 'home/category/tablet'; ?>">Tablets<span class="badge pull-right"><?= $this->item_model->getCount('product', "product_category = 'Tablet'"); ?></span></a>
                                        <ul>
                                            <li><a href="<?= base_url() . 'home/category/tablet/Apple'; ?>">Apple</a>
                                            </li>
                                            <li><a href="<?= base_url() . 'home/category/tablet/Samsung'; ?>">Samsung</a>
                                            </li>
                                            <li><a href="<?= base_url() . 'home/category/tablet/ASUS'; ?>">Asus</a>
                                            </li>
                                        </ul>
                                    </li></li>
                                </ul>
                            </div>
                        </div>

                        <!-- *** MENUS AND FILTERS END *** -->

                        <div class="banner">
                            <a href="#">
                                <img src="<?= base_url() . 'assets/ordering/img/banner.jpg'; ?>" alt="sales 2014" class="img-responsive">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row" id="productMain">
                            <!-- start content -->
                            <div class="col-sm-5">
                                <ul id="etalage">
                                    <li>
                                        <a href="optionallink.html">
                                            <img class="etalage_thumb_image" src="<?= base_url() . 'uploads_products/' . $row->product_image1 ?>"class="img-responsive" />
                                            <img class="etalage_source_image" src="<?= base_url() . 'uploads_products/' . $row->product_image1 ?>" class="img-responsive" title="" />
                                        </a>
                                    </li>
                                    <li>
                                        <img class="etalage_thumb_image" src="<?= base_url() . 'uploads_products/' . $row->product_image2 ?>" class="img-responsive" />
                                        <img class="etalage_source_image" src="<?= base_url() . 'uploads_products/' . $row->product_image2 ?>" class="img-responsive" title="" />
                                    </li>
                                    <li>
                                        <img class="etalage_thumb_image" src="<?= base_url() . 'uploads_products/' . $row->product_image3 ?>" class="img-responsive"  />
                                        <img class="etalage_source_image" src="<?= base_url() . 'uploads_products/' . $row->product_image3 ?>" class="img-responsive"  />
                                    </li>
                                    <li>
                                        <img class="etalage_thumb_image" src="<?= base_url() . 'uploads_products/' . $row->product_image2 ?>" class="img-responsive" />
                                        <img class="etalage_source_image" src="<?= base_url() . 'uploads_products/' . $row->product_image2 ?>" class="img-responsive" title="" />
                                    </li>

                                </ul>	
                            </div>
                            </br>
                            <div style="position:relative; left:55px;" class="box col-sm-6">
                                <h1 class = "text-center"><?= $row->product_name ?></h1>
                                <center><blockquote>
                                    <em><?= $row->product_brand ?></em>
                                </blockquote></center>
                                <div align = "center">
                                <?php if($row->product_quantity != 0) echo "<h6><span style = 'background-color: green; color: white; padding: 3px;'>In-stock</span></h6>";
                                else echo "<h6><span style = 'background-color: red; color: white; padding: 3px;'>Out of stock</span></h6>";
                                ?>
                                </div>

                                <h2 class="text-center" style="color:#dc2f54;">₱<?= number_format($row->product_price,2) ?></h2>
                                <!-- ==================================== -->

                                <center>
                                    <p class="starability-result" data-rating="<?=abs(round($rating->rating))?>"></p>
                                </center>
                                <p class="text-center buttons">
                                    <button <?php if(!$row->product_quantity) { echo 'disabled'; }?> type="button" name="add_cart" class="btn btn-primary add_cart" data-productname="<?= $row->product_name ?>" data-productimg="<?= $row->product_image1 ?>"  data-productquantity="<?= $row->product_quantity ?>" data-price="<?= $row->product_price ?>" data-productid="<?= $row->product_id ?>" /><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                    <a href="<?= base_url() . 'home/basket'; ?>" class="btn btn-default"><i class="fa fa-heart"></i> Add to wishlist</a>
                                </p>
                            </div>
                        </div>
                        <div class="box" id="details">
                            </p>
                            <h4>Product details</h4>
                            <blockquote>
                                <p><em><?= $row->product_desc ?></em>
                                </p>
                            </blockquote>

                            <h5 style="color:red;"><i><?= $row->product_quantity ?> Stock(s) Available left.</i></h5>

                            <hr>
                            <div class="social">
                                <h4>Show it to your friends</h4>
                                <p>
                                    <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                                    <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                                    <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                                </p>
                            </div>
                        </div>
                        
                        <div class="box">
                        <div id="comments" >
                    <?php if (!$feedback): ?>
                        <h4>0 comments</h4>
                    <?php else: ?>
                        <h4><?= $this->item_model->getCount('feedback', array('product_id' => $row->product_id)); ?> comments</h4>
                        <?php foreach ($feedback as $feedback): ?>
                        <?php $userinformation = $this->item_model->fetch('customer', array('customer_id' => $feedback->customer_id))[0];
                        $user_image = (string)$userinformation->image;
                        $image_array = explode(".", $user_image);
                        ?>
                            <div class="row comment">
                                <div class="col-sm-3 col-md-2 text-center-xs">
                                    <p>
                                        <img src="<?= $this->config->base_url() ?>uploads_users/<?= $image_array[0] . "_thumb." . $image_array[1]; ?>" class="img-responsive img-circle" alt="">
                                    </p>
                                </div>
                                <div class="col-sm-9 col-md-10">
                                    <h5><?= $userinformation->username?></h5>
                                    <!-- <p class="posted"><i class="fa fa-clock-o"></i>September 23, 2011 at 12:00 am</p> -->
                                    <p class="posted"> <p class="starability-result" data-rating="<?=$feedback->rating?>"></p><i class="fa fa-clock-o"></i><?= date(" F j, Y  h:i A", $feedback->added_at) ?></p>
                                    <!-- <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.
                                        Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p> -->
                                    <p><?=$feedback->feedback?></p>
                                    <!-- <p class="reply"><a href="#"><i class="fa fa-reply"></i> Reply</a>
                                    </p> -->
                                </div>
                            </div> 
                        <?php endforeach ?>
                    <?php endif ?>
                        
                        <div id="comment-form">
                            <h4>Leave comment</h4>
                                <!-- <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Name <span class="required">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="name">
                                        </div>
                                    </div>

                                </div> -->
                            <?php if ($this->session->has_userdata('isloggedin')): ?>
                                <?php $userinformation = $this->item_model->fetch('customer', array('customer_id' =>  $this->session->uid))[0];
                                $user_image = (string)$userinformation->image;
                                $image_array = explode(".", $user_image);
                                ?>
                                <div class="row">
                                    <div class="col-sm-3 col-md-2 text-center-xs">
                                        <p>
                                            <img src="<?= $this->config->base_url() ?>uploads_users/<?= $image_array[0] . "_thumb." . $image_array[1]; ?>" class="img-responsive img-circle" alt="">
                                        </p>
                                    </div>
                                    <div class="col-sm-9 col-md-10">
                                    <h5 >Tell people what you think</h5>
                                        <fieldset class="starability-basic">
                                            <input type="radio" id="rate" class="input-no-rate" name="rating" value="0" checked aria-label="No rating." />

                                            <input type="radio" id="rate1" name="rating" value="1" />
                                            <label for="rate1">1 star.</label>

                                            <input type="radio" id="rate2" name="rating" value="2" />
                                            <label for="rate2">2 stars.</label>

                                            <input type="radio" id="rate3" name="rating" value="3" />
                                            <label for="rate3">3 stars.</label>

                                            <input type="radio" id="rate4" name="rating" value="4" />
                                            <label for="rate4">4 stars.</label>

                                            <input type="radio" id="rate5" name="rating" value="5" />
                                            <label for="rate5">5 stars.</label>

                                            <span class="starability-focus-ring"></span>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="comment">Comment <span class="required">*</span>
                                            </label>
                                            <textarea class="form-control" id="comment" rows="4" name="feedback" ></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 text-right">
                                        <button type="submit" id="post" class="btn btn-primary" data-productid= "<?=$row->product_id?>" data-productname= "<?=$row->product_name?>" >  <i class="fa fa-comment-o"></i> Post comment</button>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <h5><a href="<?= base_url().'login'; ?>">Login</a> or <a href="<?= base_url().'register'; ?>">Register</a>  to leave a comment.</h5>
                                        </div>
                                    </div>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                            <!-- /.comment -->
                </div>
            </div>

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
                                                <a href="<?= base_url() . 'home/detail'; ?>">
                                                    <img src="<?= base_url() . 'assets/ordering/img/product2.jpg'; ?>" alt="" class="img-responsive">
                                                </a>
                                            </div>
                                            <div class="back">
                                                <a href="<?= base_url() . 'home/detail'; ?>">
                                                    <img src="<?= base_url() . 'assets/ordering/img/product2_2.jpg'; ?>" alt="" class="img-responsive">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="<?= base_url() . 'home/detail'; ?>" class="invisible">
                                        <img src="<?= base_url() . 'assets/ordering/img/product2.jpg'; ?>" alt="" class="img-responsive">
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
                                                <a href="<?= base_url() . 'home/detail'; ?>">
                                                    <img src="<?= base_url() . 'assets/ordering/img/product1.jpg'; ?>" alt="" class="img-responsive">
                                                </a>
                                            </div>
                                            <div class="back">
                                                <a href="<?= base_url() . 'home/detail'; ?>">
                                                    <img src="<?= base_url() . 'assets/ordering/img/product1_2.jpg'; ?>" alt="" class="img-responsive">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="<?= base_url() . 'home/detail'; ?>" class="invisible">
                                        <img src="<?= base_url() . 'assets/ordering/img/product1.jpg'; ?>" alt="" class="img-responsive">
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
                                                <a href="<?= base_url() . 'home/detail'; ?>">
                                                    <img src="<?= base_url() . 'assets/ordering/img/product3.jpg'; ?>" alt="" class="img-responsive">
                                                </a>
                                            </div>
                                            <div class="back">
                                                <a href="<?= base_url() . 'home/detail'; ?>">
                                                    <img src="<?= base_url() . 'assets/ordering/img/product3_2.jpg'; ?>" alt="" class="img-responsive">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="<?= base_url() . 'home/detail'; ?>" class="invisible">
                                        <img src="<?= base_url() . 'assets/ordering/img/product3.jpg'; ?>" alt="" class="img-responsive">
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
                        </div>
                    </div>
                </div>
                <!-- /.col-md-9 -->
            </div>
        </div>
        <!-- /.container -->
        <!-- end content -->