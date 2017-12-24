<div id="all">
    <div id="content">
        <div class="container">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li>Sign in</li>
                </ul>
            </div>
            <div class = "col-md-3"></div>
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
                    <hr>
                    <form action = "<?= $this->config->base_url(); ?>login/login_submit" method = "POST">
                        <div class="form-group">
                            <label for="email">Username</label>
                            <input type="text" class="form-control" name="username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group">
                            <a href="<?= $this->config->base_url(); ?>payroll/forgot"> Forgot password?</a>
                        </div>
                        <font color = "red"><?php echo validation_errors(); ?>
                            <?php
                            if ($this->session->flashdata('error') != '') {
                                echo $this->session->flashdata('error');
                            }
                            ?>
                        </font>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                        </div>
                    </form>
                </div>
            </div>


        </div>
        <!-- /.container -->
    </div>
    <!-- /#content -->