<?php $category = $category[0]; ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-5"></div>
            <div class="col-lg-4 col-md-7">
                <div class="card">
                    <div class="header">
                        <h4 class="title"><b>Edit Category</b></h4>
                    </div>
                    <hr>
                    <div class="content">
                        <form action = "<?= $this->config->base_url() ?>Settings/edit_category_exec/<?= $this->uri->segment(3) ?>" method="POST">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Category Name <font color="red">*</font></label>
                                        <input type="text" class="form-control border-input" placeholder="Category" value="<?= $category->category ?>" name = "category_name">
                                        <?php if(validation_errors()):
                                            echo "<span style = 'color: red'>" . form_error("category_name") . "</span>";
                                        endif; ?>
                                    </div>
                                </div>
                                
                            </div>
                            <hr>
                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd" style = "background-color: #31bbe0; border-color: #31bbe0; color: white;">Update Category</button>
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