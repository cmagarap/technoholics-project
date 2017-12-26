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
                    <form action="<?= base_url().'register/register_submit'; ?>" method="post">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lastname">Last name</label>
                                <input type="text" class="form-control" name="lastname">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstname">First name</label>
                                <input type="text" class="form-control" name="firstname">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" name="address">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" class="form-control" name="confirm_password">
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
            <?php
            if($_POST) {
                $username = $_POST['username'];
                $password = $_POST['password'];
            }
            else {
                $username = "";
                $password = "";
            }
            ?>
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