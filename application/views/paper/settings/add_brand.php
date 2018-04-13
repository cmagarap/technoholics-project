<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-5"></div>
            <div class="col-lg-4 col-md-7">
                <div class="card">
                    <div class="header">
                        <h4 class="title"><b>Add Brand</b></h4>
                    </div>
                    <hr>
                    <div class="content">
                        <?php
                        if(isset($_POST['enter'])) {
                            $brand_name = $_POST['brand_name'];
                        } elseif(isset($_POST['reset'])) {
                            $brand_name = "";
                        } else {
                            $brand_name = "";
                        }
                        ?>
                        <form action = "<?= $this->config->base_url() ?>Settings/add_brand_exec" method = "POST" enctype="multipart/form-data" >
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Brand Name <span style = "color: red">*</span></label>
                                        <input type="text" class="form-control border-input" placeholder="Brand" name = "brand_name" value = "<?= $brand_name ?>">
                                        <?php if(validation_errors()):
                                        echo "<span style = 'color: red'>" . form_error("brand_name") . "</span>";
                                    elseif ($this->session->flashdata('error')): 
                                        echo "<span style = 'color: red'>" . $this->session->flashdata('error') . "</span>";
                                        endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Brand Category <span style = "color: red">*</span></label>
                                        <select name="category_id" id="" class = "form-control border-input file">
                                            <?php foreach($category as $category): ?>
                                                <option value="<?= $category->category_id ?>">
                                                    <?= ucfirst($category->category) ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd" style = "background-color: #31bbe0; border-color: #31bbe0; color: white;" name = "enter">Enter</button>
                                <a href = "<?= base_url() ?>settings" class="btn btn-info btn-fill btn-wd" style = "background-color: #dc2f54; border-color: #dc2f54; color: white;">Go back</a>
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