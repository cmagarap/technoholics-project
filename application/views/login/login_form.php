<!DOCTYPE html>
<!-- saved from url=(0081)https://wrappixel.com/demos/admin-templates/monster-admin/main/pages-login-2.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $this->config->base_url() ?>images/icon2.png">
    <title>Technoholics Login</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?= $this->config->base_url() ?>assets/css/monster/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= $this->config->base_url() ?>assets/css/monster/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?= $this->config->base_url() ?>assets/css/monster/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader" style="display: none;">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"></circle>
    </svg>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<section id="wrapper" class="login-register login-sidebar" style="background-image:url('<?= $this->config->base_url(); ?>assets/images/acctng2.jpg');">
    <div class="login-box card">
        <div class="card-body">
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
            <form class="form-horizontal form-material" id="loginform" action = "<?= $this->config->base_url(); ?>login/login_submit" method = "POST">
                <a class="text-center db">
                    <!--<img src="<?= $this->config->base_url()?>assets/images/icon.png" alt="Home" width = "20%"><br>-->
                    <img src="<?= $this->config->base_url()?>images/logo.png" alt="Home" width = "90%">
                </a>

                <div class="form-group m-t-40">
                    <div class="col-xs-12">
                        <input class="form-control" type="text" placeholder="Username" name="username" value = "<?= $username; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" placeholder="Password" name="password" value = "<?= $password; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <a href="<?= $this->config->base_url(); ?>payroll/forgot"> Forgot password?</a>
                    </div>
                </div>
                <font color = "red"><?php echo validation_errors(); ?>
                    <?php
                    if ($this->session->flashdata('error') != '') {
                        echo $this->session->flashdata('error');
                    }
                    ?>
                </font>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" style = "background-color: #31bbe0; border-color: #31bbe0; color: white; margin-bottom: 5px">Log In</button>
                    </div
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" style = "background-color: #dc2f54; border-color: #dc2f54; color: white">Sign up</button>
                    </div>
                </div>
                <div class="form-group m-b-0">
                    <div class="col-sm-12 text-center">
                        <p>2017 &copy; TECHNOHOLICS</p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

</body>
</html>