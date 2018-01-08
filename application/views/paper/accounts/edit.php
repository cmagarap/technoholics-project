<?php $accounts = $accounts[0]; ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="card card-user">
                    <div class="content">
                        <div>
                            <img src="<?= $this->config->base_url() ?>uploads_users/<?= $accounts->image ?>" alt="<?= $accounts->email ?>" title = "<?= $accounts->email ?>" width= "100%"/>
                        </div>
                        <div align = "center">
                            <br><hr><br>
                            <h4 class="title"><?= $accounts->lastname.", ".$accounts->firstname ?><br />
                                <a><small><?php
                                        if($accounts->username == NULL) echo $accounts->email;
                                        else echo $accounts->username;
                                        ?></small></a>
                            </h4>
                        </div>
                    </div>
                    <hr>
                    <div class="text-center">
                        <div class="row">
                            <h6 style = "color: #5f5f5f;">
                                <u>
                                    <?php
                                    if($this->uri->segment(3) == "admin") {
                                        if($accounts->access_level == 0)
                                            echo "General Manager";
                                        elseif($accounts->access_level == 1)
                                            echo "Admin Assistant";
                                    }
                                    ?>
                                </u>
                            </h6>
                        </div>
                    </div>
                    <br>
                    <div align="center">
                        <a href = "<?= $this->config->base_url() ?>accounts/" class="btn btn-info btn-fill btn-wd" style = "background-color: #dc2f54; border-color: #dc2f54; color: white;">Go back</a>
                    </div>
                    <br>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="card" style = "padding: 30px">
                    <div class="header">
                        <h4 class="title"><b>Edit Account</b></h4>
                    </div>
                    <hr>
                    <div class="content">
                        <?php $user_type = ($this->uri->segment(3) == "customer") ? "customer" : "admin";
                        $user_id = ($this->uri->segment(3) == "customer") ? $accounts->customer_id : $accounts->admin_id;
                        ?>
                        <form action = "<?= $this->config->base_url() ?>accounts/edit_exec/<?= $user_type; ?>/<?= $user_id ?>" method = "POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> First Name <span style = "color: red">*</span></label>
                                        <input type="text" class="form-control border-input" placeholder="First Name" name = "first_name" value = "<?= $accounts->firstname ?>">
                                        <?php if(validation_errors()):
                                            echo "<span style = 'color: red'>" . form_error("first_name") . "</span>";
                                        endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Last Name <span style = "color: red">*</span></label>
                                        <input type="text" class="form-control border-input" placeholder="Last Name" name = "last_name" value = "<?= $accounts->lastname ?>">
                                        <?php if(validation_errors()):
                                            echo "<span style = 'color: red'>" . form_error("last_name") . "</span>";
                                        endif; ?>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Username</label>
                                        <input type="text" class="form-control border-input" placeholder="Username" name = "username" value = "<?= $accounts->username?>">
                                        <?php if(validation_errors()):
                                            echo "<span style = 'color: red'>" . form_error("username") . "</span>";
                                        endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Email Address <span style = "color: red">*</span></label>
                                        <input type="text" class="form-control border-input" placeholder="Email Address" name = "email" value = "<?= $accounts->email ?>">
                                        <?php if(validation_errors()):
                                            echo "<span style = 'color: red'>" . form_error("email") . "</span>";
                                        endif; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Contact no. </label>
                                        <input type="text" class="form-control border-input" placeholder="Contact number" name = "contact_no" value = "<?= $accounts->contact_no ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>System Status <span style = "color: red">*</span></label>
                                        <input type="number" class="form-control border-input" placeholder="1 or 0" name = "status" value = "<?= $accounts->status ?>">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd" style = "background-color: #31bbe0; border-color: #31bbe0; color: white;" name = "enter">Update Account</button>
                                <button type="reset" class="btn btn-danger btn-fill btn-wd" style = "background-color: #F3BB45; border-color: #F3BB45; color: white;" name = "reset">Reset</button>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div> <!-- content -->
                </div> <!-- div-card -->
            </div> <!-- col-lg-8 col-md-7 -->
        </div> <!-- row -->
    </div> <!-- container fluid -->
</div><!-- content -->