<?php
$category_content = $this->item_model->fetch('category', array("status" => 1));
?>
<div id="all">
    <div id="content">
        <div class="container">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="<?= base_url() . 'home'; ?>">Home</a>
                    </li>
                    <?php if ($brand) : ?>
                        <li><a href="<?= base_url() . 'home/category/' . $category; ?>"><?= ucwords($category) ?></a>
                        </li>
                        <li><?= ucwords($brand) ?>
                        </li>
                    <?php else : ?>
                        <li><?= ucwords($category) ?></li>
                    <?php endif; ?>
                </ul>
            </div>

            <div class="col-md-3">
                <div class="panel panel-default sidebar-menu">
                    <div class="panel-heading">
                        <h3 class="panel-title">Categories</h3>
                    </div>
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked category-menu">
                            <?php foreach ($category_content as $category_content):
                            $brand_content = $this->item_model->fetch("brand",array("category_id" =>
                                $category_content->category_id,"status" => 1),"brand_name", "ASC");
                                ?>
                                <li <?php if ($category == $category_content->category) echo 'class="active"' ?>>
                                    <a href="<?= base_url() . 'home/category/'.$category_content->category.''; ?>"><?=$category_content->category?><span class="badge pull-right"><?= $this->item_model->getCount('product', array('status' => 1,'product_category' => $category_content->category )); ?></span></a>
                                    <ul>
                                        <?php foreach ($brand_content as $brand_content): ?>
                                            <li><a href="<?= base_url().'home/category/'.$category_content->category.'/'.$brand_content->brand_name.''; ?>"><?=ucfirst($brand_content->brand_name)?></a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
                <div class="banner">
                    <a>
                        <img src="<?= base_url() ?>assets/ordering/img/<?= $image->image_1 ?>" alt="sales <?php echo date("Y");?>" class="img-responsive">
                    </a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="box">
                    <h1><?= ucwords($brand) . " " . ucwords($category) ?></h1>
                </div>

                <div class="box info-bar">
                    <div class="row">
                        <div class="col-sm-12 col-md-4 products-showing">
                            Showing <strong><?=$current_show?></strong> of <strong><?=$count?></strong> products
                        </div>
                        <div class="col-sm-12 col-md-8  products-number-sort">
                            <div class="row">
                                <form class="form-inline" role="form" method="POST">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="products-number">
                                            <strong>Show</strong> <button name="limit" class="btn btn-default btn-sm <?php if($perpage == 12){ echo "btn-primary";}?>" type=submit value="12">12</button>
                                            <button name="limit" class="btn btn-default btn-sm <?php if($perpage == 24){ echo "btn-primary";}?>" value="24" type=submit>24</button> products
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="products-sort-by">
                                            <strong>Sort by</strong>
                                            <select name="sort" class="form-control" onchange="this.form.submit()">
                                                <option <?php if($sort == "product_name"){ echo "selected";}?> value="product_name" >Name</option>
                                                <option <?php if($sort == "product_price"){ echo "selected";}?> value="product_price" >Price</option>
                                                <option <?php if($sort == "times_bought"){ echo "selected";}?> value="times_bought" >Sales first</option>
                                                <option <?php if($sort == "times_searched"){ echo "selected";}?>
                                                    value="times_searched" >Most viewed</option>
                                                    <option <?php if($sort == "no_of_views"){ echo "selected";}?>  value="no_of_views" >Most searched</option>
                                                    <option <?php if($sort == "product_rating"){ echo "selected";}?> value="product_rating">Top rated</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row products">
                        <?php if (!$products): ?>
                            <div class="col-md-12">
                                <div class="box" align = "center">
                                    <h3>Oops! There are no products existing for what you are looking for.</h3>
                                </div>
                            </div>
                        <?php else: ?>
                            <?php foreach ($products as $row): 
                            $product_price = $row->product_price - ($row->product_price * ($row->product_discount/100));?>
                            <div class="col-md-4 col-sm-6">
                                <div class="product" style="box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);">
                                    <div class="image_container" align="center" >
                                        <a href="<?= base_url() . 'home/detail/' . $row->product_category . '/' . $row->product_brand . '/' . $row->product_id . '/page' ?>">
                                            <img class="product_image" src="<?= base_url() . 'uploads_products/' . $row->product_image1 ?>" alt="<?= $row->product_name ?>">
                                        </a>
                                    </div>
                                    <div class="text">
                                        <h3><a href="<?= base_url() . 'home/detail/' . $row->product_category . '/' . $row->product_brand . '/' . $row->product_id . '/page' ?>"><?= $row->product_name ?></a></h3>
                                        <p class="price"><?php if($row->product_discount != 0):?><del> &#8369;<?=$row->product_price?></del><?php endif;?> &#8369;<?= number_format($product_price, 2) ?></p>
                                        <p class="buttons">
                                            <a href="<?= base_url() . 'home/detail/' . $row->product_category . '/' . $row->product_brand . '/' . $row->product_id . '/page' ?>"  class="btn btn-default">View detail</a>
                                            <button <?php if (!$row->product_quantity) {
                                                echo 'disabled';
                                            } ?> type="button" class="btn btn-primary add_cart" data-productname="<?= $row->product_name ?>" data-productimg="<?= $row->product_image1 ?>"  data-productquantity="<?= $row->product_quantity ?>" data-price="<?= $product_price?>" data-productid="<?= $row->product_id ?>"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                        </p>
                                    </div>
                                    <!-- /.text -->
                                    <?php if (!$row->product_quantity): ?>
                                        <div class="ribbon sale" >
                                            <div class="theribbon" style="background-color:#dc2f54">OUT OF STOCK</div>
                                            <div class="ribbon-background"></div>
                                        </div>
                                    <?php endif ?>
                                </div><!-- /.product -->
                            </div><!-- /.col-md-4 -->
                        <?php endforeach ?>
                    </div>
                <?php endif ?><!-- /.products -->
                <div class="pages">
                    <?php
                    echo "<div align = 'center'>" . $links . "</div>";
                    echo '</div>';
                    ?>
                </div>
            </div><!-- /.col-md-9 -->
        </div><!-- /.container -->
    </div><!-- /#content -->
</div>
</div>