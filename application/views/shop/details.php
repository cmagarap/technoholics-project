<html>
<div class="content">
<div class="women_main">
	<!-- start content -->
			<div class="row single">
				<div class="det">
				  <div class="single_left">
					<div class="grid images_3_of_2">
						<div class="flexslider">
							        <!-- FlexSlider -->
										<script src="<?php echo $this->config->base_url() ?>assets/js/imagezoom.js"></script>
										  <script defer="" src="<?php echo $this->config->base_url() ?>assets/js/jquery.flexslider.js"></script>
										<link rel="stylesheet" href="<?php echo $this->config->base_url() ?>assets/css/flexslider.css" type="text/css" media="screen">

										<script>
										// Can also be used with $(document).ready()
										$(window).load(function() {
										  $('.flexslider').flexslider({
											animation: "slide",
											controlNav: "thumbnails"
										  });
										});
										</script>
                                    <!-- //FlexSlider-->
                        <?php      foreach ($product as $row) { ?>
                        <div class="flex-viewport" style="overflow: hidden; position: relative;"><ul class="slides" style="width: 1200%; transition-duration: 0.6s; transform: translate3d(-864px, 0px, 0px);">
                            <li data-thumb="<?php echo $this->config->base_url() ?>uploads/<?=$row->product_image?>" class="clone" aria-hidden="true" style="width: 288px; float: left; display: block;">
								   <div class="thumb-image"> <img src="<?php echo $this->config->base_url() ?>uploads/<?=$row->product_image?>" data-imagezoom="true" class="img-responsive" draggable="false"> </div>
								</li>
								<li data-thumb="<?php echo $this->config->base_url() ?>uploads/<?=$row->product_image?>" class="" style="width: 288px; float: left; display: block;">
									<div class="thumb-image"> <img src="uploads/<?=$row->product_image?>" data-imagezoom="true" class="img-responsive" draggable="false"> </div>
								</li>
								<li data-thumb="<?php echo $this->config->base_url() ?>uploads/<?=$row->product_image?>" style="width: 288px; float: left; display: block;" class="">
									 <div class="thumb-image"> <img src="<?php echo $this->config->base_url() ?>uploads/<?=$row->product_image?>" data-imagezoom="true" class="img-responsive" draggable="false"> </div>
								</li>
								<li data-thumb="<?php echo $this->config->base_url() ?>uploads/<?=$row->product_image?>" style="width: 288px; float: left; display: block;" class="flex-active-slide">
								   <div class="thumb-image"> <img src="<?php echo $this->config->base_url() ?>uploads/<?=$row->product_image?>" data-imagezoom="true" class="img-responsive" draggable="false"> </div>
								</li>
								
                              </ul>
                            </div><ul class="flex-direction-nav"><li class="flex-nav-prev"><a class="flex-prev" href="#">Previous</a></li><li class="flex-nav-next"><a class="flex-next" href="#">Next</a></li></ul></div>
				  </div>
				  <div class="desc1 span_3_of_2">
					<h3><?=$row->product_name?></h3>
					<p><?=$row->product_desc?></p>
						<div class="price">
							<span class="text">Price:</span>
                            <span class="price-new">₱<?=number_format($row->product_price)?></span>
                            <br><br>
                            <button type="button" name="add_cart" class="btn btn-default add_cart" data-productname="' . $row->product_name . '" data-productquantity="' . $row->product_quantity . '" data-price="' . $row->product_price . '" data-productid="' . $row->product_id . '" />Add to Cart</button>
                        </div>
                        <?php }?>
			   	 </div>
          	    <div class="clearfix"></div>
          	   </div>
						 <div class="clearfix"></div>
				     </div>
		   	  </div>
	       </div>		
	  </div>
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
                url: "<?php echo base_url(); ?>home/add",
                method: "POST",
                data: {product_id: product_id, product_name: product_name, product_price: product_price, max_quantity: product_quantity, min_quantity: minimum_quantity},
                success: function (data)
                {
                    alert("Product Added into Cart");
                    $('#cart_details').html(data);
                    $('#' + product_id).val('');
                }
            });
        });

        $('#cart_details').load("<?php echo base_url(); ?>home/load");

        $(document).on('click', '.remove_inventory', function () {
            var row_id = $(this).attr("id");
            if (confirm("Are you sure you want to remove this?"))
            {
                $.ajax({
                    url: "<?php echo base_url(); ?>home/remove",
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
                    url: "<?php echo base_url(); ?>home/clear",
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