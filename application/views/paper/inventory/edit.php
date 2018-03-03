<?php $products = $products[0]; ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-5">
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
                        <a href = "<?= base_url() ?>inventory/page" class="btn btn-info btn-fill btn-wd" style = "background-color: #dc2f54; border-color: #dc2f54; color: white;">Go back</a>
                    </div>
                    <br>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="card">
                    <div class="header">
                        <h4 class="title"><b>Edit Product</b></h4>
                    </div>
                    <div class="content">
                        <hr>
                        <?php if(validation_errors()): ?>
                            <div class="alert alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <?php echo validation_errors(); ?>
                            </div>
                        <?php endif?>
                        <form action = "<?= $this->config->base_url() ?>inventory/edit_product_exec/<?= $this->uri->segment(3) ?>" method = "POST" enctype = "multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Supplier Company <span style = "color: red">*</span></label>
                                        <select name="product_supplier" class = "form-control border-input file">
                                            <?php foreach($supplier as $supplier): ?>
                                                <option value="<?= $supplier->supplier_id ?>" <?php if($supplier->supplier_id == $products->supplier_id) echo "selected"; ?>>
                                                    <?= $supplier->company_name ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Brand <span style = "color: red">*</span></label>
                                        <select name="product_brand" id="" class = "form-control border-input file">
                                            <?php foreach($brand as $brand): ?>
                                                <option value="<?= $brand->brand_id ?>" <?php if($brand->brand_id == $products->brand_id) echo "selected"; ?>>
                                                    <?= $brand->brand_name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Name <font color="red">*</font></label>
                                        <input type="text" class="form-control border-input" placeholder="Product" value="<?= $products->product_name ?>" name = "product_name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Category <font color="red">*</font></label>
                                        <select name="product_category" id="" class = "form-control border-input file">
                                            <?php foreach($category as $category): ?>
                                                <option value="<?= $category->category_id ?>" <?php if($category->category_id == $products->category_id) echo "selected"; ?>>
                                                    <?= $category->category ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Price <font color="red">*</font></label>
                                        <input type="number" class="form-control border-input" placeholder="Price" name = "product_price" value="<?= $products->product_price ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Quantity <font color="red">*</font></label>
                                        <input type="number" class="form-control border-input" placeholder="Product quantity" name="product_quantity" value="<?= $products->product_quantity ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Featured <font color="red">*</font></label>
                                        <select name="is_featured" class="form-control border-input file">
                                            <option value="1" <?php if($products->is_featured == 1) echo 'selected'; ?>>Yes</option>
                                            <option value="0" <?php if($products->is_featured == 0) echo 'selected'; ?>>No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Product Image</label>
                                        <div id="filediv"><input name="user_file[]" type="file" id="file" class="file form-control border-input"/></div><br>
                                            <input type="button" id="add_more" class="upload" value="Add More Files"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Product Description <font color="red">*</font></label>
                                        <textarea rows="5" class="form-control border-input" placeholder="Here can be your description" name = "product_desc"><?= $products->product_desc ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd" style = "background-color: #31bbe0; border-color: #31bbe0; color: white;">Update Product</button>
                                <button type="reset" class="btn btn-danger btn-fill btn-wd" style = "background-color: #F3BB45; border-color: #F3BB45; color: white;">Reset</button>
                            </div>
                            <br>
                            <div class="clearfix"></div>
                            <input type = "hidden" value = "<?= $this->uri->segment(3) ?>" name = "product_id">
                        </form>
                    </div> <!-- content -->
                </div> <!-- div-card -->
            </div> <!-- col-lg-8 col-md-7 -->
        </div> <!-- row -->
    </div> <!-- container fluid -->
</div><!-- content -->