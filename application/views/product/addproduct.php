<html>
    <body>
        <?php if (validation_errors()): ?>
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo validation_errors(); ?>
            </div>   
        <?php endif ?>

        <div class="container">

            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                    <form role="form" method="post" enctype="multipart/form-data" id = "form">
                        <h2>Add products</h2>
                        <hr class="colorgraph">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="productname" id="product_name" class="form-control input-lg" placeholder="Product Name" tabindex="1">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="number" name="productprice" id="product_price" class="form-control input-lg" placeholder="Product price" tabindex="2">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="number" name="productquantity" id="product_quantity" class="form-control input-lg" placeholder="Product Quantity" tabindex="3">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <select  class="form-control" name="productcategory" id="product_category" tabindex="4" >
                                        <option value="" disabled selected>Select product category</option>
                                        <option value="Cellphone">Cellphone</option>
                                        <option value="Accesories">Accesories</option>
                                        <option value="Featured">Featured</option>
                                    </select>                               
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="4" form="form" cols="50" name="productdesc" id="product_desc" class="form-control-file" placeholder = "Item description"></textarea>                
                        </div>
                        <div class="form-group">
                            <input type="file" name="userfile" id="product_image" class="form-control-file" tabindex="4">
                        </div>
                        <hr class="colorgraph">
                        <div class="row">
                            <div class="col-xs-12 col-md-6"><input type="submit" value="Submit" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
                        </div>
                    </form>
                </div>
            </div>
            <script>
                $(function () {
                    $('.button-checkbox').each(function () {

                        // Settings
                        var $widget = $(this),
                                $button = $widget.find('button'),
                                $checkbox = $widget.find('input:checkbox'),
                                color = $button.data('color'),
                                settings = {
                                    on: {
                                        icon: 'glyphicon glyphicon-check'
                                    },
                                    off: {
                                        icon: 'glyphicon glyphicon-unchecked'
                                    }
                                };

                        // Event Handlers
                        $button.on('click', function () {
                            $checkbox.prop('checked', !$checkbox.is(':checked'));
                            $checkbox.triggerHandler('change');
                            updateDisplay();
                        });
                        $checkbox.on('change', function () {
                            updateDisplay();
                        });

                        // Actions
                        function updateDisplay() {
                            var isChecked = $checkbox.is(':checked');

                            // Set the button's state
                            $button.data('state', (isChecked) ? "on" : "off");

                            // Set the button's icon
                            $button.find('.state-icon')
                                    .removeClass()
                                    .addClass('state-icon ' + settings[$button.data('state')].icon);

                            // Update the button's color
                            if (isChecked) {
                                $button
                                        .removeClass('btn-default')
                                        .addClass('btn-' + color + ' active');
                            } else {
                                $button
                                        .removeClass('btn-' + color + ' active')
                                        .addClass('btn-default');
                            }
                        }

                        // Initialization
                        function init() {

                            updateDisplay();

                            // Inject the icon if applicable
                            if ($button.find('.state-icon').length == 0) {
                                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i>');
                            }
                        }
                        init();
                    });
                });
            </script>
    </body>
</html>