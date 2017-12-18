<?php $counter = 1; ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style = "padding: 30px">
                    <div class="header">
                        <h4 class="title"><b>Products List</b></h4>
                        <p class="category">Here is a subtitle for this table</p>
                    </div>
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
                                foreach ($products as $products):?>
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
                                        <a class="btn btn-warning" href="<?php $this->config->base_url() ?>edit/<?php $products->product_id ?>" title = "Edit Product" alt = "Edit Product">
                                            <span class="ti-pencil"></span>
                                        </a>
                                        <a class="btn btn-danger delete" href="#" data-id="<?php $products->product_id ?>" title = "Delete Product" alt = "Delete Product">
                                            <span class="ti-trash"></span>
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
        $(".delete").click(function () {
            var id = $(this).data('id');

            swal({
                title: "Are you sure you want to delete this product?",
                // text: "Once deleted, you will not be able to recover this item!",
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