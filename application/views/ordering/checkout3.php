<div id="all">
    <div id="content">
        <div class="container">

            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li>Checkout - Payment Method</li>
                </ul>
            </div>
            <div class="col-md-12" id="checkout">
                <div class="box">
                    <form Method="post" action="<?= base_url().'home/checkout3_exec'; ?>">
                        <h1>Checkout - Payment Method</h1>
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="<?= base_url().'home/checkout1'; ?>"><i class="fa fa-map-marker"></i><br>Address</a>
                            </li>
                            <li><a href="<?= base_url().'home/checkout2'; ?>"><i class="fa fa-truck"></i><br>Delivery Method</a>
                            </li>
                            <li class="active"><a href="#"><i class="fa fa-money"></i><br>Payment Method</a>
                            </li>
                            <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Order review</a>
                            </li>
                        </ul>

                        <div class="content">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="box payment-Method">

                                        <h4>Paypal</h4>

                                        <p>We like it all.</p>

                                        <div class="box-footer text-center">

                                            <input type="radio" name="payment" value="paypal">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="box payment-Method">

                                        <h4>Payment gateway</h4>

                                        <p>VISA and Mastercard only.</p>

                                        <div class="box-footer text-center">

                                            <input type="radio" name="payment" value="visa_mastercard">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="box payment-Method">

                                        <h4>Cash on delivery</h4>

                                        <p>You pay when you get it.</p>

                                        <div class="box-footer text-center">

                                            <input type="radio" name="payment" value="COD">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                            <?php if(form_error("payment")): ?>
                                <div align="center">
                                    <span style = 'color: red'><?= form_error("payment") ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- /.content -->

                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="<?= base_url().'home/checkout2'; ?>" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to Delivery Method</a>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary">Continue to Order review<i class="fa fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    <?php if (!$this->session->has_userdata('isloggedin')) :?>
                        <input type="hidden" name="firstname" value="<?= $this->session->userdata['checkout1_session']['fname'] ?>">
                        <input type="hidden" name="lastname" value="<?= $this->session->userdata['checkout1_session']['lname'] ?>">
                        <input type="hidden" name="address" value="<?= $this->session->userdata['checkout1_session']['address'] ?>">
                        <input type="hidden" name="province" value=<?= $this->session->userdata['checkout1_session']['province'] ?>">
                        <input type="hidden" name="city" value="<?= $this->session->userdata['checkout1_session']['city'] ?>">
                        <input type="hidden" name="barangay" value="<?= $this->session->userdata['checkout1_session']['barangay'] ?>">
                        <input type="hidden" name="zip" value="<?= $this->session->userdata['checkout1_session']['zip'] ?>">
                        <input type="hidden" name="email" value="<?= $this->session->userdata['checkout1_session']['email'] ?>">
                        <input type="hidden" name="contact" value="<?= $this->session->userdata['checkout1_session']['contact'] ?>">
                        <input type="hidden" name="shipper_name" value="<?= $this->session->userdata['checkout2_session']['shipper_name'] ?>">
                        <input type="hidden" name="shipper_price" value="<?= $this->session->userdata['checkout2_session']['shipper_price'] ?>">
                    <?php else :?>
                        <input type="hidden" name="shipper_name" value="<?= $this->session->userdata['checkout2_session']['shipper_name'] ?>">
                        <input type="hidden" name="shipper_price" value="<?= $this->session->userdata['checkout2_session']['shipper_price'] ?>">
                    <?php endif;?>
                    </form>
                </div>
                <!-- /.box -->


            </div>
            <!-- /.col-md-9 -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /#content -->