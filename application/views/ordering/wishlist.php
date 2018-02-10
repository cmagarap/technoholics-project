
           <?php $row = $wishes[0];
            $prodrow = $product[0];?>
            <div class="col-md-12" id="wishlist">
                <ul class="breadcrumb">
                    <li><a href="<?= base_url().'home'; ?>">Home</a>
                    </li>
                    <li>Wishlist</li>
                </ul>

                <div class="box">
                    <h1>My Wishlist</h1>
                </div>
                <?php if (!$wishes): ?>
                    <div class="col-md-12">
                        <div class="box" align = "center">
                            <h3>Oops! You don't have any wishes yet.</h3>
                        </div>
                    </div>
                <?php else: ?>
                <div class="box">
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
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                        </div>




  <!--------------
                    <div class="col-md-4 col-sm-6">
                        <div class="product" style="height:430px;">
                            <div class="flip-container" style="padding: 10px;">
                                    <form align="right" method="POST" action="<?php if($this->session->has_userdata('isloggedin')){ echo base_url() . 'home/delete_wishlist'; } else { echo base_url().'login';} ?>" >
                                    <input type="hidden" name="wishlist_id" value="<?= $row->wishlist_id ?>">
                                    <button type="submit" class="btn btn-danger delete" onClick="return confirm('Are you sure do you want to delete this on your wishlist?');" ><i class="fa fa-trash-o fa-lg" ></i></button>
                                    </form>
                                <div class="flipper">
                                    <div class="front"><center>
                                            <a href="<?= base_url() . 'home/detail/' . $row->product_category . '/' . $row->product_brand . '/' . $row->product_id ?>">
                                                <img src="<?= base_url() . 'uploads_products/' . $row->product_image1 ?>" alt="" class="img-responsive" style="width: auto; height: 150px;">
                                            </a></center>
                                    </div>
                                    <div class="back"><center>
                                            <a href="<?= base_url() . 'home/detail/' . $row->product_category . '/' . $row->product_brand . '/' . $row->product_id ?>">
                                                <img src="<?= base_url() . 'uploads_products/' . $row->product_image1 ?>" alt="" class="img-responsive" style="width: auto; height: 150px;">
                                            </a></center>
                                    </div>
                                </div>
                            </div>  
                            <a href="<?= base_url() . 'home/detail/' . $row->product_category . '/' . $row->product_brand . '/' . $row->product_id ?>" class="invisible">
                                <img src="<?= base_url() . 'uploads_products/' . $row->product_image1 ?>" alt="" class="img-responsive" style="width: auto; height: 150px;">
                            </a>
                            <div class="text">
                                <h3><a href="<?= base_url() . 'home/detail/' . $row->product_category . '/' . $row->product_brand . '/' . $row->product_id ?>"><?= $row->product_name ?></a></h3>
                                <p class="price">₱<?= number_format($row->product_price, 2) ?></p>
                                <p class="buttons">
                                    <a href="<?= base_url() . 'home/detail/' . $row->product_category . '/' . $row->product_brand . '/' . $row->product_id ?>"  class="btn btn-default">View detail</a>
                                </p>
                            </div>
                            <!-- /.text -->
 <!--                       </div>
                        <!-- /.product -->
  <!--                  </div>
                    <!-- /.col-md-4 -->

            </div>
            <?php endif ?>


            </div> <!-- /.container -->
    </div>
    <!-- /#content -->
