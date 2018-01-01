<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0'  />
    <meta name="viewport" content="width=device-width" />
    <meta name="keywords" content="Technoholics, Technoholics Store, Online Philippine Store">
    <meta name="description" content="Technoholics Online Store">
    <meta name="author" content="Ethereal">
    <title><?= $title ?></title>
    <link rel="icon" type="image/png" sizes="96x96" href="<?= $this->config->base_url()?>images/icon2.png">
    <!-- Bootstrap core CSS -->
    <link href="<?= $this->config->base_url()?>assets/paper/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Animation library for notifications -->
    <link href="<?= $this->config->base_url()?>assets/paper/css/animate.min.css" rel="stylesheet"/>
    <!-- Paper Dashboard core CSS -->
    <link href="<?= $this->config->base_url()?>assets/paper/css/paper-dashboard.css" rel="stylesheet"/>
    <!-- Fonts and icons -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="<?= $this->config->base_url()?>assets/paper/css/themify-icons.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        input[type=text]:focus, input[type=number]:focus {
            background-color: lightblue;
        }
        .file:hover {
            background-color: lightblue;
        }
        input[type=text].search {
            width: 245px;
            height: 40px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 20px 0px 0px 20px;
            font-size: 14px;
            background-color: white;
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 7px 7px 7px 20px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
        }
        input[type=text]:focus.search {
            /*width: 50%;*/
            background-color: lightblue;
        }

        .searchbtn:hover {
            background-color: #31bbe0;
            color: white;
        }

        /*button {
            width: 50px;
            box-sizing: border-box;
            border: 2px solid #31bbe0;
            border-radius: 20px;
            font-size: 14px;
            background-color: white;
            padding: 7px;
        }*/

        .navtxt:hover {
            color: #31bbe0;
        }

        .navtxt {
            color: #38D5FF;
        }

        /* AYAW GUMANA*/
        .recover:hover {
            background-color: #7ace4c;
            border-color: #7ace4c;
            color: white;
        }

    </style>
</head>
<body>
<?php
if ($this->session->userdata("type") == 0 OR $this->session->userdata("type") == 1) {
    $user = $this->item_model->fetch("admin", array("admin_id" => $this->session->uid));
    $user = $user[0];
} elseif ($this->session->userdata("type") == 2) {
    $user = $this->item_model->fetch("customer", array("customer_id" => $this->session->uid));
    $user = $user[0];
}
?>
<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="info">
        <!-- data-background-color="white | black"
            data-active-color="primary | info | success | warning | danger" -->
        <div class="sidebar-wrapper">
            <div class = "logo">
                <div align = "center">
                    <img src="<?= $this->config->base_url() ?>images/logo2.png" alt="TECHNOHOLICS" title = "TECHNOHOLICS" width="82%">
                </div>
            </div>
            <ul class="nav">
                <li <?php if($heading == "Dashboard") { echo 'class="active"'; } ?>>
                    <a href="<?= site_url('dashboard/'); ?>">
                        <i class="ti-pie-chart"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li <?php if($heading == "Sales") { echo 'class="active"'; } ?>>
                    <a href="<?= site_url('sales'); ?>">
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
                <li <?php if($heading == "Accounts") { echo 'class="active"'; } ?>>
                    <a href="<?= site_url('accounts'); ?>">
                        <i class="ti-user"></i>
                        <?php
                        if($this->session->userdata('type') == 0) {
                            echo "<p>Accounts</p>";
                        } elseif($this->session->userdata('type') == 1){
                            echo "<p>Customer Accounts</p>";
                        }
                        ?>
                    </a>
                </li>
                <li <?php if($heading == "Audit Trail") { echo 'class="active"'; } ?>>
                    <a href="<?= site_url('audit_trail/page'); ?>">
                        <i class="ti-menu-alt"></i>
                        <p>Audit Trail</p>
                    </a>
                </li>
                <li <?php if($heading == "User Log") { echo 'class="active"'; } ?>>
                    <a href="<?= site_url('user_log/page'); ?>">
                        <i class="ti-marker-alt"></i>
                        <p>User Log</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default" style = "background-color: #595959">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" style = "color: white"><?= $heading ?></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="navtxt">
                                    <i class="ti-user"></i>
                                    <p><?= $user->firstname ?></p>
                                    <b class="caret"></b>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?= $this->config->base_url() ?>my_account/" title = "Manage my account">
                                        <div align = "center">
                                            <?php
                                            $user_image = (string)$user->image;
                                            $image_array = explode(".", $user_image);
                                            ?>
                                            <img src="<?= $this->config->base_url() ?>uploads_users/<?= $image_array[0] . "_thumb." . $image_array[1]; ?>" alt="admin-user" width="50%" style="border-radius: 100%; margin: 5px">
                                            <br>
                                            <?= $user->username ?>
                                        </div>
                                    </a>
                                </li>
                                <li><a href="<?= $this->config->base_url() ?>logout">Logout</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <span class="navtxt">
                                <i class="ti-settings"></i>
                                <p>Settings</p>
                                </span>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>

