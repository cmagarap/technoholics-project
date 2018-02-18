
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
                    <form Method="post" action="<?= base_url().'home/placeorder';?>" id="form" ">
                        <h1>Checkout - Payment Method</h1>
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="<?= base_url().'home/checkout1'; ?>"><i class="fa fa-map-marker"></i><br>Address</a>
                            </li>
                            <li><a href="<?= base_url().'home/checkout2'; ?>"><i class="fa fa-truck"></i><br>Delivery Method</a>
                            </li>
                            <li><a href="<?= base_url().'home/checkout3'; ?>"><i class="fa fa-eye"></i><br>Order review</a>
                            </li>
                            <li class="active"><a href="#"><i class="fa fa-money"></i><br>Payment Method</a>
                            </li>

                        </ul>

                        <div class="content">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="box payment-Method">
                                        <h4>Paypal</h4>
                                        <p>After clicking "Place Order", you will be redirected to PayPal to complete your purchase securely.</p>
                                        <center>
                                            <img src="<?= base_url().'assets/ordering/img/payments.png'?>" class="img-responsive" style="width:400px;" >
                                        </center>
                                        <div class="box-footer text-center" style="height:65px;">

                                            <input type="radio" name="payment" value="paypal" onclick="javascript:paymentCheck();" id="paypalCheck">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="box payment-Method">

                                        <h4>Bank Deposit</h4>
                                        <p>Please deposit full payment to any of the following bank accounts:</p>
                                        <p><b>BPI</b></p>
                                        <p>Account No: <b><i>8251 0215 39</b></i></p>
                                        <p>Account Name: <b><i>Technoholics Co. </b></i></p>
                                        <p></p>
                                        <p><b>BDO</b></p>
                                        <p>Account No: <b><i>00 132 019 8684</b></i></p>
                                        <p>Account Name: <b><i>Technoholics Co. </b></i></p>
                                        <p></p>
                                        <p><b>Metrobank</b></p>
                                        <p>Account No: <b><i>007 537 00142 5</b></i></p>
                                        <p>Account Name: <b><i>Technoholics Co. </b></i></p>
                                        <p></p>
                                        <p></p>
                                        <p>Send copy of proof of payment to <b>online@technoholics.com.ph</b> for verification.</p>
                                        <div class="box-footer text-center" style="height:65px;">

                                            <input type="radio" name="payment" value="bank_dep" onclick="javascript:paymentCheck();" id="bank_depCheck">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.row -->

                        </div>
                        <!-- /.content -->

                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="<?= base_url().'home/checkout3'; ?>" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to Order Review</a>
                            </div>
                            <div class="pull-right">

                                <button type="submit" id="bank_dep" class="btn btn-primary" style="display:none">Place Order<i class="fa fa-chevron-right"></i></button>
                                <span onClick="javascript:paymentCheck();" id="paypal" style="display:none"><div id="paypal-button-container" onClick="javascript:submitform();"></div></span>
                                <?//= $delivery+$CT ?>
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
                        <input type="hidden" name="delivery" value="<?= $delivery ?>">
                        <input type="hidden" id="total" name="total" value="<?= $delivery+$CT?>">
                    </form>
                </div>
                <!-- /.box -->


            </div>
            <!-- /.col-md-9 -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /#content -->
    <script>

        // Render the PayPal button

        paypal.Button.render({

            // Set your environment

            env: 'sandbox', // sandbox | production

            // Specify the style of the button

            style: {
                label: 'pay',
                size:  'medium', // small | medium | large | responsive
                shape: 'rect',   // pill | rect
                color: 'gold'   // gold | blue | silver | black
            },

            // PayPal Client IDs - replace with your own
            // Create a PayPal app: https://developer.paypal.com/developer/applications/create

            client: {
                sandbox:    'AZDxjDScFpQtjWTOUtWKbyN_bDt4OgqaF4eYXlewfBP4-8aqX3PiV8e1GWU6liB2CUXlkA59kJXE7M6R',
                production: '<insert production client id>'
            },

            // Wait for the PayPal button to be clicked

            payment: function(data, actions) {
                return actions.payment.create({
                    payment: {
                        transactions: [
                            {
                                amount: { total: document.getElementById('total').value , currency: 'PHP' }
                            }
                        ]
                    }
                });
            },

            // Wait for the payment to be authorized by the customer

            onAuthorize: function(data, actions) {
                return actions.payment.execute().then(function() {
                    window.alert('Payment Complete!');
                    window.location = "http://localhost/project/home";
                });
            }

        }, '#paypal-button-container');

    </script>


    <script type="text/javascript">

        function paymentCheck() {
            if (document.getElementById('paypalCheck').checked) {
                document.getElementById('paypal').style.display = 'block';
                document.getElementById('bank_dep').style.display = 'none';
            } else if (document.getElementById('bank_depCheck').checked) {
                document.getElementById('paypal').style.display = 'none';
                document.getElementById('bank_dep').style.display = 'block';
            }
        }

    </script>
    <script type="text/javascript">
        function submitform()
        {
            document.form.submit();
        }
    </script>
