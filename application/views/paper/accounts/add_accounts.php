<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-1 col-md-5">

            </div>
            <div class="col-lg-10 col-md-7">
                <div class="card" style = "padding: 30px">
                    <div class="header">
                        <h4 class="title"><b>Add Account</b></h4>
                    </div>
                    <div class="content">
                        <?php
                        if(isset($_POST['enter'])) {
                            $first_name = $_POST['first_name'];
                            $last_name = $_POST['last_name'];
                            $email_address = $_POST['email_address'];
                            $user_name= $_POST['user_name'];
                            $user_type = $_POST['user_type'];
                            $password = $_POST['password'];
                            $username = $_POST['username'];
                            $account = $_POST['account'];
                        } elseif(isset($_POST['reset'])) {
                            $first_name = "";
                            $last_name = "";
                            $email_address = "";
                            $user_name= "";
                            $user_type = "";
                            $password = "";
                            $username = "";
                             $account = "";

                        } else {
                             $first_name = "";
                            $last_name = "";
                            $email_address = "";
                            $user_name= "";
                            $user_type = "";
                            $password = "";
                            $username = "";
                            $account = "";
                        }
                        ?>
                        <form action = "<?= $this->config->base_url() ?>accounts/add_accounts_exec" method = "POST" enctype="multipart/form-data">
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> First Name <span style = "color: red">*</span></label>
                                        <input type="text" class="form-control border-input" placeholder="First Name" name = "first_name" value = "<?= $first_name ?>">
                                        <?php if(validation_errors()):
                                            echo "<span style = 'color: red'>" . form_error("first_name") . "</span>";
                                        endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label> Last Name <span style = "color: red">*</span></label>
                                        <input type="text" class="form-control border-input" placeholder="Last Name" name = "last_name" value = "<?= $last_name ?>">
                                        <?php if(validation_errors()):
                                            echo "<span style = 'color: red'>" . form_error("last_name") . "</span>";
                                        endif; ?>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> Username <span style = "color: red">*</span></label>
                                        <input type="text" class="form-control border-input" placeholder="Username" name = "username" value = "<?= $username?>">
                                        <?php if(validation_errors()):
                                            echo "<span style = 'color: red'>" . form_error("email_address") . "</span>";
                                        endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> Email Address <span style = "color: red">*</span></label>
                                        <input type="text" class="form-control border-input" placeholder="Email Address" name = "email_address" value = "<?= $email_address ?>">
                                        <?php if(validation_errors()):
                                            echo "<span style = 'color: red'>" . form_error("email_address") . "</span>";
                                        endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Password <span style = "color: red">*</span></label>
                                        <input type="text" class="form-control border-input" placeholder="Password" name = "password" value = "<?= $password ?>">
                                        <?php if(validation_errors()):
                                            echo "<span style = 'color: red'>" . form_error("password") . "</span>";
                                        endif; ?>
                                    </div>
                                </div>
                            </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> Confirm Password <span style = "color: red">*</span></label>
                                        <input type="text" class="form-control border-input" placeholder=" Confirm Password" name = "confirm_password">
                                        <?php if(validation_errors()):
                                            echo "<span style = 'color: red'>" . form_error("confirm_password") . "</span>";
                                        endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Account Type <span style = "color: red">*</span></label>
                                        
                                        <select name="account" id="" class = "form-control border-input file">
                                        
                                    
                                        <option value="Admin Assistant">Admin Assistant</option>
                                        <option value="Customer">Customer</option>
                                                                               
                                        </select>
                                    </div>
                                </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>User Image</label>
                                        <input type="file" name = "userfile" class="form-control border-input file" id=" >
                                    </div>
                                </div>
                            </div>
                           
                            <div class="text-center">
                                <button type="submit" class="btn btn-danger btn-fill btn-wd" style = "background-color: #F3BB45; border-color: #F3BB45; color: white;" name = "reset">Reset</button>
                                <button type="submit" class="btn btn-info btn-fill btn-wd" style = "background-color: #31bbe0; border-color: #31bbe0; color: white;" name = "enter">Enter</button>
                                <a href = "<?= base_url() ?>accounts/accounts" class="btn btn-info btn-fill btn-wd" style = "background-color: #dc2f54; border-color: #dc2f54; color: white;">Go back</a>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div> <!-- content -->
                </div> <!-- div-card -->
            </div> <!-- col-lg-8 col-md-7 -->
        </div> <!-- row -->
    </div> <!-- container fluid -->
</div><!-- content -->
   