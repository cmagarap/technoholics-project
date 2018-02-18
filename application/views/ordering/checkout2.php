    <div id="all">
        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>Checkout - Delivery Method</li>
                    </ul>
                </div>

                <div class="col-md-12" id="checkout">

                    <div class="box">
                        <form Method="post" action="<?= base_url().'home/checkout3'; ?>">
                            <h1>Checkout - Delivery Method</h1>
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="<?= base_url().'home/checkout1';?>"><i class="fa fa-map-marker"></i><br>Address</a>
                                </li>
                                <li class="active"><a href="#"><i class="fa fa-truck"></i><br>Delivery Method</a>
                                </li>
                                <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a>
                                </li>
                                <li class="disabled"><a href="#"><i class="fa fa-money"></i><br>Payment Method</a>
                                </li>
                            </ul>

                            <div class="content">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="box shipping-Method">

                                            <h4>LBC Medium - ₱290.00</h4>

                                            <p>For Smartphones, Smartwatches or other small items.</p>

                                            <div class="box-footer text-center" style="height:65px;">

                                                <input type="radio" checked="checked" name="delivery" value="290">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="box shipping-Method">

                                            <h4>Same Day Delivery - ₱350.00</h4>

                                            <p>Get it right on this day - for Makati, Mandaluyong, and Quezon City area only.</p>

                                            <div class="box-footer text-center" style="height:65px;">

                                                <input type="radio" checked="checked" name="delivery" value="350">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="box shipping-Method">

                                            <h4>LBC Large - ₱490.00</h4>

                                            <p>For DSLRs, Tablets or other medium items.</p>

                                            <div class="box-footer text-center" style="height:65px;">

                                                <input type="radio" checked="checked" name="delivery" value="490">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="box shipping-Method">

                                            <h4>LBC XL - ₱790.00</h4>

                                            <p>For Laptops, Desktops or other large items.</p>

                                            <div class="box-footer text-center" style="height:65px;">

                                                <input type="radio" checked="checked" name="delivery" value="790">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->

                            </div>
                            <!-- /.content -->

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="<?= base_url().'home/checkout1';?>" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to Addresses</a>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary">Continue to Order Review<i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->


                </div>
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

        <!-- *** FOOTER ***