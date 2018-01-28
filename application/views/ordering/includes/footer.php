<!-- *** FOOTER ***
_________________________________________________________ -->
<div id="footer" data-animate="fadeInUp">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <h4>Pages</h4>
                <ul>
                    <li><a href="text.html">About us</a>
                    </li>
                    <li><a href="text.html">Terms and conditions</a>
                    </li>
                    <li><a href="faq.html">FAQ</a>
                    </li>
                    <li><a href="contact.html">Contact us</a>
                    </li>
                </ul>
                <hr>
                <h4>User section</h4>
                <ul>
                    <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                    </li>
                    <li><a href="register.html">Regiter</a>
                    </li>
                </ul>
                <hr class="hidden-md hidden-lg hidden-sm">
            </div> <!-- /.col-md-3 -->
            <div class="col-md-3 col-sm-6">
                <h4>Top categories</h4>
                <h5>Men</h5>
                <ul>
                    <li><a href="category.html">T-shirts</a>
                    </li>
                    <li><a href="category.html">Shirts</a>
                    </li>
                    <li><a href="category.html">Accessories</a>
                    </li>
                </ul>
                <h5>Ladies</h5>
                <ul>
                    <li><a href="category.html">T-shirts</a>
                    </li>
                    <li><a href="category.html">Skirts</a>
                    </li>
                    <li><a href="category.html">Pants</a>
                    </li>
                    <li><a href="category.html">Accessories</a>
                    </li>
                </ul>
                <hr class="hidden-md hidden-lg">
            </div> <!-- /.col-md-3 -->
            <div class="col-md-3 col-sm-6">
                <h4>Where to find us</h4>
                <p><strong>Obaju Ltd.</strong>
                    <br>13/25 New Avenue
                    <br>New Heaven
                    <br>45Y 73J
                    <br>England
                    <br>
                    <strong>Great Britain</strong>
                </p>
                <a href="contact.html">Go to contact page</a>
                <hr class="hidden-md hidden-lg">
            </div> <!-- /.col-md-3 -->
            <div class="col-md-3 col-sm-6">
                <h4>Get the news</h4>
                <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                <form>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
			                <button class="btn btn-default" type="button">Subscribe!</button>
			            </span>
                    </div> <!-- /input-group -->
                </form>
                <hr>
                <h4>Stay in touch</h4>
                <p class="social">
                    <a href="#" class="facebook external" data-animate-hover="shake"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="twitter external" data-animate-hover="shake"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="instagram external" data-animate-hover="shake"><i class="fa fa-instagram"></i></a>
                    <a href="#" class="gplus external" data-animate-hover="shake"><i class="fa fa-google-plus"></i></a>
                    <a href="#" class="email external" data-animate-hover="shake"><i class="fa fa-envelope"></i></a>
                </p>
            </div> <!-- /.col-md-3 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /#footer -->
<!-- *** FOOTER END *** -->
<!-- *** COPYRIGHT ***
_________________________________________________________ -->
<div id="copyright">
    <div class="container">
        <div class="col-md-6">
            <p class="pull-left">© <?=date("Y",time())?> <img src = "<?= $this->config->base_url() ?>images/icon2.png" width = "9%">TECHNOHOLICS</p>

        </div>
        <div class="col-md-6">
            <p class="pull-right">Template by <a href="https://bootstrapious.com/e-commerce-templates">Bootstrapious</a> & <a href="https://fity.cz">Fity</a>
                <!-- Not removing these links is part of the license conditions of the template. Thanks for understanding :) If you want to use the template without the attribution links, you can do so after supporting further themes development at https://bootstrapious.com/donate  -->
            </p>
        </div>
    </div>
</div>
<!-- *** COPYRIGHT END *** -->
</div>
<!-- /#all -->
<!-- *** SCRIPTS TO INCLUDE ***
_________________________________________________________ -->

<script>
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
                        $('#all').load("<?php echo base_url(); ?>home/basket");
                        $('#all').html(data);
                    }
                });
        });

        $(document).on('click','.update',function () {
            var product_id = $(this).data("productid");
            var product_quantity = $(this).val();
            $.ajax({
                url: "<?php echo base_url(); ?>home/update",
                method: "POST",
                data: {product_id: product_id, product_quantity: product_quantity},
                success: function (data)
                {
                    location.reload();
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

        $(document).on('click','#post',function () {
            var product_id = $(this).data("productid");
            var rating = $('input[name=rating]:checked').val(); 
            var feedback = $('#comment').val();
            var product_name = $(this).data("productname");
            $.ajax({
                url: "<?php echo base_url(); ?>home/post",
                method: "POST",
                data: {product_id: product_id, product_name: product_name, feedback: feedback, rating: rating},
                success: function (data)
                {
                    location.reload();
                }
            });
        });
        
        NProgress.configure({ showSpinner: false });
        NProgress.start();
        var interval = setInterval(function() { NProgress.inc(); }, 1000);        

        $(window).load(function () {
            clearInterval(interval);
            NProgress.done();
        });

        $(window).unload(function () {
            NProgress.start();
        });

    });
</script>
</body>
</html>