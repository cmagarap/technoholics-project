<!DOCTYPE html>
<html lang="en">
<head>
    <title><?=$title?></title>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
    .container{padding: 50px;}
    input[type="number"]{width: 20%;}
    </style>
</head>
</head>
<body>
<div id="cart_contents">
<div class="container">
    <h1>Shopping Cart</h1>
    <table class="table">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($CTI > 0){
            //get cart items from session
            foreach($cartItems as $item){
        ?>
        <tr>
            <td><?php echo $item["name"]; ?></td>
            <td><?php echo '$'.$item["price"].' USD'; ?></td>
            <td><input type="number" id="update" name="update" class="form-control text-center update" value="<?= $item["qty"]; ?>" data-productid= "<?=$item["rowid"]?>"></td>
            <td><?php echo '$'.$item["subtotal"].' USD'; ?></td>
            <td>
                <!--<a href="cartAction.php?action=updateCartItem&id=" class="btn btn-info"><i class="glyphicon glyphicon-refresh"></i></a>-->
                <td><button type="button" name="remove" class="btn btn-danger btn-xs remove_inventory" id="<?=$item["rowid"]?>">Remove</button></td>
            </td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="5"><p>Your cart is empty.....</p></td>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td><a href="" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Continue Shopping</a></td>
            <td colspan="2"></td>
            <?php if($CTI > 0){ ?>
            <td class="text-center"><strong>Total <?php echo '$'.$CT.' USD'; ?></strong></td>
            <td><a href="checkout.php" class="btn btn-success btn-block">Checkout <i class="glyphicon glyphicon-menu-right"></i></a></td>
            <?php } ?>
        </tr>
    </tfoot>
    </table>
</div>
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
                        $('#cart_contents').load("<?php echo base_url(); ?>cart/viewcart");
                    }
                });
            } else
            {
                return false;
            }
        });

            $('.update').change(function () {
            var product_id = $(this).data("productid");
            var product_quantity = $('#update').val();
            $.ajax({
                url: "<?php echo base_url(); ?>cart/update",
                method: "POST",
                data: {product_id: product_id, product_quantity: product_quantity},
                success: function (data)
                {
                    $('#cart_contents').load("<?php echo base_url(); ?>cart/viewcart");
                    $('#' + product_id).val('');
                }
            });
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