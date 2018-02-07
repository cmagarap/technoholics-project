<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Technoholics | All tech you need.">
    <meta name="author" content="Agarap, Calimlim, Leona, Mallari">
    <meta name="keywords" content="">
    <title><?= $title ?></title>
    <link rel="icon" type="image/png" sizes="96x96" href="<?= $this->config->base_url()?>images/icon2.png">
    <meta name="keywords" content="">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="<?= base_url().'assets/tracker/bootstrap/css/bootstrap.min.css' ?>">
    <link rel="stylesheet" href="<?= base_url().'assets/tracker/font-awesome/css/font-awesome.min.css' ?>">
    <link rel="stylesheet" href="<?= base_url().'assets/tracker/css/form-elements.css' ?>">
    <link rel="stylesheet" href="<?= base_url().'assets/tracker/css/style.css' ?>">


</head>

<body>

<!-- Top content -->
<div class="top-content">
    <div class="container">

        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 form-box">
                <form role="form" action="" method="post" class="f1">
                    <div class="f1-steps">
                        <div class="f1-progress">
                            <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3" style="width: 16.66%;"></div>
                        </div>
                        <div class="f1-step active">
                            <div class="f1-step-icon"><i class="fa fa-info"></i></div>
                            <p>Order Confirmation</p>
                        </div>
                        <div class="f1-step">
                            <div class="f1-step-icon"><i class="fa fa-truck"></i></div>
                            <p>Shipped</p>
                        </div>
                        <div class="f1-step">
                            <div class="f1-step-icon"><i class="fa fa-shopping-bag"></i></div>
                            <p>Delivered</p>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>


<!-- Javascript -->
<script src="<?= base_url().'assets/tracker/js/jquery-1.11.1.min.js' ?>"></script>
<script src="<?= base_url().'assets/tracker/bootstrap/js/bootstrap.min.js' ?>"></script>
<script src="<?= base_url().'assets/tracker/js/jquery.backstretch.min.js' ?>"></script>
<script src="<?= base_url().'assets/tracker/js/retina-1.1.0.min.js' ?>"></script>
<script src="<?= base_url().'assets/tracker/js/scripts.js' ?>"></script>


</body>

</html>