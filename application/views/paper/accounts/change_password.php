<div class="content"><?php $user = $user[0]; ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-5"></div>
            <div class="col-lg-6 col-md-7">
                <div class="card" style = "padding: 30px">
                    <div class="header">
                        <div align = "center">
                            <?php
                            $user_image = (string)$user->image;
                            $image_array = explode(".", $user_image);
                            ?>
                            <img src="<?= $this->config->base_url() ?>uploads_users/<?= $image_array[0] . "_thumb." . $image_array[1]; ?>" alt="admin-user" width="12%" class = "img-circle image-shadow"><br><br>
                            <h4 class="title"><b>Change my password</b></h4>
                        </div>
                    </div>
                    <?php
                    if(isset($_POST['enter'])) {
                        $old_pass = $_POST['old_password'];
                        $new_pass = $_POST['new_password'];
                        $conf_pass = $_POST['confirm_password'];
                    }
                    else {
                        $old_pass = "";
                        $new_pass = "";
                        $conf_pass = "";
                    }
                    ?>
                    <hr>
                    <div class="content">
                        <form action = "<?= $this->config->base_url() ?>my_account/change_password_exec" method = "POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Old Password <span style = "color: red">*</span></label>
                                        <?php if (form_error('old_password')) { ?>
                                                <input type="password" class="form-control border-input" placeholder="Your old password" name="old_password" style="border-color: red" value="<?= $old_pass ?>">
                                                <span style='color: red'><p><?= form_error("old_password") ?></p></span>
                                        <?php } else { ?>
                                                <input type="password" class="form-control border-input" placeholder="Your old password" name="old_password" value="<?= $old_pass ?>">
                                        <?php } ?>
                                        <?php if(!validation_errors()):
                                            if ($this->session->flashdata('error') != ''): ?>
                                            <span style='color: red'><p><?php echo $this->session->flashdata('error'); ?></p>
                                            </span>
                                            <?php endif;
                                        endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>New Password <span style = "color: red">*</span></label>
                                        <?php if(form_error('new_password')): ?>
                                            <input type="password" class="form-control border-input" placeholder="Your new password" name = "new_password" style = "border-color: red" value = "<?= $new_pass ?>">
                                            <span style = 'color: red'><p><?= form_error("new_password") ?></p></span>
                                            <?php else: ?>
                                                <input type="password" class="form-control border-input" placeholder="Your new password" name = "new_password" value = "<?= $new_pass ?>">
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Confirm Password <span style = "color: red">*</span></label>
                                        <?php if(form_error('confirm_password')): ?>
                                            <input type="password" class="form-control border-input" placeholder="Please match the password above" name = "confirm_password" style = "border-color: red" value = "<?= $conf_pass ?>">
                                            <span style = 'color: red'><p><?= form_error("confirm_password") ?></p></span>
                                        <?php else: ?>
                                            <input type="password" class="form-control border-input" placeholder="Please match the password above" name = "confirm_password" value = "<?= $conf_pass ?>">
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="text-center">
                                <button type="reset" class="btn btn-danger btn-fill btn-wd" style = "background-color: #F3BB45; border-color: #F3BB45; color: white;" name = "reset">Reset</button>
                                <button type="submit" class="btn btn-info btn-fill btn-wd" style = "background-color: #31bbe0; border-color: #31bbe0; color: white;" name = "enter">Enter</button>
                                <a href = "<?= base_url() ?>my_account" class="btn btn-info btn-fill btn-wd" style = "background-color: #dc2f54; border-color: #dc2f54; color: white;">Go back</a>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div> <!-- content -->
                </div> <!-- div-card -->
            </div> <!-- col-lg-8 col-md-7 -->
        </div> <!-- row -->
    </div> <!-- container fluid -->
</div><!-- content -->