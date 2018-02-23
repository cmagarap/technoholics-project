<div id="all">

    <div id="content">
        <div class="container">

            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li>Checkout - Address</li>
                </ul>
            </div>

            <div class="col-md-12" id="checkout">
                <div class="box">
                    <center>
                    <h4>Pay with Paypal</h4>
                  <div id="paypal-button-container"></div></center>

                    <script>

                        // Render the PayPal button

                        paypal.Button.render({

                            // Set your environment

                            env: 'sandbox', // sandbox | production

                            // Specify the style of the button

                            style: {
                                layout: 'vertical',  // horizontal | vertical
                                size:   'medium',    // medium | large | responsive
                                shape:  'rect',      // pill | rect
                                color:  'gold'       // gold | blue | silver | black
                            },

                            // Specify allowed and disallowed funding sources
                            //
                            // Options:
                            // - paypal.FUNDING.CARD
                            // - paypal.FUNDING.CREDIT
                            // - paypal.FUNDING.ELV

                            funding: {
                                allowed: [ paypal.FUNDING.CARD, paypal.FUNDING.CREDIT ],
                                disallowed: [ ]
                            },

                            // PayPal Client IDs - replace with your own
                            // Create a PayPal app: https://developer.paypal.com/developer/applications/create

                            client: {
                                sandbox:    'AZDxjDScFpQtjWTOUtWKbyN_bDt4OgqaF4eYXlewfBP4-8aqX3PiV8e1GWU6liB2CUXlkA59kJXE7M6R',
                                production: '<insert production client id>'
                            },

                            payment: function(data, actions) {
                                return actions.payment.create({
                                    payment: {
                                        transactions: [
                                            {
                                                amount: { total: '100.00', currency: 'USD' }
                                            }
                                        ]
                                    }
                                });
                            },

                            onAuthorize: function(data, actions) {
                                return actions.payment.execute().then(function() {
                                    window.alert('Payment Complete!');
                                });
                            }

                        }, '#paypal-button-container');

                    </script>

                </div>
                <!-- /.box -->


            </div>
            <!-- /.col-md-9 -->


        </div>
        <!-- /.container -->
    </div>
    <!-- /#content -->