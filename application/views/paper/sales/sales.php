<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <div class="card" style = "padding: 0px 10px 30px 10px">
                    <div class="header">
                        <h3>Chart</h3>
                        <hr>
                    </div>
                </div>
                <div class="card">
                    <div class="header">
                        <h3>Calendar</h3>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="header">
                        <h3><b>Sales</b></h3>
                        <p class="category"><i>Here are the list of sales for......</i></p>
                    </div>
                    <?php if(!$sales) {
                        echo "<center><h3><hr><br>There are no sales recorded in the database.</h3><br></center><br><br>";
                    } else {
                    ?>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                            <th></th>
                            <th><b>#</b></th>
                            <th><b>Order #</b></th>
                            <th><b>Income</b></th>
                            <th><b>Sales Date</b></th>
                            <th><b>Actions</b></th>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($sales as $sales): ?>
                                <tr>
                                    <td><p style = "font-size: 12px"><span class='ti-money' style = 'font-size: 15px; color: green'></span></p></td>
                                    <td><?= $sales->sales_id ?></td>
                                    <td></td>
                                    <td>&#8369;<?= number_format($sales->income, 2) ?></td>
                                    <td><?= date("n-j-Y", $sales->sales_date) ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-info" href = "<?= base_url() ?>sales/view/<?= $sales->sales_id ?>" title = "View Sales" alt = "View Sales">
                                            <span class="ti-eye"></span>
                                        </a>
                                        <a class="btn btn-danger delete" href="#" data-id="<?= $sales->sales_id ?>" title = "Delete" alt = "Delete">
                                            <span class="ti-trash"></span>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php echo "<div align = 'center'>" . $links . "</div>";
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(".delete").click(function () {
        var id = $(this).data('id');

        swal({
            title: "Are you sure you want to cancel this order?",
            text: "You will not be able to undo this action once cancelled.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "<?= $this->config->base_url() ?>orders/cancel/" + id;
                } else {
                    swal("This order is safe!");
                }
            });
    });
</script>