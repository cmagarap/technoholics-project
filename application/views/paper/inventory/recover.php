<?php $counter = 1; ?>
<div class="content">
    <div class="container-fluid">
        <div align = "right">
            <input type="text" name="search" class = "search" placeholder="Search product...">
            <!--<a href = "$this->config->base_url()inventory/search/" title = "Go"><i class="btn btn-info ti-search"></i></a>-->
            <!--<button type="submit" class = "search"><i class="fa ti-search" style="color: #31bbe0"></i></button>-->
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card" style = "padding: 30px">
                    <div class="header">
                        <div align = "left">
                            <h3 class="title"><b>Deleted Products List</b></h3>
                            <p class="category"><i>You can recover deleted items here.</i></p><br>
                            <a href = "javascript:history.go(-1)" class="btn btn-info btn-fill" style = "background-color: #dc2f54; border-color: #dc2f54; color: white;">Go Back</a>
                        </div>
                    </div>

                    <br>
                    <?php if(!$products) {
                        echo "<center><h3><hr><br>There are no products recorded in the database.</h3><br></center><br><br>";
                    } else {
                    ?>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                            <th><b>#</b></th>
                            <th><b>Name</b></th>
                            <th><b>Category</b></th>
                            <th><b>Price</b></th>
                            <th><b>Quantity</b></th>
                            <th><b>Actions</b></th>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($products as $products): ?>
                                <tr>
                                    <td><?= $counter++ ?></td>
                                    <td><?= $products->product_name ?></td>
                                    <td><?= $products->product_category ?></td>
                                    <td>&#8369; <?= number_format($products->product_price, 2) ?></td>
                                    <td><?= $products->product_quantity ?></td>
                                    <td>
                                        <a class="btn btn-success" href="<?= $this->config->base_url() ?>inventory/view/<?= $products->product_id ?>" title = "View Product Info" alt = "View Product Info">
                                            <span class="ti-eye"></span>
                                        </a>
                                        <a class="btn btn-warning" href="<?= $this->config->base_url() ?>inventory/edit/<?= $products->product_id ?>" title = "Edit Product" alt = "Edit Product">
                                            <span class="ti-pencil"></span>
                                        </a>
                                        <a class="btn btn-info delete" href="#" data-id="<?= $products->product_id ?>" title = "Recover Product" alt = "Delete Product">
                                            <span class="ti-back-left"></span>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php echo "<div align = 'center'>" . $links . "</div>";
                        echo '</div>';
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--<div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <p>This is a large modal.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>-->

    <script>
        $(".delete").click(function () {
            var id = $(this).data('id');

            swal({
                title: "Are you sure you want to delete this product?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "<?= $this->config->base_url() ?>inventory/delete_product/" + id;
                    } else {
                        swal("The product is safe!");
                    }
                });
        });
    </script>
    <!-- Modal -->
