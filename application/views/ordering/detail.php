<?php
# whenever viewed, update the no_of_views in the products table
# $stat_views = $row->no_of_views + 1;
# $this->item_model->updatedata("product", array("no_of_views" => $stat_views), "product_id = " . $this->uri->segment(5));

if ($this->session->has_userdata('isloggedin') AND $this->session->userdata('type') == 2) {
    $viewed_sess = $this->session->userdata('viewed_products');
    array_push($viewed_sess, (string) $this->uri->segment(5));
    $unique = array_unique($viewed_sess);
    $this->session->set_userdata('viewed_products', $unique);
} elseif (!$this->session->has_userdata('isloggedin')) {
    $this->db->select('product_name');
    $item_name = $this->item_model->fetch('product', 'product_id = ' . $this->uri->segment(5))[0];
    $viewed_at = array(
        'customer_name' => 'Guest',
        'item_name' => $item_name->product_name,
        'at_detail' => 'Viewed',
        'at_date' => time(),
        'product_id' => $this->uri->segment(5)
    );
    $this->item_model->insertData('audit_trail', $viewed_at);
}
?>
<div id="all">
    <div id="content">
        <div class="container">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="<?= base_url() . 'home'; ?>">Home</a></li>
                    <li><a href="<?= base_url() . 'home/category/' . $category; ?>"><?= ucwords($category); ?></a></li>
                    <li><a href="<?= base_url() . 'home/category/' . $category . '/' . $brand; ?>"><?= ucwords($brand) ?></a></li>
                    <li><?= $row->product_name ?></li>
                </ul>
            </div>

            <div class="col-md-3">
                <div class="panel panel-default sidebar-menu">
                    <div class="panel-heading">
                        <h3 class="panel-title">Categories</h3>
                    </div>
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked category-menu">
                            <?php
                            foreach ($category_content as $category_content):
                                $brand_content = $this->item_model->fetch("brand", array("category_id" => $category_content->category_id), "brand_name", "ASC");
                                ?>
                                <li <?php if ($category == $category_content->category) echo 'class="active"'; ?>>
                                    <a href="<?= base_url() . 'home/category/' . $category_content->category . ''; ?>"><?= $category_content->category ?><span class="badge pull-right"><?= $this->item_model->getCount('product', array('status' => 1, 'product_category' => $category_content->category)); ?></span></a>
                                    <ul>
                                        <?php foreach ($brand_content as $brand_content): ?>
                                            <li><a href="<?= base_url() . 'home/category/' . $category_content->category . '/' . $brand_content->brand_name . ''; ?>"><?= ucwords($brand_content->brand_name) ?></a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
                <div class="banner">
                    <a>
                        <img src="<?= base_url() ?>assets/ordering/img/<?= $image->image_1 ?>" alt="sales <?php echo date("Y"); ?>" class="img-responsive">
                    </a>
                </div>
            </div>

            <div class="col-md-9">
                <div class="box row" id="productMain">
                    <!-- start content -->
                    <div class="col-sm-6">
                        <div class="flexslider">
                            <ul class="slides">
                                <li data-thumb="<?= base_url() . 'uploads_products/' . $row->product_image1 ?>">
                                    <div class="thumb-image"> <img src="<?= base_url() . 'uploads_products/' . $row->product_image1 ?>" data-imagezoom="true" class="img-responsive"> </div>
                                </li>
                                <?php if ($row->product_image2): ?>
                                    <li data-thumb="<?= base_url() . 'uploads_products/' . $row->product_image2 ?>">
                                        <a class="thumb-image" href="<?= base_url() . 'uploads_products/' . $row->product_image2 ?>"> <img src="<?= base_url() . 'uploads_products/' . $row->product_image2 ?>" data-imagezoom="true"> </a>
                                    </li>
                                <?php endif ?>

                                <?php if ($row->product_image3): ?>
                                    <li data-thumb="<?= base_url() . 'uploads_products/' . $row->product_image3 ?>">
                                        <a class="thumb-image" href="<?= base_url() . 'uploads_products/' . $row->product_image3 ?>"> <img src="<?= base_url() . 'uploads_products/' . $row->product_image3 ?>" data-imagezoom="true"> </a>
                                    </li>
                                <?php endif ?>

                                <?php if ($row->product_image4): ?>
                                    <li data-thumb="<?= base_url() . 'uploads_products/' . $row->product_image4 ?>">
                                        <a class="thumb-image" href="<?= base_url() . 'uploads_products/' . $row->product_image4 ?>"> <img src="<?= base_url() . 'uploads_products/' . $row->product_image4 ?>" data-imagezoom="true"> </a>
                                    </li>
                                <?php endif ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div align ="center" id ="contents">
                            <h1><?= $row->product_name ?></h1>
                            <?php if ($row->product_quantity != 0)
                            echo "<h6><span style = 'background-color: green; color: white; padding: 3px;'>In-stock</span></h6>";
                            else
                                echo "<h6><span style = 'background-color: red; color: white; padding: 3px;'>Out of stock</span></h6>";
                            ?>
                            <h2 style="color:#dc2f54;">&#8369; <?= number_format($row->product_price, 2) ?></h2>
                            <div class="star-ratings-css">
                                <div class="star-ratings-css-top" style="width: <?= ($row->product_rating / 5) * 100 ?>%" title="<?= number_format($row->product_rating, 1) ?>"><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span></div>
                                <div class="star-ratings-css-bottom"><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span></div>
                                <p style="color: #f5bd23; font-size: 15px"><?= number_format($row->product_rating, 1) ?> / 5</p>
                            </div>
                            <br><br>
                            <button <?php if (!$row->product_quantity) {
                                echo 'disabled';
                            } ?> class="btn btn-primary add_cart" data-productname="<?= $row->product_name ?>" data-productimg="<?= $row->product_image1 ?>"  data-productquantity="<?= $row->product_quantity ?>" data-price="<?= $row->product_price ?>" data-productid="<?= $row->product_id ?>"><i class="fa fa-shopping-cart"></i>Add to cart</button>

                            <?php if ($this->session->has_userdata('isloggedin')): ?>
                                <button <?php if ($condition) {
                                    echo 'disabled';
                                } ?> class="btn btn-default" id="add_wishlist" data-productid="<?= $row->product_id ?>" data-customerid="<?= $this->session->uid ?>" data-productname="<?= $row->product_name ?>" data-productcategory="<?= $row->product_category ?>" data-productbrand="<?= $row->product_brand ?>" data-page="<?= $this->uri->segment(7) ?>"><i class="fa fa-heart"></i> Add to wishlist </button>
                            <?php else: ?>
                                <a href="<?= base_url() . 'login' ?>" class="btn btn-default" > <i class="fa fa-heart"></i> Add to wishlist </a>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                <div class="box" id="details">
                    <h4>Product details</h4>
                    <blockquote>
                        <p><em><?= $row->product_desc ?></em></p>
                    </blockquote>
                    <h5 style="color:red;"><i><?= $row->product_quantity ?> Stock(s) Available left.</i></h5>
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
                <div class="box" id="content">
                    <div id="comments" >
                        <?php if (!$feedback): ?>
                            <h4>0 comment(s)</h4>
                        <?php else: ?>
                            <h4><?= $this->item_model->getCount('feedback', 'product_id = ' . $row->product_id . ' AND status = 1'); ?> comment(s)</h4>
                            <?php
                            foreach ($feedback as $feedback):
                                $userinformation = $this->item_model->fetch('customer', array('customer_id' => $feedback->customer_id))[0];
                                $user_image = (string) $userinformation->image;
                                $image_array = explode(".", $user_image);
                                ?>
                                <hr>
                                <div class="row comment">
                                    <div class="col-sm-1 col-md-1 text-center-xs">
                                        <p><img src="<?= $this->config->base_url() ?>uploads_users/<?= $image_array[0] . "_thumb." . $image_array[1]; ?>" class="img-responsive img-circle" alt=""></p>
                                    </div>
                                    <div class="col-sm-9 col-md-10">
                                        <h5><?= $userinformation->username ?></h5>
                                        <p class="posted">
                                            <i class="ti-star" style="color: #f5bd23;"></i> <font color="#f5bd23"><?= number_format($feedback->rating, 0) ?>/5</font>
                                        </p>
                                        <p><?= $feedback->feedback ?></p>
                                        <i class="fa fa-clock-o" style="font-size: 10px; display: inline; color: #ccc"></i> <p style="font-size: 10px; display: inline; color: #ccc"><?= date(" F j, Y  h:i A", $feedback->added_at) ?></p>
                                    </div>
                                </div>
                            <?php endforeach ?>
                            <?php echo "<div align = 'center'>" . $links . "</div>"; ?>
                        <?php endif ?>
                        <hr>
                        <div id="comment-form">
                            <h4>Leave comment</h4>
                            <?php
                            if ($this->session->has_userdata('isloggedin')):
                                $userinformation = $this->item_model->fetch('customer', array('customer_id' => $this->session->uid))[0];
                                $user_image = (string) $userinformation->image;
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
                                        <fieldset class="starability-checkmark">
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
                                        <button type="submit" id="post" class="btn btn-primary" data-productid= "<?= $row->product_id ?>" data-productname= "<?= $row->product_name ?>" data-productcategory="<?= $row->product_category ?>" data-productbrand="<?= $row->product_brand ?>" data-page="<?= $this->uri->segment(7) ?>" >  <i class="fa fa-comment-o"></i> Post comment</button>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <h5><a href="<?= base_url() . 'login'; ?>">Login</a> or <a href="<?= base_url() . 'register'; ?>">Register</a>  to leave a comment.</h5>
                                        </div>
                                    </div>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <h3>You may also like these products.</h3>
                </div>
                <div class="row products">
                    <div id="hot">
                        <div class="product-slider">
                            <?php
                            if (!$this->session->has_userdata('isloggedin')) {
                                $temp1 = array();
                                $suggest = array();
                                $orders = $this->item_model->fetch('order_items',"product_id = '$row->product_id'");
                                foreach ( $orders as $orders ){
                                    $product = $this->item_model->fetch('order_items',"order_id = '$orders->order_id'");
                                    foreach( $product as $product){
                                        array_push($temp1,$product->product_id);     
                                    }                           
                                }
                                $temp1 = array_unique($temp1);
                                shuffle($temp1);
                                foreach( $temp1 as $temp1){
                                    if($temp1 == $row->product_id){
                                        continue;
                                    }
                                    $temp2 = $this->item_model->fetch('product',"product_id = '$temp1' AND status = 1")[0];
                                    array_push($suggest,$temp2);
                                }
                                
                                $this->session->set_userdata('suggest', $suggest);
                            } elseif ($this->session->has_userdata('isloggedin')) {
                                $this->db->select('product_preference');
                                $preference = $this->item_model->fetch('customer', 'customer_id = ' . $this->session->uid)[0];

                                if ($preference->product_preference != NULL) {
                                    $array_p = explode(", ", $preference->product_preference);

                                    $pushable = array();
                                    # based on Apriori, get product id
                                    foreach ($array_p as $p) {
                                        $this->db->select('product_id');
                                        $product_id = $this->item_model->fetch('product', "product_id !=" . $row->product_id . " AND status = 1 AND product_name = '$p'")[0];
                                        if(isset($product_id->product_id))
                                            array_push($pushable, $product_id->product_id);
                                        else continue;
                                    }

                                    # based on order_items table
                                    $temp1 = array(); # temp1 is product_id array from Order_items
                                    $suggest = array();
                                    $orders = $this->item_model->fetch('order_items',"product_id = '$row->product_id'");
                                    if ($orders) {
                                        foreach ($orders as $orders) {
                                            $this->db->select('product_id');
                                            $product = $this->item_model->fetch('order_items', "order_id = '$orders->order_id'");
                                            foreach ($product as $product) {
                                                array_push($temp1, $product->product_id);
                                            }
                                        }
                                    }
                                    $temp1 = array_unique($temp1);
                                    shuffle($temp1);
                                    shuffle($pushable);

                                    if ($temp1) {
                                        $merged = (is_array($temp1)) ? array_merge($pushable, $temp1) : array_merge($pushable, (array)$temp1);
                                    } else {
                                        $merged = $pushable;
                                    }

                                    $merged = array_merge($pushable, (array)$temp1);

                                    foreach ($merged as $temp1) {
                                        if ($temp1 == $row->product_id){
                                            continue;
                                        } else {
                                            $this->db->select(array('product_name', 'product_id', 'product_category', 'product_brand', 'product_image1', 'product_price'));

                                            $temp2 = $this->item_model->fetch('product', "product_id = '$temp1' AND status = 1")[0];
                                            array_push($suggest, $temp2);
                                        }
                                    }

                                } elseif ($preference->product_preference == NULL) {
                                    $temp1 = array();
                                    $suggest = array();
                                    $orders = $this->item_model->fetch('order_items',"product_id = '$row->product_id'");
                                    foreach ( $orders as $orders ){
                                        $this->db->select('product_id');
                                        $product = $this->item_model->fetch('order_items',"order_id = '$orders->order_id'");
                                        foreach( $product as $product){
                                            array_push($temp1,$product->product_id);
                                        }
                                    }
                                    $temp1 = array_unique($temp1);
                                    shuffle($temp1);
                                    foreach( $temp1 as $temp1){
                                        if($temp1 == $row->product_id){
                                            continue;
                                        }
                                        $temp2 = $this->item_model->fetch('product',"product_id = '$temp1' AND status = 1")[0];
                                        array_push($suggest, $temp2);
                                    }

                                    $this->session->set_userdata('suggest', $suggest);
                                }
                            }
                            ?>

                            <?php
                            if ($this->session->has_userdata('suggest')):
                                foreach ($this->session->userdata('suggest') as $suggest):
                                    ?>
                                    <div class="item" style="margin: 0 10px; visibility: hidden;">
                                        <div class="product">
                                            <div class="image_container" align="center">
                                                <a href="<?= base_url() . 'home/detail/' . $suggest->product_category . '/' . $suggest->product_brand . '/' . $suggest->product_id . '/page' ?>">
                                                    <img src="<?= base_url() . 'uploads_products/' . $suggest->product_image1 ?>" alt="<?= $suggest->product_name ?>" class="product_image">
                                                </a>
                                            </div>
                                            <div class="text">
                                                <h3><a href="<?= base_url() . 'home/detail/' . $suggest->product_category . '/' . $suggest->product_brand . '/' . $suggest->product_id . '/page' ?>"><?= $suggest->product_name ?></a></h3>
                                                <p class="price">&#8369;<?= number_format($suggest->product_price, 2) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                endforeach;
                            else:
                                $c = 0;
                                foreach ($suggest as $suggest):
                                        ?>
                                        <div class="item" style="margin: 0 10px; visibility: hidden;">
                                            <div class="product">
                                                <div class="image_container" align="center">
                                                    <a href="<?= base_url() . 'home/detail/' . $suggest->product_category . '/' . $suggest->product_brand . '/' . $suggest->product_id . '/page' ?>">
                                                        <img src="<?= base_url() . 'uploads_products/' . $suggest->product_image1 ?>" alt="<?= $suggest->product_name ?>" class="product_image">
                                                    </a>
                                                </div>
                                                <div class="text">
                                                    <h3><a href="<?= base_url() . 'home/detail/' . $suggest->product_category . '/' . $suggest->product_brand . '/' . $suggest->product_id . '/page' ?>"><?= $suggest->product_name ?></a></h3>
                                                    <p class="price">&#8369;<?= number_format($suggest->product_price, 2) ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                endforeach;
                            endif;
                            ?>
                        </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container -->
        </div><!-- end content -->
</div><!-- #all -->