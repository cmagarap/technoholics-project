<?php $brand_name = $brand_name[0]; ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4 col-md-7">
                <div class="card">
                    <div class="header">
                        <h4 class="title"><b>Edit Brand</b></h4>
                    </div>
                    <hr>
                    <div class="content">
                        <form action = "<?= $this->config->base_url() ?>settings/edit_brand_exec/<?= $this->uri->segment(3) ?>" method="POST">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Brand Name <font color="red">*</font></label>
                                        <input type="text" class="form-control border-input" placeholder="Brand" value="<?= $brand_name->brand_name ?>" name = "brand_name">
                                        <?php if(validation_errors()):
                                        echo "<span style = 'color: red'>" . form_error("brand_name") . "</span>";
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
                                                <option value="<?= $category->category_id ?>" <?php if ($brand_name->category_id == $category->category_id) echo "selected"; ?>>
                                                    <?= $category->category ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd" style = "background-color: #31bbe0; border-color: #31bbe0; color: white;">Update Brand</button>
                                <a href="<?= base_url() ?>settings" class="btn btn-danger btn-fill btn-wd" style = "background-color: #dc2f54; border-color: #dc2f54; color: white;">Go Back</a>
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