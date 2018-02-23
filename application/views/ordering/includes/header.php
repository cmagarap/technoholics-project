<?php
$content = $this->item_model->fetch("content", array("content_id" => 1));
$image = $content[0];
?>
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
    <link rel="icon" type="image/png" sizes="96x96" href="<?= $this->config->base_url() ?>images/<?= $image->logo_icon ?>">
    <meta name="keywords" content="">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
    <script type="text/javascript" src"<?= base_url() . 'assets/ordering/fancybox/jquery.fancybox-1.3.4.pack.js' ?>" ></script>
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/ordering/fancybox/jquery.fancybox-1.3.4.css' ?>" />
    <script type="text/javascript" src"<?= base_url() . 'assets/ordering/fancybox/jquery.fancybox-1.3.4.pack.js' ?>" ></script>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- styles -->
    <link href="<?= base_url() . 'assets/ordering/css/nprogress.css'; ?>" rel="stylesheet">
    <link href="<?= base_url() . 'assets/ordering/css/font-awesome.css'; ?>" rel="stylesheet">
    <link href="<?= base_url() . 'assets/ordering/css/bootstrap.min.css'; ?>" rel="stylesheet">
    <link href="<?= base_url() . 'assets/ordering/css/animate.min.css'; ?>" rel="stylesheet">
    <link href="<?= base_url() . 'assets/ordering/css/owl.carousel.css'; ?>" rel="stylesheet">
    <link href="<?= base_url() . 'assets/ordering/css/owl.theme.css'; ?>" rel="stylesheet">
    <link href="<?= base_url() . 'assets/ordering/css/starability-all.min.css'; ?>" rel="stylesheet">

    <!-- color picker for customer -->
    <link href="<?= $this->config->base_url() ?>assets/paper/css/jquery.simplecolorpicker-fontawesome.css" rel="stylesheet">
    <link href="<?= $this->config->base_url() ?>assets/paper/css/jquery.simplecolorpicker-glyphicons.css" rel="stylesheet">     
    <link href="<?= $this->config->base_url() ?>assets/paper/css/jquery.simplecolorpicker-regularfont.css" rel="stylesheet">
    <link href="<?= $this->config->base_url() ?>assets/paper/css/jquery.simplecolorpicker.css" rel="stylesheet">

    <!-- theme stylesheet -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/ordering/font-awesome/css/font-awesome.min.css' ?>">
    <link href="<?= base_url() . 'assets/ordering/css/style.css'; ?>" rel="stylesheet" id="theme-stylesheet">
    <link href="<?= base_url() . 'assets/ordering/css/custom.css'; ?>" rel="stylesheet">
    <link href="<?= base_url() . 'assets/ordering/css/style.blue.css'; ?>" rel="stylesheet" id="theme-stylesheet">
    <link href="<?= base_url() ?>assets/paper/css/themify-icons.css" rel="stylesheet">



    <!-- web sheets -->
    <script  src="<?= base_url() . 'assets/ordering/js/jquery-1.11.0.min.js'; ?>"></script>
    <script src="<?= base_url() . 'assets/ordering/js/bootstrap.min.js'; ?>"></script>

    <!-- Veo's Ajax -->
    <script type="text/javascript"> var base_url = "<?= base_url() ?>";</script>
    <script src="<?= base_url() . 'assets/ordering/js/ajaxfunctions.js'; ?>"></script>

    <!--notify-->
    <script src="<?= base_url() ?>assets/paper/js/bootstrap-notify.js"></script>
    <script src="<?= base_url() ?>assets/paper/js/chartist.min.js"></script>

    <script src="<?= base_url() . 'assets/ordering/js/jquery.cookie.js'; ?>"></script>
    <script src="<?= base_url() . 'assets/ordering/js/waypoints.min.js'; ?>"></script>
    <script src="<?= base_url() . 'assets/ordering/js/modernizr.js'; ?>"></script>
    <script src="<?= base_url() . 'assets/ordering/js/bootstrap-hover-dropdown.js'; ?>"></script>
    <script src="<?= base_url() . 'assets/ordering/js/owl.carousel.min.js'; ?>"></script>
    <script src="<?= base_url() . 'assets/ordering/js/front.js'; ?>"></script>

    <!-- your stylesheet with modifications -->
    <script src="<?= base_url() . 'assets/ordering/js/imagezoom.js'; ?>"></script>
    <script src="<?= base_url() . 'assets/ordering/js/jquery.flexslider.js'; ?>"></script>
    <link rel="stylesheet"  href="<?= base_url() . 'assets/ordering/css/flexslider.css'; ?>"type="text/css" media="screen"/>
    <script src="<?= base_url() . 'assets/ordering/js/respond.min.js'; ?>"></script>
    <script src="<?= base_url() . 'assets/ordering/js/nprogress.js'; ?>"></script>

    <style>
        input:checked {
            height: 20px;
            width: 20px;

        }

    @media only screen and (max-width:767px) {
        .navbar-brand img {
            opacity: 0;
        }
        .navbar-brand {
            background: url(<?= base_url() . 'assets/ordering/img/mobile_logo.png'; ?>) no-repeat center;
            width: 70px;
            margin-top: 3px;
        }
    }

    .product_image {
        width:50%;
    }

    .product_image {
        width:50%;
    }

    .product_image_suggest {
        width:50%;
    }

    .dropbtn {
        background-color: unset;
        color: white;
        border: none;
        cursor: pointer;
        padding: 0px;
    }

    .dropbtn:hover {
        text-decoration: underline;
    }
    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #555555;
        min-width: 160px;
        overflow: visible;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-content a {
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .show {
        display: block;
    }

    input[type=text]:focus, input[type=number]:focus, input[type=password]:focus {
        background-color: lightblue;
    }

    .text-primary, .text-primary:hover {
        color: #427C89; }

    .text-info, .text-info:hover {
        color: #3091B2; }

    .text-success, .text-success:hover {
    color: #42A084; }

    .text-warning, .text-warning:hover {
    color: #BB992F; }

    .text-fail, .text-fail:hover {
    color: #B33C12; }

    .glyphicon {
    line-height: 1; }

    strong {
    color: #403D39; }

    .icon-primary {
    color: #7A9E9F; }

    .icon-info {
    color: #68B3C8; }

    .icon-success {
    color: #7AC29A; }

    .icon-warning {
    color: #F3BB45; }

    .icon-fail {
    color: #EB5E28; }

    .alert {
    border: 0;
    border-radius: 0;
    color: #FFFFFF;
    padding: 10px 15px;
    font-size: 14px; }

    .container .alert {
    border-radius: 4px; }

    .navbar .alert {
    border-radius: 0;
    left: 0;
    position: absolute;
    right: 0;
    top: 85px;
    width: 100%;
    z-index: 3; }

    .navbar:not(.navbar-transparent) .alert {
    top: 70px; }

    .alert span[data-notify="icon"] {
    font-size: 30px;
    display: block;
    left: 15px;
    position: absolute;
    top: 50%;
    margin-top: -20px; }

    .alert .close ~ span {
    display: block;
    max-width: 89%; }

    .alert[data-notify="container"] {
    padding: 10px 10px 10px 20px;
    border-radius: 4px; }

    .alert.alert-with-icon {
    padding-left: 65px; }

    .alert-info {
    background-color: #7CE4FE;
    color: #3091B2; }

    .alert-success {
    background-color: #8EF3C5;
    color: #42A084; }

    .alert-warning {
    background-color: #FFE28C;
    color: #BB992F; }

    .alert-fail {
    background-color: #FF8F5E;
    color: #B33C12; }

    .star-ratings-css {
        unicode-bidi: bidi-override;
        color: #c5c5c5;
        font-size: 25px;
        height: 25px;
        width: 100px;
        margin: 0 auto;
        position: relative;
        padding: 0;
        text-shadow: 0px 1px 0 #a2a2a2;
    }
    .star-ratings-css-top {
        color: #f5bd23;
        padding: 0;
        position: absolute;
        z-index: 1;
        display: block;
        top: 0;
        left: 0;
        overflow: hidden;
    }

    .star-ratings-css-bottom {
        padding: 0;
        display: block;
        z-index: 0;
    }

    </style>

    <script>
            // Can also be used with $(document).ready()
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails"
        });

    });

    </script>

    </head>
    <body>
        <div style="margin-top:130px">
        </div>