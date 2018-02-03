<?php $counter = 1; ?>
<div class="content">
    <div class="container-fluid">
        <div align = "right">
            <input type="text" name="search" class = "search" placeholder="Search product...">
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card" style = "padding: 30px">
                    <div class="header">
                        <div align = "left">
                            <h3 class="title"><b>Deleted Products List</b></h3>
                            <p class="category"><i>You can recover deleted items here.</i></p><br>
                            <a href = "<?= site_url('inventory/page'); ?>" class="btn btn-info btn-fill" style = "background-color: #dc2f54; border-color: #dc2f54; color: white;">Go Back</a>
                        </div>
                    </div>

                    <br>
                    <?php if(!$products) {
                        echo "<center><h3><hr><br>There are no deleted products recorded in the database.</h3><br></center><br><br>";
                    } else {
                    ?>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                            <th><b>#</b></th>
                            <th><b>Name</b></th>
                            <th><b>Brand</b></th>
                            <th><b>Category</b></th>
                            <th><b>Price</b></th>
                            <th><b>Stock</b></th>
                            <th><b>Actions</b></th>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($products as $products): ?>
                                <tr>
                                    <td><?= $counter++ ?></td>
                                    <td><?= $products->product_name ?></td>
                                    <td><?= $products->product_brand ?></td>
                                    <td><?= $products->product_category ?></td>
                                    <td>&#8369; <?= number_format($products->product_price, 2) ?></td>
                                    <td><?= $products->product_quantity ?></td>
                                    <td>
                                        <a class="btn btn-success" href="<?= $this->config->base_url() ?>inventory/view/<?= $products->product_id ?>" title = "View Product Info" alt = "View Product Info">
                                            <span class="ti-eye"></span>
                                        </a>
                                        <a class="btn btn-danger recover" href="#" data-id="<?= $products->product_id ?>" title = "Recover Product" alt = "Recover Product" style = "color: #7ace4c; background: white; border-color: #7ace4c">
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
    <script>
        $(".recover").click(function () {
            var id = $(this).data('id');

            swal({
                title: "Recover this product?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "<?= $this->config->base_url() ?>inventory/recover_product_exec/" + id;
                    } else {
                        swal("The product remained inactive.");
                    }
                });
        });
    </script>
