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
                $email = $_POST['email'];
            }
            else {
                $email = "";
            }
            ?>
            <div class="col-md-6">
                <div class="box">
                    <h1>Reset Password</h1>
                    <p class="text-muted">Seems you've forgotten your password...
                        Enter the email for your account below to request a password reset.</p>
                    <hr>
                    <form action = "<?= $this->config->base_url(); ?>login/password_reset" method = "POST">
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <?php if(form_error("email")): ?>
                                <input type="text" class="form-control" name="email" value = "<?= $email; ?>" style = "border-color: red">
                                <span style = 'color: red'><?= form_error("email") ?></span>
                            <?php else: ?>
                                <input type="text" class="form-control" name="email" value = "<?= $email; ?>">
                            <?php endif; ?>
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
                            <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Send Request</button>
                            <a href="<?= $this->config->base_url() ?>login" class="btn btn-primary" style = "background-color: #dc2f54; border-color: #dc2f54">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>


        </div>
        <!-- /.container -->
    </div>
    <!-- /#content -->