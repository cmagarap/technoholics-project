<?php $shipper_name = $shipper_name[0]; ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-md-5"></div>
            <div class="col-lg-8 col-md-7">
                <div class="card">
                    <div class="header">
                        <h4 class="title"><b>Edit Shipper </b></h4>
                    </div>
                    <hr>
                    <div class="content">
                        <form action = "<?= $this->config->base_url() ?>settings/edit_shipper_exec/<?= $this->uri->segment(3) ?>" method="POST">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Shipper Name <font color="red">*</font></label>
                                        <input type="text" class="form-control border-input" placeholder="Shipper" value="<?= $shipper_name->shipper_name ?>" name="shipper_name">
                                        <?php if(validation_errors()):
                                            echo "<span style = 'color: red'>" . form_error("shipper_name") . "</span>";
                                        endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Contact Number <font color="red">*</font></label>
                                        <input type="number" class="form-control border-input" placeholder="Contact Number" value="<?= $shipper_name->contact_no ?>" name="contact_number">
                                        <?php if(validation_errors()):
                                            echo "<span style = 'color: red'>" . form_error("contact_number") . "</span>";
                                        endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Shipping Price <font color="red">*</font></label>
                                        <input type="number" class="form-control border-input" placeholder="Price" value="<?= $shipper_name->shipper_price ?>" name="shipping_price">
                                        <?php if(validation_errors()):
                                            echo "<span style = 'color: red'>" . form_error("shipping_price") . "</span>";
                                        endif; ?>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd" style = "background-color: #31bbe0; border-color: #31bbe0; color: white;">Update Shipper</button>
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