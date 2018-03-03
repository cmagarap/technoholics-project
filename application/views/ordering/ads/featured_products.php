<div id="hot">

    <div class="box">
        <div class="container">
            <div class="col-md-12">
                <h2>Featured Products</h2>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="product-slider">
            <?php foreach ($product as $row): ?>
                <div class="item">
                    <div class="product">
                        <div class="image_container" align="center">
                            <a href="<?= base_url() . 'home/detail/' . $row->product_category . '/' . $row->product_brand . '/' . $row->product_id .'/page'?>">
                                <img src="<?= base_url() . 'uploads_products/' . $row->product_image1 ?>" alt="<?= $row->product_name ?>" class="product_image">
                            </a>
                        </div>
                        <div class="text">
                            <h3><a href="<?= base_url() . 'home/detail/' . $row->product_category . '/' . $row->product_brand . '/' . $row->product_id .'/page'?>"><?= $row->product_name ?></a></h3>
                            <p class="price">&#8369;<?= number_format($row->product_price, 2) ?></p>
                        </div>
                        <!-- /.text -->
                    </div>
                    <!-- /.product -->
                </div>
            <?php endforeach ?>
            <!-- /.text -->
        </div>
        <!-- /.product -->
    </div>

</div>
<!-- /.product-slider -->
</div>
<!-- /.container -->

</div>
<!-- /#hot -->