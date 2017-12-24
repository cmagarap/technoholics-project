<!-- *** TOPBAR ***
_________________________________________________________ -->


<!-- *** TOP BAR END *** -->

<!-- *** NAVBAR ***
_________________________________________________________ -->

<div class="navbar navbar-default yamm navbar-fixed-top" role="navigation" id="navbar">
    <div id="top">
        <div class="container">
            <div class="" data-animate="fadeInDown">
                <ul class="menu">
                    <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                    </li>
                    <li><a href="<?= base_url().'home/register'; ?>">Register</a>
                    </li>
                    <li><a href="<?= base_url().'home/contact'; ?>">Contact</a>
                    </li>
                    <li><a href="<?= base_url().'home/faq'; ?>">FAQ</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Customer login</h4>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url().'home/customer_orders'; ?>" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="email-modal" placeholder="email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password-modal" placeholder="password">
                            </div>

                            <p class="text-center">
                                <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                            </p>

                        </form>

                        <p class="text-center text-muted">Not registered yet?</p>
                        <p class="text-center text-muted"><a href="<?= base_url().'home/register'; ?>"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container">
        <div class="navbar-header">

            <a class="navbar-brand home" href="<?= base_url().'home/index_ordering'; ?>" data-animate-hover="bounce">
                <img src="<?= base_url().'assets/ordering/img/logo.png'; ?>" alt="TECHNOHOLICS logo" class="navbar-brand">
            </a>
            <div class="navbar-buttons">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="fa fa-align-justify"></i>
                </button>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle search</span>
                    <i class="fa fa-search"></i>
                </button>
                <a class="btn btn-default navbar-toggle" href="<?= base_url().'home/basket'; ?>">
                    <i class="fa fa-shopping-cart"></i>  <span class="hidden-xs">3 items in cart</span>
                </a>
            </div>
        </div>
        <!--/.navbar-header -->

        <div class="navbar-collapse collapse" id="navigation">

            <ul class="nav navbar-nav navbar-left">
                <li class="active"><a href="<?= base_url().'home/index_ordering'; ?>">Home</a>
                </li>
                <li class="dropdown yamm-fw">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Men <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="yamm-content">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h5>Clothing</h5>
                                        <ul>
                                            <li><a href="<?= base_url().'home/category'; ?>">T-shirts</a>
                                            </li>
                                            <li><a href="<?= base_url().'home/category'; ?>">Shirts</a>
                                            </li>
                                            <li><a href="<?= base_url().'home/category'; ?>">Pants</a>
                                            </li>
                                            <li><a href="<?= base_url().'home/category'; ?>">Accessories</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-3">
                                        <h5>Shoes</h5>
                                        <ul>
                                            <li><a href="<?= base_url().'home/category'; ?>">Trainers</a>
                                            </li>
                                            <li><a href="<?= base_url().'home/category'; ?>">Sandals</a>
                                            </li>
                                            <li><a href="<?= base_url().'home/category'; ?>">Hiking shoes</a>
                                            </li>
                                            <li><a href="<?= base_url().'home/category'; ?>">Casual</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-3">
                                        <h5>Accessories</h5>
                                        <ul>
                                            <li><a href="<?= base_url().'home/category'; ?>">Trainers</a>
                                            </li>
                                            <li><a href="<?= base_url().'home/category'; ?>">Sandals</a>
                                            </li>
                                            <li><a href="<?= base_url().'home/category'; ?>">Hiking shoes</a>
                                            </li>
                                            <li><a href="<?= base_url().'home/category'; ?>">Casual</a>
                                            </li>
                                            <li><a href="<?= base_url().'home/category'; ?>">Hiking shoes</a>
                                            </li>
                                            <li><a href="<?= base_url().'home/category'; ?>">Casual</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-3">
                                        <h5>Featured</h5>
                                        <ul>
                                            <li><a href="<?= base_url().'home/category'; ?>">Trainers</a>
                                            </li>
                                            <li><a href="<?= base_url().'home/category'; ?>">Sandals</a>
                                            </li>
                                            <li><a href="<?= base_url().'home/category'; ?>">Hiking shoes</a>
                                            </li>
                                        </ul>
                                        <h5>Looks and trends</h5>
                                        <ul>
                                            <li><a href="<?= base_url().'home/category'; ?>">Trainers</a>
                                            </li>
                                            <li><a href="<?= base_url().'home/category'; ?>">Sandals</a>
                                            </li>
                                            <li><a href="<?= base_url().'home/category'; ?>">Hiking shoes</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- /.yamm-content -->
                        </li>
                    </ul>
                </li>

                <li class="dropdown yamm-fw">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Ladies <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="yamm-content">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h5>Clothing</h5>
                                        <ul>
                                            <li><a href="<?= base_url().'home/category'; ?>">T-shirts</a>
                                            </li>
                                            <li><a href="<?= base_url().'home/category'; ?>">Shirts</a>
                                            </li>
                                            <li><a href="<?= base_url().'home/category'; ?>">Pants</a>
                                            </li>
                                            <li><a href="<?= base_url().'home/category'; ?>">Accessories</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-3">
                                        <h5>Shoes</h5>
                                        <ul>
                                            <li><a href="<?= base_url().'home/category'; ?>">Trainers</a>
                                            </li>
                                            <li><a href="<?= base_url().'home/category'; ?>">Sandals</a>
                                            </li>
                                            <li><a href="<?= base_url().'home/category'; ?>">Hiking shoes</a>
                                            </li>
                                            <li><a href="<?= base_url().'home/category'; ?>">Casual</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-3">
                                        <h5>Accessories</h5>
                                        <ul>
                                            <li><a href="<?= base_url().'home/category'; ?>">Trainers</a>
                                            </li>
                                            <li><a href="<?= base_url().'home/category'; ?>">Sandals</a>
                                            </li>
                                            <li><a href="<?= base_url().'home/category'; ?>">Hiking shoes</a>
                                            </li>
                                            <li><a href="<?= base_url().'home/category'; ?>">Casual</a>
                                            </li>
                                            <li><a href="<?= base_url().'home/category'; ?>">Hiking shoes</a>
                                            </li>
                                            <li><a href="<?= base_url().'home/category'; ?>">Casual</a>
                                            </li>
                                        </ul>
                                        <h5>Looks and trends</h5>
                                        <ul>
                                            <li><a href="<?= base_url().'home/category'; ?>">Trainers</a>
                                            </li>
                                            <li><a href="<?= base_url().'home/category'; ?>">Sandals</a>
                                            </li>
                                            <li><a href="<?= base_url().'home/category'; ?>">Hiking shoes</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="banner">
                                            <a href="#">
                                                <img src="<?= base_url().'assets/ordering/img/banner.jpg'; ?>" class="img img-responsive" alt="">
                                            </a>
                                        </div>
                                        <div class="banner">
                                            <a href="#">
                                                <img src="<?= base_url().'assets/ordering/img/banner2.jpg'; ?>" class="img img-responsive" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.yamm-content -->
                        </li>
                    </ul>
                </li>


                    </ul>
                </li>
            </ul>

        </div>
        <!--/.nav-collapse -->

        <div class="navbar-buttons">

            <div class="navbar-collapse collapse right" id="basket-overview">
                <a href="<?= base_url().'home/basket'; ?>" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm"></span></a>
            </div>
            <!--/.nav-collapse -->
            <div class="navbar-collapse collapse right" id="search-not-mobile">
                <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle search</span>
                    <i class="fa fa-search"></i>
                </button>
                &nbsp;
            </div>

        </div>

        <div class="collapse clearfix" id="search">

            <form class="navbar-form" role="search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="input-group-btn">

			<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

		    </span>
                </div>
            </form>

        </div>
        <!--/.nav-collapse -->

    </div>
    <!-- /.container -->
</div>
<!-- /#navbar -->

<!-- *** NAVBAR END *** -->