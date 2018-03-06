<?php
$content = $this->item_model->fetch("content");
$image = $content[0];
$userinformation = $this->item_model->fetch('customer', array('customer_id' => $this->session->uid))[0];
date_default_timezone_set("Asia/Manila");
?>
<div class="navbar navbar-default yamm navbar-fixed-top" role="navigation" id="navbar">
    <div id="top" style="background-color: <?= $image->customer_color1 ?>">
        <div class="container">
            <ul class="menu">
                <!-- If a customer is logged in -->
                <?php if($this->session->has_userdata('isloggedin')):
                $user_image = (string)$userinformation->image;
                $image_array = explode(".", $user_image);
                ?>
                <li>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <button class="dropbtn"><?= $userinformation->firstname; ?></button>
                        </a>
                        <ul class="dropdown-menu" style="background-color: #555555">
                            <li>
                                <a href="<?= $this->config->base_url() ?>home/account" title = "Manage my account">
                                    <div align = "center">
                                        <img src="<?= $this->config->base_url() ?>uploads_users/<?= $image_array[0] . "_thumb." . $image_array[1]; ?>" alt="customer-user" width="30%" style="border-radius: 100%; margin: 1px 5px 10px 5px">
                                        <br><?= $userinformation->username; ?>
                                    </div>
                                </a>
                            </li>
                            <li><a href="<?= base_url() . 'home/customer_orders'; ?>">Track my Order</a></li>
                            <li><a href="<?= base_url() . 'home/wishlist'; ?>">My Wishlist</a></li>
                            <li><a href="<?= $this->config->base_url() ?>logout">Logout</a></li>
                        </ul>
                    </div>
                </li>
            <?php else: ?>
                <li><a href="<?= base_url().'login'; ?>">Login</a></li>
                <li><a href="<?= base_url().'register'; ?>">Register</a></li>
            <?php endif; ?>
            <li><a href="<?= base_url().'home/contact'; ?>">Contact Us</a></li>
            <li><a href="<?= base_url().'home/faq'; ?>">FAQ</a></li>
        </ul>
    </div>
</div>

<div class="container">
    <div class="navbar-header">
        <a class="navbar-brand home" href="<?= base_url().'home'; ?>" data-animate-hover="bounce">
            <img src="<?= base_url() ?>assets/ordering/img/<?= $image->company_logo ?>" alt="TECHNOHOLICS logo" class="navbar-brand">
        </a>
        <div class="navbar-buttons" id="MCTI" >
            <a class="btn btn-default navbar-toggle" href="<?= base_url().'home/basket'; ?>">
                <i class="fa fa-shopping-cart"></i>
                <?php if($CTI) : ?>
                    <span class="label label-danger" style="position:absolute; top:-8px; left:30px;"><?=$CTI?></span>
                <?php endif; ?>
            </a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search" >
                <span class="sr-only">Toggle search</span>
                <i class="fa fa-search" ></i>
            </button>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                <span class="sr-only">Toggle navigation</span>
                <i class="fa fa-align-justify"></i>
            </button>
        </div>
    </div> <!--/.navbar-header -->
    <div class="navbar-collapse collapse" id="navigation">
        <ul class="nav navbar-nav navbar-left">
            <li class="<?php if($page == "Home"){ echo "active";}?>"><a href="<?= base_url().'home'; ?>">Home</a>
            </li>
            <li class="<?php if($page == "category"){ echo "active"; }?> dropdown yamm-fw">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">PRODUCTS <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <div class="yamm-content">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h5>Smartphones</h5>
                                    <ul>
                                        <li><a href="<?= base_url().'home/category/smartphone/Apple'; ?>">Apple</a>
                                        </li>
                                        <li><a href="<?= base_url().'home/category/smartphone/Samsung';
                                        ?>">Samsung</a>
                                    </li>
                                    <li><a href="<?= base_url().'home/category/smartphone/ASUS'; ?>">Asus</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-3">
                                <h5>Tablets</h5>
                                <ul>
                                    <li><a href="<?= base_url().'home/category/tablet/Apple'; ?>">Apple</a>
                                    </li>
                                    <li><a href="<?= base_url().'home/category/tablet/Samsung'; ?>">Samsung</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-3">
                                <h5>Laptops</h5>
                                <ul>
                                    <li><a href="<?= base_url().'home/category/laptop/Apple'; ?>">Apple</a>
                                    </li>
                                    <li><a href="<?= base_url().'home/category/laptop/Samsung'; ?>">Samsung</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-3">
                                <div class="banner">
                                    <a href="#">
                                        <img src="<?= base_url() ?>assets/ordering/img/<?= $image->image_2 ?>" class="img img-responsive" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.yamm-content -->
                </li>
            </ul>
        </li>


        <li class="<?php if($page == "services"){ echo "active"; }?> dropdown yamm-fw">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">SERVICES <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <div class="yamm-content">
                        <div class="row">
                            <div class="col-sm-4">
                                <h5>Repair</h5>
                                <ul>
                                    <li><a href="<?= base_url().'home/repair'; ?>">Apple Repair</a>
                                    </li>

                                </ul>
                            </div>
                            <div class="col-sm-4">
                                <h5>Recovery</h5>
                                <ul>
                                    <li><a href="<?= base_url().'home/recovery'; ?>">Data Recovery</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-4">
                                <div class="banner">
                                    <a href="#">
                                        <img src="<?= base_url() ?>assets/ordering/img/<?= $image->image_1 ?>" class="img img-responsive" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- /.yamm-content -->
                </li>
            </ul>
        </li>
    </ul>
</div> <!--/.nav-collapse -->

<div class="navbar-buttons" id="CTI">
    <div class="navbar-collapse collapse right" id="basket-overview">
        <a href="<?= base_url().'home/basket'; ?>" class="btn btn-primary navbar-btn">
            <i class="fa fa-shopping-cart"></i>
            <?php if($CTI) : ?>
                <span class="label label-danger" style="position:absolute; top:12px;"><?=$CTI?></span>
            <?php endif; ?>
        </a>
    </div>
    <!--/.nav-collapse -->
    <div class="navbar-collapse collapse right" id="search-not-mobile">
        <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
            <span class="sr-only" style="border-color: #31bbe0;">Toggle search</span>
            <i class="fa fa-search"></i>
        </button>
        &nbsp;
    </div>
</div>
<div class="collapse clearfix" id="search">
    <form class="navbar-form" role="form" action="<?= $this->config->base_url() ?>home/search" method="post">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="search" autocomplete="off">
            <span class="input-group-btn">
             <button type="submit" class="btn btn-primary" ><i class="fa fa-search"></i></button>
         </span>
     </div>
     <div id="productlist" style="position:absolute;"></div>
 </form>
</div> <!--/.nav-collapse -->
</div> <!-- /.container -->
</div> <!-- /#navbar -->
<!-- *** NAVBAR END *** -->
<?php if($this->session->has_userdata('statusMsg')):?>
    <script>
        $(document).ready(function(){
            $.notify({
                icon: 'ti-check',
                message: "<?= $this->session->userdata('statusMsg') ?>"
            },{
                type: 'info',
                timer: 2000,
                placement: {
                    from: "top",
                    align: "center"
                }
            });
        });
    </script>
<?php endif; 
$this->session->unset_userdata('statusMsg');
?>