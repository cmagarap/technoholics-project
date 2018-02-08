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
    
    <!-- styles -->
    <link href="<?= base_url().'assets/ordering/css/nprogress.css'; ?>" rel="stylesheet">
    <link href="<?= base_url().'assets/ordering/css/font-awesome.css'; ?>" rel="stylesheet">
    <link href="<?= base_url().'assets/ordering/css/bootstrap.min.css'; ?>" rel="stylesheet">
    <link href="<?= base_url().'assets/ordering/css/animate.min.css'; ?>" rel="stylesheet">
    <link href="<?= base_url().'assets/ordering/css/owl.carousel.css'; ?>" rel="stylesheet">
    <link href="<?= base_url().'assets/ordering/css/owl.theme.css'; ?>" rel="stylesheet">
    <link href="<?= base_url().'assets/ordering/css/starability-all.min.css';?>" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="<?= base_url().'assets/ordering/css/style.blue.css'; ?>" rel="stylesheet" id="theme-stylesheet">
    <link href="<?= $this->config->base_url()?>assets/paper/css/themify-icons.css" rel="stylesheet">
    
    <!-- web sheets -->
    <script src="<?= base_url().'assets/ordering/js/jquery-1.11.0.min.js';?>"></script>
    <script src="<?= base_url().'assets/ordering/js/bootstrap.min.js';?>"></script>
    
    <!--notify-->
    <script src="<?= base_url()?>assets/paper/js/bootstrap-notify.js"></script>
    <script src="<?= base_url()?>assets/paper/js/chartist.min.js"></script>

    <script src="<?= base_url().'assets/ordering/js/jquery.cookie.js';?>"></script>
    <script src="<?= base_url().'assets/ordering/js/waypoints.min.js';?>"></script>
    <script src="<?= base_url().'assets/ordering/js/modernizr.js';?>"></script>
    <script src="<?= base_url().'assets/ordering/js/bootstrap-hover-dropdown.js';?>"></script>
    <script src="<?= base_url().'assets/ordering/js/owl.carousel.min.js';?>"></script>
    <script src="<?= base_url().'assets/ordering/js/front.js';?>"></script>
   
    <!-- your stylesheet with modifications -->
    <link rel="stylesheet" href="<?= base_url().'assets/ordering/css/etalage.css'?>">
    <!-- <script type="text/javascript" src="<?= base_url().'assets/ordering/js/megamenu.js'?>"></script> -->
    <script src="<?= base_url().'assets/ordering/js/jquery.etalage.min.js'; ?>"></script>

    <link href="<?= base_url().'assets/ordering/css/custom.css'; ?>" rel="stylesheet">
    <script src="<?= base_url().'assets/ordering/js/respond.min.js'; ?>"></script>
    <script src="<?= base_url().'assets/ordering/js/nprogress.js'; ?>"></script>
    <link rel="shortcut icon" href="<?= base_url().'assets/ordering/img/mobile_logo.png';?>">
    <style>

        @media only screen and (max-width:767px) {
            .navbar-brand img {
                opacity: 0;
            }
            .navbar-brand {
                background: url(<?= base_url().'assets/ordering/img/mobile_logo.png'; ?>) no-repeat center;
                width: 70px;
                margin-top: 3px;
            }
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

        .dropdown a:hover {
            background-color: #31bbe0
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

        .text-danger, .text-danger:hover {
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

        .icon-danger {
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

        .alert-danger {
        background-color: #FF8F5E;
        color: #B33C12; }

    </style>
    <script>
			$(document).ready(function($){
				$('#etalage').etalage({
				});
			});
    </script>
</head>
<body>
<div style="margin-top:130px">
</div>