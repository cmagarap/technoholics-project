<html>
    <?php
    date_default_timezone_set("Asia/Manila");
    ?>
    <body>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-body">
                                <?php if (!$products): ?>
                                    <h1>NO ITEMS IN TABLE</h1>
                                <?php else: ?>
                                    <table class="table">
                                        <thead>
                                        <th>ITEM ID</th>
                                        <th>ITEM NAME</th>
                                        <th>ITEM DESCRIPTION</th>
                                        <th>ITEM PRICE</th>
                                        <th>ADDED AT</th>
                                        <th>UPDATED AT</th>
                                        <th colspan="3">ACTION</th>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($products as $product): ?>
                                                <tr>
                                                    <td><?= $product->product_id ?></td>
                                                    <td><?= $product->product_name ?></td>
                                                    <td><?= $product->product_desc ?></td>
                                                    <td><?= $product->product_price ?></td>
                                                    <td><?= date("F j, Y h:i A", $product->added_at) ?></td>
                                                    <td><?= date("F j, Y h:i A", $product->updated_at) ?></td>
                                                    <td>
                                                        <a class="btn btn-success" href="<?= base_url() ?>product/view/<?= $product->product_id ?>"><span class="glyphicon glyphicon-eye-open"></span></a>
                                                        <a class="btn btn-warning" href="<?= base_url() ?>product/edit/<?= $product->product_id ?>"><span class="glyphicon glyphicon-edit"></span></a>
                                                        <a class="btn btn-danger delete"data-id="<?= $product->product_id ?>"><span class="glyphicon glyphicon-trash"></span></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>

    </body>

</html>
<script>
    $(".delete").click(function () {
        var id = $(this).data('id');

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this item!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "<?= base_url() ?>product/delete/" + id;
                    } else {
                        swal("Your item is safe!");
                    }
                });

    });

</script>