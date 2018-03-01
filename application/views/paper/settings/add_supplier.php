<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-md-5"></div>
            <div class="col-lg-8 col-md-7">
                <div class="card">
                    <div class="header">
                        <h4 class="title"><b>Add Supplier</b></h4>
                    </div>
                    <hr>
                    <div class="content">
                        <?php
                        if (isset($_POST['enter'])) {
                            $supplier_name = $_POST['supplier_name'];
                            $contact_number = $_POST['contact_number'];
                            $address = $_POST['address'];
                        } else {
                            $supplier_name = "";
                            $contact_number = "";
                            $address = "";
                        }
                        ?>
                        <form action = "<?= $this->config->base_url() ?>Settings/add_supplier_exec" method = "POST" enctype="multipart/form-data" >
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Supplier Name <span style = "color: red">*</span></label>
                                        <input type="text" class="form-control border-input" placeholder="Supplier" name = "supplier_name" value = "<?= $supplier_name ?>">
                                        <?php
                                        if (validation_errors()):
                                            echo "<span style = 'color: red'>" . form_error("supplier_name") . "</span>";
                                        endif;
                                        ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Contact Number <span style = "color: red">*</span></label>
                                        <input type="number" class="form-control border-input" placeholder="Contact Number" name = "contact_number" value = "<?= $contact_number ?>">
                                        <?php
                                        if (validation_errors()):
                                            echo "<span style = 'color: red'>" . form_error("contact_number") . "</span>";
                                        endif;
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div class = "row">
                                <div class = "col-md-12">
                                    <div class = "form-group">
                                        <label>Address <span style = "color: red">*</span></label>
                                        <input type="text" class="form-control border-input" placeholder="Address" name = "address" value = "<?= $address ?>">
                                        <?php
                                        if (validation_errors()):
                                            echo "<span style = 'color: red'>" . form_error("address") . "</span>";
                                        endif;
                                        ?>
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