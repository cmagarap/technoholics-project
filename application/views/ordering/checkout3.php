
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

            <div class="col-md-9" id="checkout">

                <div class="box">
                    <form method="post" action="<?= base_url().'home/checkout4'; ?>">
                        <h1>Checkout - Payment method</h1>
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="<?= base_url().'home/checkout1'; ?>"><i class="fa fa-map-marker"></i><br>Address</a>
                            </li>
                            <li class="active"><a href="#"><i class="fa fa-money"></i><br>Payment Method</a>
                            </li>
                            <li class="disabled"><a href="<?= base_url().'home/checkout4'; ?>"><i class="fa fa-eye"></i><br>Order Review</a>
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
                        <input type="hidden" name="firstname" value="<?=$fname?>">
                        <input type="hidden" name="lastname" value="<?=$lname?>">
                        <input type="hidden" name="address" value="<?=$address?>">
                        <input type="hidden" name="province" value="<?=$province?>">
                        <input type="hidden" name="city" value="<?=$city?>">
                        <input type="hidden" name="barangay" value="<?=$barangay?>">
                        <input type="hidden" name="zip" value="<?=$zip?>">
                        <input type="hidden" name="email" value="<?=$email?>">
                    </form>
                </div>
                <!-- /.box -->


            </div>
            <!-- /.col-md-9 -->

            <div class="col-md-3">

                <div class="box" id="order-summary">
                    <div class="box-header">
                        <h3>Order summary</h3>
                    </div>
                    <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>Order subtotal</td>
                                <th>$446.00</th>
                            </tr>
                            <tr>
                                <td>Shipping and handling</td>
                                <th>$10.00</th>
                            </tr>
                            <tr>
                                <td>Tax</td>
                                <th>$0.00</th>
                            </tr>
                            <tr class="total">
                                <td>Total</td>
                                <th>$456.00</th>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
            <!-- /.col-md-3 -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /#content -->