<!DOCTYPE HTML>
<html>
<div class="footer">
<div class="foot-top">
                <div class="col-md-3 cust">
                    <h4>CUSTOMER CARE</h4>
                        <li><a href="contact.html">Help Center</a></li>
                        <li><a href="faq.html">FAQ</a></li>
                        <li><a href="details.html">How To Buy</a></li>
                        <li><a href="checkout.html">Delivery</a></li>
                </div>
                <div class="col-md-2 abt">
                    <h4>ABOUT US</h4>
                        <li><a href="products.html">Our Stories</a></li>
                        <li><a href="products.html">Press</a></li>
                        <li><a href="faq.html">Career</a></li>
                        <li><a href="contact.html">Contact</a></li>
                </div>
                <div class="col-md-2 myac">
                    <h4>MY ACCOUNT</h4>
                        <li><a href="register.html">Register</a></li>
                        <li><a href="checkout.html">My Cart</a></li>
                        <li><a href="checkout.html">Order History</a></li>
                        <li><a href="details.html">Payment</a></li>
                </div>
                <div class="col-md-5 our-st">
                    <div class="our-left">
                        <h4>OUR STORES</h4>
                    </div>
                    
                        <li><i class="add"> </i>Mark peter</li>
                        <li><i class="phone"> </i>012-586987</li>
                        <li><a href="mailto:info@example.com"><i class="mail"> </i>info@sitename.com </a></li>
                </div>
                <div class="clearfix"> </div>
                    <p>© 2016 Gretong. All Rights Reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
        </div>
</div>
</div>
</html>
<div class="sidebar-menu">
    <header class="logo1">
        <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> 
    </header>
    <div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
    <div class="menu">
        <ul id="menu" >
            <li><a href="<?php echo $this->config->base_url() ?>home"><i class="fa fa-tachometer"></i> <span>Home</span></a></li>
            <li id="menu-academico" ><a href="<?php echo $this->config->base_url()?>home/categories/laptop"><i class="fa fa-file-text-o"></i> <span>Laptops</span></a></li>
            <li><a href="<?php echo $this->config->base_url()?>home/categories/cellphone"><i class="lnr lnr-pencil"></i> <span>Cellphones</span></a></li>
            <li id="menu-academico" ><a href="<?php echo $this->config->base_url()?>home/categories/accesories"><i class="fa fa-file-text-o"></i> <span>Accessories</span></a></li>
            <li id="menu-academico" ><a href="<?php echo $this->config->base_url()?>home/categories/chargers"><i class="lnr lnr-book"></i> <span>Chargers</span></a></li>
        </ul>
    </div>
</div>
<div class="clearfix"></div>	
</div>
</div>
<script>
    var toggle = true;

    $(".sidebar-icon").click(function () {
        if (toggle)
        {
            $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
            $("#menu span").css({"position": "absolute"});
        } else
        {
            $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
            setTimeout(function () {
                $("#menu span").css({"position": "relative"});
            }, 400);
        }

        toggle = !toggle;
    });
</script>