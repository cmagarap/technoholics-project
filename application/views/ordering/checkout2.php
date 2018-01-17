
<div id="all">

    <div id="content">
        <div class="container">

            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li>Checkout - Payment method</li>
                </ul>
            </div>

            <div class="col-md-12" id="checkout">

                <div class="box">
                    <form method="post" action="<?= base_url().'home/checkout3'; ?>">
                        <h1>Checkout - Payment method</h1>
                        <ul class="nav nav-pills nav-justified">
                            <li class = "disabled"><a href="#"><i class="fa fa-map-marker"></i><br>Address</a>
                            </li>
                            <li class="active"><a href="#"><i class="fa fa-money"></i><br>Payment Method</a>
                            </li>
                            <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a>
                            </li>
                        </ul>

                        <div class="content">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="box payment-method">

                                        <h4>Paypal</h4>

                                        <p>We like it all.</p>

                                        <div class="box-footer text-center">

                                            <input type="radio" name="payment" value="payment1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="box payment-method">

                                        <h4>Payment gateway</h4>

                                        <p>VISA and Mastercard only.</p>

                                        <div class="box-footer text-center">

                                            <input type="radio" name="payment" value="payment2">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="box payment-method">

                                        <h4>Cash on delivery</h4>

                                        <p>You pay when you get it.</p>

                                        <div class="box-footer text-center">

                                            <input type="radio" name="payment" value="payment3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                        </div>
                        <!-- /.content -->

                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="<?= base_url().'home/checkout1'; ?>" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to Addresses</a>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary">Continue to Order review<i class="fa fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                        <input type="hidden" name="firstname" value="<?= $fname ?>">
                        <input type="hidden" name="lastname" value="<?= $lname ?>">
                        <input type="hidden" name="address" value="<?= $address ?>">
                        <input type="hidden" name="province" value="<?= $province ?>">
                        <input type="hidden" name="city" value="<?= $city ?>">
                        <input type="hidden" name="barangay" value="<?= $barangay ?>">
                        <input type="hidden" name="zip" value="<?= $zip ?>">
                        <input type="hidden" name="email" value="<?= $email ?>">
                        <input type="hidden" name="contact" value="<?= $contact ?>">
                    </form>
                </div>
                <!-- /.box -->


            </div>
            <!-- /.col-md-9 -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /#content -->