    /* When the user clicks on the button,
    toggle between hiding and showing the dropdown content */
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {

            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }

    // Veo's AJAX
    $(document).ready(function () {

        $('.add_cart').click(function () {
            var product_id = $(this).data("productid");
            var product_name = $(this).data("productname");
            var product_img = $(this).data("productimg");
            var product_price = $(this).data("price");
            var product_quantity = $(this).data("productquantity");
            var minimum_quantity = 1;
            $.ajax({
                url: "<?php echo base_url(); ?>home/add",
                method: "POST",
                data: {product_id: product_id, product_name: product_name, product_img: product_img, product_price: product_price, max_quantity: product_quantity, min_quantity: minimum_quantity},
                success: function (data)
                {
                    alert("Product Added into Cart");
                    $('#' + product_id).val('');
                }
            });
        });

        $(document).on('click', '.remove_inventory', function () {
            var row_id = $(this).attr("id");
                $.ajax({
                    url: "<?php echo base_url(); ?>home/remove",
                    method: "POST",
                    data: {row_id: row_id},
                    success: function (data)
                    {
                        location.reload(); 
                        $('#subtotal').html(data);
                    }
                });
        });

        function show_cart_counts() {
            $.ajax({
                type:'POST',
                data:{action:'Show Cart Counts'},
                url:"<?php echo base_url(); ?>home/basket",
                success:function(data)
                {
                    // $('#subtotal').html(data);
                    // $('#cart_contents').load("<?php echo base_url(); ?>cart/viewcart");
                    location.reload(); 
                }
            });
        }

            $('.update').change(function () {
            var product_id = $(this).data("productid");
            var product_quantity = $(this).val();
            $.ajax({
                url: "<?php echo base_url(); ?>Home/update",
                method: "POST",
                data: {product_id: product_id, product_quantity: product_quantity},
                success: function (data)
                {   
                    $('#all').load("<?php echo base_url(); ?>home/viewbasket");
                    $('#subtotal').html('<td id="subtotal"><?php echo '₱'.number_format($item["subtotal"],2) ?></td>');
                    // location.reload(); 
                    // $('#' + product_id).val('');
                }
            });
        });

        $(document).on('click', '#clear_cart', function () {
            if (confirm("Are you sure you want to clear cart?"))
            {
                $.ajax({
                    url: "<?php echo base_url(); ?> home/clear",
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

        NProgress.configure({ showSpinner: false });
        NProgress.start();
        var interval = setInterval(function() { NProgress.inc(); }, 1000);        

        jQuery(window).load(function () {
            clearInterval(interval);
            NProgress.done();
        });

        jQuery(window).unload(function () {
            NProgress.start();
        });