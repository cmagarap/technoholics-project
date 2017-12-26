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
                            <?php if(form_error("username")): ?>
                                <input type="text" class="form-control" name="username" value = "<?= $username; ?>" style = "border-color: red">
                                <span style = 'color: red'><?= form_error("username") ?></span>
                            <?php else: ?>
                                <input type="text" class="form-control" name="username" value = "<?= $username; ?>">
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <?php if(form_error("password")): ?>
                                <input type="password" class="form-control" name="password" value = "<?= $password; ?>" style = "border-color: red">
                                <span style = 'color: red'><?= form_error("password") ?></span>
                            <?php else: ?>
                                <input type="password" class="form-control" name="password" value = "<?= $password; ?>">
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <a href="<?= $this->config->base_url(); ?>payroll/forgot"> Forgot password?</a>
                        </div>
                        <?php if(!validation_errors()):
                                if ($this->session->flashdata('error') != ''): ?>
                                    <div class="alert alert-danger" role="alert" style = "border-color: red; color: red">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <?php echo $this->session->flashdata('error'); ?>
                                    </div>
                        <?php endif;
                            endif; ?>
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