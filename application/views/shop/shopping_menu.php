<html>
    <div class="content">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="<?php echo $this->config->base_url() ?>/images/1.jpeg" style="width:100%;">
    </div>

    <div class="item">
    <img src="<?php echo $this->config->base_url() ?>/images/2.jpeg" style="width:100%;" >
    </div>

    <div class="item">
    <img src="<?php echo $this->config->base_url() ?>/images/3.jpeg" style="width:100%;">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<br><br>
        <div class="women_main">
            <!-- start content -->
            <div class="w_content">
                <div class="women">
                    <h4>FEATURED ITEMS</h4>
                    <div class="clearfix"></div>	
                </div>
                <!-- grids_of_4 -->
                <div class="w3-container"><center>
                    <br />
                    <div class="col-lg-13 col-md-13">
                        <div class="table-responsive">
                            <?php
//showing of products 
                            foreach ($product as $row) {?>
                    <div class="col-xs-12 col-sm-3 col-md-3">
                    <div class="content_box" style="height:350px; width:220px;"><a href="<?=base_url()?>home/details/<?=$row->product_id?>">  
                    <img src="<?=base_url()?>uploads/<?=$row->product_image?>"  class="img-responsive" alt="" style="width:auto; height:180px;"> 
                    </a>
                                <div class="productinfo text-center">
                                    <h4><a href="<?=base_url()?>home/details/<?=$row->product_id?>"><?=$row->product_name?></a></h4>
                                </a>
                                <div class="item_add"><span class="item_price"><h6>₱ <?=number_format($row->product_price)?></h6></span></div>
                                <button type="button" name="add_cart" class="btn btn-default add_cart" data-productname=<?=$row->product_name?> data-productquantity=<?=$row->product_quantity?> data-price=<?=$row->product_price?> data-productid=<?=$row->product_id?> />Add to Cart</button>
                            </div>
                        </div>
                        <br>               
                    </div>
                           <?php }
                            ?>

                        <?php// echo $links ?>

                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <!-- end grids_of_4 -->
            </div>
            <div class="clearfix"></div>
            <!-- end content -->
            <!--content-->
        </div>
    </div>
    <!--//content-inner-->
    <!--/sidebar-menu-->
    <!--js -->
    <script src="<?php echo $this->config->base_url() ?>js/scripts.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo $this->config->base_url() ?>js/bootstrap.min.js"></script>
    <!-- /Bootstrap Core JavaScript -->
    <!-- real-time -->
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