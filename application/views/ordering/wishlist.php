<div id="all">
    <div id="content">
        <div class="container">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="<?= base_url().'home'?>">Home</a>
                    </li>
                    <li>My wishlist</li>
                </ul>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default sidebar-menu">
                    <div class="panel-heading">
                        <h3 class="panel-title">Customer section</h3>
                    </div>
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">
                            <li>
                                <a href="<?= base_url().'home/customer_orders'?>"><i class="fa fa-list"></i> My orders</a>
                            </li>
                            <li class="active">
                                <a href="<?= base_url().'home/wishlist'?>"><i class="fa fa-heart"></i> My wishlist</a>
                            </li>
                            <li>
                                <a href="<?= base_url().'home/account'?>"><i class="fa fa-user"></i> My account</a>
                            </li>
                            <li>
                                <a href="<?= base_url().'home/logout'?>"><i class="fa fa-sign-out"></i> Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9" id="wishlist">
                <div class="box">
                    <h1>My wishlist</h1>
                    <p class="lead">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                    <?php if (!$wishes): ?>
                        <div align = "center">
                            <h3>Oops! You don't have any wishes yet.</h3>
                        </div>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Availability</th>
                                        <th>Price</th>
                                        <!-- <th>Discount</th> -->
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>                       
                                    <?php foreach ($wishes as $wishes): 
                                    $row = $this->item_model->fetch('product', array('product_id' => $wishes->product_id))[0];
                                    ?>
                                    <tr>
                                        <td>
                                          <div class="table-responsive">
                                              <table>
                                                <tr>
                                                    <td style="width: 155px;">
                                                        <div class="image_container"><center>
                                                            <a href="<?= base_url() . 'home/detail/' . $row->product_category . '/' . $row->product_brand . '/' . $row->product_id ?>">
                                                                <img class="product_image" src="<?= base_url() . 'uploads_products/' . $row->product_image1 ?>" alt="" style=" width: auto; height: 150px;">
                                                            </a></center>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h4><a style="color: #DC2F54; text-decoration: none;" href="<?= base_url() . 'home/detail/' . $row->product_category . '/' . $row->product_brand . '/' . $row->product_id ?>"><?= $row->product_name ?></a></h4>
                                                        <p><?= $row->product_desc ?></p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                    <td>
                                        <?php if($row->product_quantity != 0) echo "<h6><span style = 'background-color: green; color: white; padding: 3px;'>In-Stock</span></h6>";
                                        else echo "<h6><span style = 'background-color: red; color: white; padding: 3px;'>Out of Stock</span></h6>";
                                            ?>
                                        </td>
                                        <td>
                                            <h4><p style="color:red" class="price">₱<?= number_format($row->product_price, 2) ?></p></h4>
                                        </td>
                                        <td>
                                            <p class="buttons">
                                                <a href="<?= base_url() . 'home/detail/' . $row->product_category . '/' . $row->product_brand . '/' . $row->product_id ?>"  class="btn btn-default">View detail</a>
                                            </p>
                                        </td>
                                        <td>
                                            <a class="btn btn-danger cancel" data-id="<?= $wishes->wishlist_id ?>" title = "Remove wishlist" alt = "Cancel order">REMOVE</a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        <?php endif ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<script>
    $(".cancel").click(function () {
        var id = $(this).data('id');
        swal({
            title: "Are you sure you want to remove this item to your wishlist?",
            text: "You won't be able to undo this action once cancelled.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "<?= $this->config->base_url() ?>home/delete_wishlist/" + id;
            } else {
                swal("This order is safe!");
            }
        });
    });
</script>