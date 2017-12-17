<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" sizes="96x96" href="<?= $this->config->base_url()?>images/icon2.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?= $title ?></title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="<?= $this->config->base_url()?>assets/paper/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Animation library for notifications   -->
    <link href="<?= $this->config->base_url()?>assets/paper/css/animate.min.css" rel="stylesheet"/>
    <!--  Paper Dashboard core CSS    -->
    <link href="<?= $this->config->base_url()?>assets/paper/css/paper-dashboard.css" rel="stylesheet"/>
    <link href="<?= $this->config->base_url()?>assets/paper/css/paper-dashboard.css" rel="stylesheet"/>
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?= $this->config->base_url()?>assets/paper/css/demo.css" rel="stylesheet" />
    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="<?= $this->config->base_url()?>assets/paper/css/themify-icons.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<?php
    $user = $this->item_model->fetch("accounts", array("user_id" => $this->session->uid));
    $user = $user[0];
?>
<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="info">
        <!--
            Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
            Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
        -->
        <div class="sidebar-wrapper">
            <div class="logo">
                <a>
                    <img src="<?= $this->config->base_url() ?>images/logo.png" alt="TECHNOHOLICS" title = "TECHNOHOLICS" width="100%">
                </a>
            </div>
            <ul class="nav">
                <li <?php if($heading == "Dashboard") { echo 'class="active"'; } ?>>
                    <a href="<?= site_url('management/'); ?>">
                        <i class="ti-pie-chart"></i> <!-- ti-panel ti-bar-chart-alt -->
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="table.html">
                        <i class="ti-shopping-cart-full"></i>
                        <p>Sales</p>
                    </a>
                </li>
                <li <?php if($heading == "Inventory") { echo 'class="active"'; } ?>>
                    <a href="<?= site_url('inventory/page'); ?>">
                        <i class="ti-archive"></i> <!-- ti-package -->
                        <p>Inventory</p>
                    </a>
                </li>
                <li>
                    <a href="icons.html">
                        <i class="ti-user"></i>
                        <p>Accounts</p>
                    </a>
                </li>
                <li>
                    <a href="maps.html">
                        <i class="ti-menu-alt"></i>
                        <p>Transaction Log</p>
                    </a>
                </li>
                <li>
                    <a href="notifications.html">
                        <i class="ti-marker-alt"></i>
                        <p>User Log</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#"><?= $heading ?></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-user"></i>

                                <!--<p class="notification">5</p>-->
                                <p><?= $user->firstname ?></p>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">
                                        <div align = "center">
                                            <img src="<?= $this->config->base_url() ?>uploads_admin/<?= $user->image ?>" alt="admin-user" width="50%" style="border-radius: 100%; margin: 5px">
                                            <br>
                                            <?= $user->username ?>
                                        </div>
                                    </a>
                                </li>
                                <li><a href="#">Manage my account</a></li>
                                <li><a href="<?= $this->config->base_url() ?>home/logout">Logout</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="ti-settings"></i>
                                <p>Settings</p>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>