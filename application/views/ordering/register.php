<div id="all">
    <div id="content">
        <div class="container">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li>New account / Sign in</li>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="box">
                    <h1>New account</h1>
                    <p class="lead" style = "display: inline">Not our registered customer yet? </p>
                    <p class="text-muted" style = "display: inline"> Sign Up now.</p>
                    <br><br>
                    <p class="text-muted">If you have any questions, please feel free to <a href="<?= base_url().'home/contact'; ?>">contact us</a>, our customer service center is working for you 24/7.</p>
                    <hr>
                    <?php
                    if($_POST) {
                        $lastname = $_POST['lastname'];
                        $firstname = $_POST['firstname'];
                        $address = $_POST['address'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $confirm_password = $_POST['confirm_password'];
                    }
                    else {
                        $lastname = "";
                        $firstname = "";
                        $address = "";
                        $email = "";
                        $password = "";
                        $confirm_password = "";
                    }
                    ?>
                    <form action="<?= base_url().'register/register_submit'; ?>" method="post">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lastname">Last name</label>
                                <?php if(form_error("lastname")): ?>
                                    <input type="text" class="form-control" name="lastname" value = "<?= $lastname; ?>" style = "border-color: red">
                                    <span style = 'color: red'><?= form_error("lastname") ?></span>
                                <?php else: ?>
                                    <input type="text" class="form-control" name="lastname" value = "<?= $lastname; ?>">
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstname">First name</label>
                                <?php if(form_error("firstname")): ?>
                                    <input type="text" class="form-control" name="firstname" value = "<?= $firstname; ?>" style = "border-color: red">
                                    <span style = 'color: red'><?= form_error("firstname") ?></span>
                                <?php else: ?>
                                    <input type="text" class="form-control" name="firstname" value = "<?= $firstname; ?>">
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <?php if(form_error("address")): ?>
                                    <input type="text" class="form-control" name="address" value = "<?= $address; ?>" style = "border-color: red">
                                    <span style = 'color: red'><?= form_error("address") ?></span>
                                <?php else: ?>
                                    <input type="text" class="form-control" name="address" value = "<?= $address; ?>">
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <?php if(form_error("email")): ?>
                                    <input type="text" class="form-control" name="email" value = "<?= $email; ?>" style = "border-color: red">
                                    <span style = 'color: red'><?= form_error("email") ?></span>
                                <?php else: ?>
                                    <input type="text" class="form-control" name="email" value = "<?= $email; ?>">
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <?php if(form_error("password")): ?>
                                    <input type="password" class="form-control" name="password" value = "<?= $password; ?>" style = "border-color: red">
                                    <span style = 'color: red'><?= form_error("password") ?></span>
                                <?php else: ?>
                                    <input type="password" class="form-control" name="password" value = "<?= $password; ?>">
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <?php if(form_error("confirm_password")): ?>
                                    <input type="password" class="form-control" name="confirm_password" value = "<?= $confirm_password; ?>" style = "border-color: red">
                                    <span style = 'color: red'><?= form_error("confirm_password") ?></span>
                                <?php else: ?>
                                    <input type="password" class="form-control" name="confirm_password" value = "<?= $confirm_password; ?>">
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <font color = "red">RECAPTCHA HERE</font>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <font color = "red">I AGREE TO THE TERMS AND CONDITIONS CHECKBOX HERE</font>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Register</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box">
                    <h1>Login</h1>
                    <p class="lead" style = "display: inline">Already a member? </p>
                    <p class="text-muted" style = "display: inline">Sign in now and start shopping.</p>
                    <hr>
                    <a href = "<?= base_url().'login'; ?>" class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</a>
                </div>
            </div>
        </div> <!-- /.container -->
    </div> <!-- /#content -->