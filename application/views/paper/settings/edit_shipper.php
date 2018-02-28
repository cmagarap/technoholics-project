<?php $shipper_name = $shipper_name[0]; ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="card card-user">
                   
                   
                    
                    <hr><br>
                    <div align="center">
                        <a href = "<?= base_url() ?>settings" class="btn btn-info btn-fill btn-wd" style = "background-color: #dc2f54; border-color: #dc2f54; color: white;">Go back</a>
                    </div>
                    <br>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="card">
                    <div class="header">
                        <h4 class="title"><b>Edit Shipper </b></h4>
                    </div>
                    <div class="content">
                        <hr>
                        <?php if(validation_errors()): ?>
                            <div class="alert alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <?php echo validation_errors(); ?>
                            </div>
                        <?php endif?>
                        <form action = "<?= $this->config->base_url() ?>Settings/edit_shipper_exec/<?= $this->uri->segment(3) ?>" method = "POST" enctype = "multipart/form-data">
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Shipper Name <font color="red">*</font></label>
                                        <input type="text" class="form-control border-input" placeholder="Shipper" value="<?= $shipper_name->shipper_name ?>" name = "shipper_name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Contact Number <font color="red">*</font></label>
                                        <input type="number" class="form-control border-input" placeholder="Contact Number" value="<?= $shipper_name->contact_no ?>" name = "contact_number">
                                    </div>
                                </div>
                            </div>
                            
                            
                            <hr>
                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd" style = "background-color: #31bbe0; border-color: #31bbe0; color: white;">Update Shipper</button>
                                <button type="reset" class="btn btn-danger btn-fill btn-wd" style = "background-color: #F3BB45; border-color: #F3BB45; color: white;">Reset</button>
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