
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Products List</h4>
                        <p class="category">Here is a subtitle for this table</p>
                    </div>
                    <?php if(!$products) {
                        echo "<center><h3><hr><br>There are no products recorded in the database.</h3><br></center><br><br>";
                    } else {
                        echo "<div align = 'right'>" . $links . "</div>";
                        ?>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped">
                                <thead>
                                <th>#</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Actions</th>
                                </thead>
                                <tbody>
                                <?php
                                $counter = 1;
                                foreach ($products as $products):?>
                                <tr>
                                    <td><?= $counter++ ?></td>
                                    <td><?= $products->product_name ?></td>
                                    <td><?= $products->product_category ?></td>
                                    <td>&#8369; <?= number_format($products->product_price, 2) ?></td>
                                    <td><?= $products->product_quantity ?></td>
                                    <td>
                                        <a class="btn btn-success" /*style = "background-color: #2f313e; color: white; border-color: #2f313e;"*/ href="" title = "View Product Info" alt = "View Product Info">
                                            <span class="ti-eye"></span>
                                        </a>
                                        <a class="btn btn-warning" /*style = "background-color: #65aad3; color: white; border-color: #65aad3;" href="<?php #$this->config->base_url() ?>sys_users/edit_user/<?php #$sys_user->admin_id ?>" */ title = "Edit Product" alt = "Edit Product">
                                            <span class="ti-pencil"></span>
                                        </a>
                                        <a class="btn btn-danger delete" href="#" data-id="<?php # $sys_user->admin_id ?>" title = "Delete Product" alt = "Delete Product">
                                            <span class="ti-trash"></span>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>