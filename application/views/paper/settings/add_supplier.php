<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-md-5"></div>
            <div class="col-lg-8 col-md-7">
                <div class="card" style = "padding: 30px">
                    <div class="header">
                        <h4 class="title"><b>Add Brand</b></h4>
                    </div>
                    <hr>
                    <div class="content">
                        <?php
                        if(isset($_POST['enter'])) {
                            $supplier_name = $_POST['supplier_name'];
                            
                        } elseif(isset($_POST['reset'])) {
                            $supplier_name = "";
                            
                        } else {
                            $supplier_name = "";
                            
                        }
                        ?>
                        <form action = "<?= $this->config->base_url() ?>Settings/add_supplier_exec" method = "POST" enctype="multipart/form-data" >
                            <div class="row">
                                
                                
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Supplier Name <span style = "color: red">*</span></label>
                                        <input type="text" class="form-control border-input" placeholder="Supplier" name = "supplier_name" value = "<?= $supplier_name ?>">
                                        <?php if(validation_errors()):
                                            echo "<span style = 'color: red'>" . form_error("supplier_name") . "</span>";
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