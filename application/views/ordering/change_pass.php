<div id="all">
    <div id="content">
        <div class="container">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li>Change password</li>
                </ul>
            </div>
            <div class = "col-md-3"></div>
            <?php
            if($_POST) {
                $password = $_POST['password'];
                $cpassword = $_POST['cpassword'];
            }
            else {
                $password = "";
                $cpassword = "";
            }
            ?>
            <div class="col-md-6">
                <div class="box">
                    <h1>Password Reset</h1>
                    <hr>
                    <form role="form" method="POST">
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
                            <label for="cpassword">Confirm Password</label>
                            <?php if(form_error("cpassword")): ?>
                                <input type="password" class="form-control" name="cpassword" value = "<?= $cpassword; ?>" style = "border-color: red">
                                <span style = 'color: red'><?= form_error("cpassword") ?></span>
                            <?php else: ?>
                                <input type="password" class="form-control" name="cpassword" value = "<?= $cpassword; ?>">
                            <?php endif; ?>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Change password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.container -->
    </div>
    <!-- /#content -->