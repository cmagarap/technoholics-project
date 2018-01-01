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
    <link href="<?= base_url().'assets/ordering/css/style.css'; ?>" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="<?= base_url().'assets/ordering/css/style.blue.css'; ?>" rel="stylesheet" id="theme-stylesheet">
    <!-- your stylesheet with modifications -->
    <link href="<?= base_url().'assets/ordering/css/custom.css'; ?>" rel="stylesheet">
    <script src="<?= base_url().'assets/ordering/js/respond.min.js'; ?>"></script>
    <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
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
    </style>
</head>
<body>
<br><br><br><br><br><br>