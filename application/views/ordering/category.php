<div id="all">
<div id="content">
    <div class="container">

        <div class="col-md-12">     
        </br>
            <ul class="breadcrumb">
                <li><a href="<?= base_url() . 'home'; ?>">Home</a>
                </li>
                <?php if ($brand) : ?>
                    <li><a href="<?= base_url() . 'home/category/' . $category; ?>"><?= $category ?></a>
                    </li>
                    <li><?= $brand ?>
                    </li>
                <?php else : ?>
                    <li><?= $category ?></li>
                <?php endif; ?>
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

                        <?php if ($category == "accessories") : ?>
                            <li class="active">
                            <?php else : ?>
                            <li>
                            <?php endif; ?>
                            <a href="<?= base_url() . 'home/category/accessories'; ?>">Accessories<span class="badge pull-right"><?= $this->item_model->getCount('product', array('status' => 1,'product_category' => 'Accesories')); ?></span></a>
                        </li>

                        <?php if ($category == "chargers") : ?>
                            <li class="active">
                            <?php else : ?>
                            <li>
                            <?php endif; ?>
                            <a href="<?= base_url() . 'home/category/chargers'; ?>">Chargers<span class="badge pull-right"><?= $this->item_model->getCount('product', array('status' => 1,'product_category' => 'Chargers')); ?></span></a>
                        </li>

                        <?php if ($category == "laptop") : ?>
                            <li class="active">
                            <?php else : ?>
                            <li>
                            <?php endif; ?>
                            <a href="<?= base_url() . 'home/category/laptop'; ?>">Laptops<span class="badge pull-right"><?= $this->item_model->getCount('product', array('status' => 1,'product_category' => 'Laptop')); ?></span></a>
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
                        </li>

                        <?php if ($category == "smartphone") : ?>
                            <li class="active">
                            <?php else : ?>
                            <li>
                            <?php endif; ?>
                            <a href="<?= base_url() . 'home/category/smartphone'; ?>">Smartphones<span class="badge pull-right"><?= $this->item_model->getCount('product', array('status' => 1,'product_category' => 'Smartphone')); ?></span></a>
                            <ul>
                                <li><a href="<?= base_url() . 'home/category/smartphone/Apple'; ?>">Apple</a>
                                </li>
                                <li><a href="<?= base_url() . 'home/category/smartphone/Samsung'; ?>">Samsung</a>
                                </li>
                                <li><a href="<?= base_url() . 'home/category/smartphone/ASUS'; ?>">Asus</a>
                                </li>
                            </ul>
                        </li>

                        <?php if ($category == "tablet") : ?>
                            <li class="active">
                            <?php else : ?>
                            <li>
                            <?php endif; ?>
                            <a href="<?= base_url() . 'home/category/tablet'; ?>">Tablets<span class="badge pull-right"><?= $this->item_model->getCount('product', array('status' => 1,'product_category' => 'Tablet')); ?></span></a>
                            <ul>
                                <li><a href="<?= base_url() . 'home/category/tablet/Apple'; ?>">Apple</a>
                                </li>
                                <li><a href="<?= base_url() . 'home/category/tablet/Samsung'; ?>">Samsung</a>
                                </li>
                                <li><a href="<?= base_url() . 'home/category/tablet/ASUS'; ?>">Asus</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- I don't know what to do with this? -->

            <!-- <div class="panel panel-default sidebar-menu">

                <div class="panel-heading">
                    <h3 class="panel-title">Brands <a class="btn btn-xs btn-danger pull-right" href="#"><i class="fa fa-times-circle"></i> Clear</a></h3>
                </div>

                <div class="panel-body">

                    <form>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox">Armani (10)
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox">Versace (12)
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox">Carlo Bruni (15)
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox">Jack Honey (14)
                                </label>
                            </div>
                        </div>

                        <button class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> Apply</button>

                    </form>

                </div>
            </div> -->

            <!-- *** MENUS AND FILTERS END *** -->

            <div class="banner">
                <a href="#">
                    <img src="<?= base_url() . 'assets/ordering/img/banner.jpg'; ?>" alt="sales 2014" class="img-responsive">
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
                        Showing <strong>12</strong> of <strong><?= $count ?></strong> products
                    </div>

                    <div class="col-sm-12 col-md-8  products-number-sort">
                        <div class="row">
                            <form class="form-inline">
                                <div class="col-md-6 col-sm-6">
                                    <div class="products-number">
                                        <strong>Show</strong>  <a href="#" class="btn btn-default btn-sm btn-primary">12</a>  <a href="#" class="btn btn-default btn-sm">24</a>  <a href="#" class="btn btn-default btn-sm">All</a> products
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="products-sort-by">
                                        <strong>Sort by</strong>
                                        <select name="sort-by" class="form-control">
                                            <option>Price</option>
                                            <option>Name</option>
                                            <option>Sales first</option>
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
                    <?php foreach ($products as $row): ?>
                        <div class="col-md-4 col-sm-6">
                            <div class="product">
                                <div class="flip-container" style="padding: 10px;">
                                    <div class="flipper">
                                        <div class="front"><center>
                                                <a href="<?= base_url() . 'home/detail/' . $row->product_category . '/' . $row->product_brand . '/' . $row->product_id ?>">
                                                    <img src="<?= base_url() . 'uploads_products/' . $row->product_image1 ?>" alt="" class="img-responsive" style="width: auto; height: 150px;">
                                                </a></center>
                                        </div>
                                        <div class="back"><center>
                                                <a href="<?= base_url() . 'home/detail/' . $row->product_category . '/' . $row->product_brand . '/' . $row->product_id ?>">
                                                    <img src="<?= base_url() . 'uploads_products/' . $row->product_image2 ?>" alt="" class="img-responsive" style="width: auto; height: 150px;">
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
                                        <button <?php if(!$row->product_quantity) { echo 'disabled'; }?> type="button" name="add_cart" class="btn btn-primary add_cart" data-productname="<?= $row->product_name ?>" data-productimg="<?= $row->product_image1 ?>"  data-productquantity="<?= $row->product_quantity ?>" data-price="<?= $row->product_price ?>" data-productid="<?= $row->product_id ?>"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                    </p>
                                </div>
                                <!-- /.text -->
                                <?php if (!$row->product_quantity): ?>
                                <div class="ribbon sale" >
                                    <div class="theribbon" style="background-color:#dc2f54">OUT OF STOCK</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <?php endif ?>
                            </div>
                            <!-- /.product -->
                        </div>
                        <!-- /.col-md-4 -->
                    <?php endforeach ?>
                </div>
            <?php endif ?>
            <!-- /.products -->

            <div class="pages">

                <p class="loadMore">
                    <a href="#" class="btn btn-primary btn-lg"><i class="fa fa-chevron-down"></i> Load more</a>
                </p>

                <?php
                echo "<div align = 'center'>" . $links . "</div>";
                echo '</div>';
                ?>
            </div>


        </div>
        <!-- /.col-md-9 -->
    </div>
    <!-- /.container -->
</div>
<!-- /#content -->
</div>