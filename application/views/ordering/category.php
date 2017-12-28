<div id="all">

    <div id="content">
        <div class="container">

            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li>Ladies</li>
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
                            <li>
                                <a href="<?= base_url().'home/category'; ?>">Men <span class="badge pull-right">42</span></a>
                                <ul>
                                    <li><a href="<?= base_url().'home/category'; ?>">T-shirts</a>
                                    </li>
                                    <li><a href="<?= base_url().'home/category'; ?>">Shirts</a>
                                    </li>
                                    <li><a href="<?= base_url().'home/category'; ?>">Pants</a>
                                    </li>
                                    <li><a href="<?= base_url().'home/category'; ?>">Accessories</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="active">
                                <a href="<?= base_url().'home/category'; ?>">Ladies  <span class="badge pull-right">123</span></a>
                                <ul>
                                    <li><a href="<?= base_url().'home/category'; ?>">T-shirts</a>
                                    </li>
                                    <li><a href="<?= base_url().'home/category'; ?>">Skirts</a>
                                    </li>
                                    <li><a href="<?= base_url().'home/category'; ?>">Pants</a>
                                    </li>
                                    <li><a href="<?= base_url().'home/category'; ?>">Accessories</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="<?= base_url().'home/category'; ?>">Kids  <span class="badge pull-right">11</span></a>
                                <ul>
                                    <li><a href="<?= base_url().'home/category'; ?>">T-shirts</a>
                                    </li>
                                    <li><a href="<?= base_url().'home/category'; ?>">Skirts</a>
                                    </li>
                                    <li><a href="<?= base_url().'home/category'; ?>">Pants</a>
                                    </li>
                                    <li><a href="<?= base_url().'home/category'; ?>">Accessories</a>
                                    </li>
                                </ul>
                            </li>

                        </ul>

                    </div>
                </div>

                <div class="panel panel-default sidebar-menu">

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
                </div>

                <!-- *** MENUS AND FILTERS END *** -->

                <div class="banner">
                    <a href="#">
                        <img src="<?= base_url().'assets/ordering/img/banner.jpg'; ?>" alt="sales 2014" class="img-responsive">
                    </a>
                </div>
            </div>

            <div class="col-md-9">
                <div class="box">
                    <h1>Ladies</h1>
                    <p>In our Ladies department we offer wide selection of the best products we have found and carefully selected worldwide.</p>
                </div>

                <div class="box info-bar">
                    <div class="row">
                        <div class="col-sm-12 col-md-4 products-showing">
                            Showing <strong>12</strong> of <strong>25</strong> products
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
                <h1>NO ITEMS IN TABLE</h1>
                <?php else: ?>
                <?php foreach ($products as $row): ?>
                    <div class="col-md-4 col-sm-6">
                        <div class="product">
                            <div class="flip-container">
                                <div class="flipper">
                                    <div class="front">
                                        <a href="<?= base_url().'home/detail/'.$row->product_id ?>">
                                            <img src="<?= base_url().'uploads_products/'.$row->product_image?>" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="back">
                                       <a href="<?= base_url().'home/detail/'.$row->product_id ?>">
                                            <img src="<?= base_url().'uploads_products/'.$row->product_image?>" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <a href="<?= base_url().'home/detail/'.$row->product_id ?>" class="invisible">
                                <img src="<?= base_url().'uploads_products/'.$row->product_image?>" alt="" class="img-responsive">
                            </a>
                            <div class="text">
                                <h3><a href="<?= base_url().'home/detail/'.$row->product_id ?>"><?=$row->product_desc?></a></h3>
                                <p class="price">₱<?=number_format($row->product_price)?></p>
                                <p class="buttons">
                                    <a href="<?= base_url().'home/detail/'.$row->product_id ?>"  class="btn btn-default">View detail</a>
                                    <button type="button" name="add_cart" class="btn btn-primary add_cart" data-productname="<?=$row->product_name?>" data-productimg="<?=$row->product_image?>"  data-productquantity="<?=$row->product_quantity?>" data-price="<?=$row->product_price?>" data-productid="<?=$row->product_id?>" /><i class="fa fa-shopping-cart"></i>Add to cart</button>
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
                <!-- /.products -->

                <div class="pages">

                    <p class="loadMore">
                        <a href="#" class="btn btn-primary btn-lg"><i class="fa fa-chevron-down"></i> Load more</a>
                    </p>

                    <ul class="pagination">
                        <li><a href="#">&laquo;</a>
                        </li>
                        <li class="active"><a href="#">1</a>
                        </li>
                        <li><a href="#">2</a>
                        </li>
                        <li><a href="#">3</a>
                        </li>
                        <li><a href="#">4</a>
                        </li>
                        <li><a href="#">5</a>
                        </li>
                        <li><a href="#">&raquo;</a>
                        </li>
                    </ul>
                </div>


            </div>
            <!-- /.col-md-9 -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /#content -->
