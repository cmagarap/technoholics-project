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
        <!-- data-background-color="white | black" :: data-active-color="primary | info | success | warning | danger" -->
        <div class="sidebar-wrapper">
            <div class = "logo">
                <div align = "center">
                    <img src="<?= $this->config->base_url() ?>images/logo2.png" alt="TECHNOHOLICS" title = "TECHNOHOLICS" width="82%">
                </div>
            </div>
            <ul class="nav">
                <li <?php if($heading == "Dashboard") { echo 'class="active"'; } ?>>
                    <a href="<?= site_url('dashboard'); ?>">
                        <i class="ti-pie-chart"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li <?php if($heading == "Inventory") { echo 'class="active"'; } ?>>
                    <a href="<?= site_url('inventory/page'); ?>">
                        <i class="ti-archive"></i> <!-- ti-package -->
                        <p>Inventory</p>
                    </a>
                </li>
                <li <?php if($heading == "Orders Management") { echo 'class="active"'; } ?>>
                    <a href="<?= site_url('orders'); ?>">
                        <i class="ti-shopping-cart-full"></i> <!-- ti-package -->
                        <p>Orders</p>
                    </a>
                </li>
                <li <?php if($heading == "Sales Management") { echo 'class="active"'; } ?>>
                    <a href="<?= site_url('sales'); ?>">
                        <i class="ti-stats-up"></i>
                        <p>Sales</p>
                    </a>
                </li>
                <li <?php if($heading == "Accounts") { echo 'class="active"'; } ?>>
                    <?php
                    if($this->session->userdata('type') == 0) { ?>
                    <a href="<?= site_url('accounts/admin'); ?>">
                        <i class="ti-user"></i>
                        <?php echo "<p>Accounts</p></a>";
                        } elseif($this->session->userdata('type') == 1){ ?>
                        <a href="<?= site_url('accounts/customer'); ?>">
                            <i class="ti-user"></i>
                            <?php echo "<p>Customer Accounts</p></a>";
                            }
                            ?>
                </li>
                <li <?php if($heading == "Audit Trail") { echo 'class="active"'; } ?>>
                    <a href="<?= site_url('audit_trail'); ?>">
                        <i class="ti-menu-alt"></i>
                        <p>Audit Trail</p>
                    </a>
                </li>
                <li <?php if($heading == "User Log") { echo 'class="active"'; } ?>>
                    <a href="<?= site_url('user_log'); ?>">
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
                            <a href="<?= $this->config->base_url() ?>Cms">
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