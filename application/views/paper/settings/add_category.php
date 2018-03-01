<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-md-5"></div>
            <div class="col-lg-8 col-md-7">
                <div class="card" style = "padding: 30px">
                    <div class="header">
                        <h4 class="title"><b>Add Category</b></h4>
                    </div>
                    <hr>
                    <div class="content">
                        <?php
                        if(isset($_POST['enter'])) {
                            $category_name = $_POST['category_name'];
                            
                        } elseif(isset($_POST['reset'])) {
                            $category_name = "";
                            
                        } else {
                            $category_name = "";
                            
                        }
                        ?>
                        <form action = "<?= $this->config->base_url() ?>Settings/add_category_exec" method = "POST" enctype="multipart/form-data" >
                            <div class="row">
                                
                                
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category Name <span style = "color: red">*</span></label>
                                        <input type="text" class="form-control border-input" placeholder="Category" name = "category_name" value = "<?= $category_name ?>">
                                        <?php if(validation_errors()):
                                            echo "<span style = 'color: red'>" . form_error("category_name") . "</span>";
                                        endif; ?>
                                    </div>
                                </div>

                            </div>
                            
                           
                            
                            <hr>
                            <div class="text-center">
                                <button type="reset" class="btn btn-danger btn-fill btn-wd" style = "background-color: #F3BB45; border-color: #F3BB45; color: white;" name = "reset">Reset</button>
                                <button type="submit" class="btn btn-info btn-fill btn-wd" style = "background-color: #31bbe0; border-color: #31bbe0; color: white;" name = "enter">Enter</button>
                                <a href = "<?= base_url() ?>settings" class="btn btn-info btn-fill btn-wd" style = "background-color: #dc2f54; border-color: #dc2f54; color: white;">Go back</a>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div> <!-- content -->
                </div> <!-- div-card -->
            </div> <!-- col-lg-8 col-md-7 -->
        </div> <!-- row -->
    </div> <!-- container fluid -->
</div><!-- content -->