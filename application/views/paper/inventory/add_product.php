<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-md-5"></div>
            <div class="col-lg-8 col-md-7">
                <div class="card" style = "padding: 30px">
                    <div class="header">
                        <h4 class="title"><b>Add a Product</b></h4>
                    </div>
                    <hr>
                    <div class="content">
                        <?php
                        if(isset($_POST['enter'])) {
                            $supplier = $_POST['supplier'];
                            $product_brand = $_POST['product_brand'];
                            $product_name = $_POST['product_name'];
                            $product_price = $_POST['product_price'];
                            $product_quantity = $_POST['product_quantity'];
                            $product_desc = $_POST['product_desc'];
                        } elseif(isset($_POST['reset'])) {
                            $supplier = "";
                            $product_brand = "";
                            $product_name = "";
                            $product_price = "";
                            $product_quantity = "";
                            $product_desc = "";
                        } else {
                            $supplier = "";
                            $product_brand = "";
                            $product_name = "";
                            $product_price = "";
                            $product_quantity = "";
                            $product_desc = "";
                        }
                        ?>
                        <form action = "<?= $this->config->base_url() ?>inventory/add_product_exec" method = "POST" enctype="multipart/form-data" target="uploadTarget">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Supplier Company <span style = "color: red">*</span></label>
                                        <input type="text" class="form-control border-input" placeholder="Company name" name = "supplier" value = "<?= $supplier ?>">
                                        <?php if(validation_errors()):
                                            echo "<span style = 'color: red'>" . form_error("supplier") . "</span>";
                                        endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Brand <span style = "color: red">*</span></label>
                                        <select name="product_brand" id="" class = "form-control border-input file">
                                                <option value="Lenovo">Lenovo</option>
                                                <option value="Apple">Apple</option>
                                                <option value="Samsung">Samsung</option>
                                        </select>
                                        <?php if(validation_errors()):
                                            echo "<span style = 'color: red'>" . form_error("product_brand") . "</span>";
                                        endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Name <span style = "color: red">*</span></label>
                                        <input type="text" class="form-control border-input" placeholder="Product" name = "product_name" value = "<?= $product_name ?>">
                                        <?php if(validation_errors()):
                                            echo "<span style = 'color: red'>" . form_error("product_name") . "</span>";
                                        endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Category <span style = "color: red">*</span></label>
                                        <?php
                                            $categories = $this->item_model->getDistinct('product', 'product_category', 'ASC');
                                        ?>
                                        <select name="product_category" id="" class = "form-control border-input file">
                                           <option value="Chargers">Chargers</option>
                                           <option value="Accessories">Accessories</option>
                                            <option value="Featured">Feature</option>
                                            <option value="Laptop">Laptop</option> 
                                             <option value="Cellphone">Cellphone</option> 
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Price <span style = "color: red">*</span> </label>
                                        <input type="number" class="form-control border-input" placeholder="Price" name = "product_price" value = "<?= $product_price ?>" >
                                        <?php if(validation_errors()):
                                            echo "<span style = 'color: red'>" . form_error("product_price") . "</span>";
                                        endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Quantity <span style = "color: red">*</span></label>
                                        <input type="number" class="form-control border-input" placeholder="Product quantity" name = "product_quantity" value = "<?= $product_quantity ?>">
                                        <?php if(validation_errors()):
                                            echo "<span style = 'color: red'>" . form_error("product_quantity") . "</span>";
                                        endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Image</label>
                                        <div id="filediv"><input name="user_file[]" type="file" id="file"/></div><br>           
                                            <input type="button" id="add_more" class="upload" value="Add More Files"/>
                                        </div>
                                    </div>
                                </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Product Description <span style = "color: red">*</span></label>
                                        <textarea rows="5" class="form-control border-input" placeholder="Here can be your description" name = "product_desc"><?= $product_desc ?></textarea>
                                        <?php if(validation_errors()):
                                            echo "<span style = 'color: red'>" . form_error("product_desc") . "</span>";
                                        endif; ?>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="text-center">
                                <button type="submit" class="btn btn-danger btn-fill btn-wd" style = "background-color: #F3BB45; border-color: #F3BB45; color: white;" name = "reset">Reset</button>
                                <button type="submit" class="btn btn-info btn-fill btn-wd" style = "background-color: #31bbe0; border-color: #31bbe0; color: white;" name = "enter">Enter</button>
                                <a href = "<?= base_url() ?>inventory/page" class="btn btn-info btn-fill btn-wd" style = "background-color: #dc2f54; border-color: #dc2f54; color: white;">Go back</a>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div> <!-- content -->
                </div> <!-- div-card -->
            </div> <!-- col-lg-8 col-md-7 -->
        </div> <!-- row -->
    </div> <!-- container fluid -->
</div><!-- content -->