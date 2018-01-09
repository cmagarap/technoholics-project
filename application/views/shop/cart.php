\<!DOCTYPE html>
<html lang="en">
<head>
    <title><?=$title?></title>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    .container{padding: 50px;}
    .cart-link{width: 100%;text-align: right;display: block;font-size: 22px;}
    </style>
</head>
</head>
<body>
<div class="container">
    <h1>Products</h1>
    <a href="<?php echo base_url(); ?>cart/viewcart" class="cart-link" title="View Cart"><i class="glyphicon glyphicon-shopping-cart"></i></a>
    <div id="products" class="row list-group">
        <div class="item col-lg-4">
        <?php if (!$product): ?>
        <h1>NO ITEMS IN TABLE</h1>
          <?php else: ?>
        <?php foreach ($product as $product): ?>
            <div class="thumbnail">
                <div class="caption">
                    <h4 class="list-group-item-heading"><?= $product->product_name ?></h4>
                    <p class="list-group-item-text"><?= $product->product_desc ?></p>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="lead"<?= $product->product_price?></p>
                        </div>
                        <div class="col-md-6">
                        <button type="button" name="add_cart" class="btn btn-default add_cart" data-productname="<?=$product->product_name?>" data-productquantity="<?=$product->product_quantity?>" data-price="<?=$product->product_price?>" data-productid="<?=$product->product_id?>" />Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
  </div>
  <?php endif ?>
</div>
</body>
</html>
<script>
    $(document).ready(function () {

        $('.add_cart').click(function () {
            var product_id = $(this).data("productid");
            var product_name = $(this).data("productname");
            var product_price = $(this).data("price");
            var product_quantity = $(this).data("productquantity");
            var minimum_quantity = 1;
            $.ajax({
                url: "<?php echo base_url(); ?>cart/add",
                method: "POST",
                data: {product_id: product_id, product_name: product_name, product_price: product_price, max_quantity: product_quantity, min_quantity: minimum_quantity},
                success: function (data)
                {
                    alert("Product Added into Cart");
                    $('#' + product_id).val('');
                }
            });
        });

        $('#container').load("<?php echo base_url(); ?>cart/load");

        $(document).on('click', '.remove_inventory', function () {
            var row_id = $(this).attr("id");
            if (confirm("Are you sure you want to remove this?"))
            {
                $.ajax({
                    url: "<?php echo base_url(); ?>cart/remove",
                    method: "POST",
                    data: {row_id: row_id},
                    success: function (data)
                    {
                        alert("Product removed from Cart");
                        $('#cart_details').html(data);
                    }
                });
            } else
            {
                return false;
            }
        });

        $(document).on('click', '#clear_cart', function () {
            if (confirm("Are you sure you want to clear cart?"))
            {
                $.ajax({
                    url: "<?php echo base_url(); ?>cart/clear",
                    success: function (data)
                    {
                        alert("Your cart has been cleared...");
                        $('#cart_details').html(data);
                    }
                });
            } else
            {
                return false;
            }
        });

    });
</script>