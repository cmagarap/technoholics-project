<?php 
$row = $wishes[0];
$prodrow = $product[0];
?>
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
                    </div>
                <?php if (!$wishes): ?>
                        <div class="box" align = "center">
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
                <?php foreach ($wishes as $row): ?>
                <tr>
                    <td>
                      <div class="table-responsive">
                          <table>
                        <tr>
                            <td style="width: 155px;">
                                <div class="front"><center>
                                    <a href="<?= base_url() . 'home/detail/' . $row->product_category . '/' . $row->product_brand . '/' . $row->product_id ?>">
                                        <img src="<?= base_url() . 'uploads_products/' . $row->product_image1 ?>" alt="" class="img-responsive" style=" width: auto; height: 150px;">
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
                    <?php if($prodrow->product_quantity != 0) echo "<h6><span style = 'background-color: green; color: white; padding: 3px;'>In-Stock</span></h6>";
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
                        <form align="right" method="POST" action="<?php if($this->session->has_userdata('isloggedin')){ echo base_url() . 'home/delete_wishlist'; } else { echo base_url().'login';} ?>" >
                            <input type="hidden" name="wishlist_id" value="<?= $row->wishlist_id ?>">
                            <button type="submit" class="btn btn-danger delete" onClick="return confirm('Are you sure do you want to delete this on your wishlist?');" ><i class="fa fa-trash-o fa-lg" ></i></button>
                        </form>
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