<?php $products = $products[0]; ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="card card-user">
                    <div class="content">
                        <div>
                            <img src="<?= $this->config->base_url() ?>uploads_products/<?= $products->product_image ?>" alt="<?= $products->product_name ?>" title = "<?= $products->product_name ?>" width= "100%"/>
                        </div>
                        <div align = "center">
                            <br><hr><br>
                            <h4 class="title"><?= $products->product_name ?><br /></h4>
                            <br>
                        </div>
                    </div>
                    <hr>
                    <div class="text-center">
                        <div class="row">
                            <div class="col-md-3 col-md-offset-1">
                                <h5>12<br /><small>Sold</small></h5> <!-- not yet sure about this -->
                            </div>
                            <div class="col-md-4">
                                <h5>&#8369; <?= number_format($products->product_price, 2) ?><br /><small>Price</small></h5>
                            </div>
                            <div class="col-md-3">
                                <h5><?php
                                    if ($products->product_quantity == 0) {
                                        echo "<font color = 'red'>$products->product_quantity</font>";
                                    } else {
                                        echo $products->product_quantity;
                                    }
                                    ?><br><small>Stock</small>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <hr><br>
                    <div align="center">
                        <a href = "javascript:history.go(-1)" class="btn btn-info btn-fill btn-wd" style = "background-color: #dc2f54; border-color: #dc2f54; color: white;">Go back</a>
                    </div>
                    <br>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Edit Product</h4>
                    </div>
                    <div class="content">
                        <form>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Supplier Company</label>
                                        <input type="text" class="form-control border-input" disabled placeholder="Company" value="Creative Code Inc.">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <input type="text" class="form-control border-input" placeholder="Product name" value="<?= $products->product_name ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Category</label>
                                        <!--<input type="text" class="form-control border-input" placeholder="Last Name" value="Faker">-->
                                        <select name="product_category" id="" class = "form-control border-input">
                                            <!-- options should be based on the categories in the database -->
                                            <?php for($i = 1; $i <= 5; $i++): ?>
                                            <option value="">Category <?= $i ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="number" class="form-control border-input" placeholder="Price" value="<?= $products->product_price ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Image</label>
                                        <input type="file" class="form-control border-input file">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Product Description</label>
                                        <textarea rows="5" class="form-control border-input" placeholder="Here can be your description" value="Mike"><?= $products->product_desc ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd" style = "background-color: #31bbe0; border-color: #31bbe0; color: white;">Update Profile</button>
                            </div>
                            <br>
                            <div class="clearfix"></div>
                        </form>
                    </div> <!-- content -->
                </div> <!-- div-card -->
            </div> <!-- col-lg-8 col-md-7 -->
        </div> <!-- row -->
    </div> <!-- container fluid -->
</div><!-- content -->