<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <div class="card" style = "padding: 0px 10px 30px 10px">
                    <div class="header">
                        <h3>Chart</h3>
                        <hr>
                        <div id="chart-container">
                            <canvas id="salesLine"></canvas>
                        </div>
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
                            <th><b>Details</b></th>
                            <th><b>Income</b></th>
                            <th><b>Date</b></th>
                            <th><b>Order</b></th>
                            <th></th>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($sales as $sales): ?>
                                <tr>
                                    <td><p style = "font-size: 12px"><span class='ti-money' style = 'font-size: 15px; color: green'></span></p></td>
                                    <td><?= $sales->sales_id ?></td>
                                    <td><i><?= $sales->sales_detail ?></i></td>
                                    <td>&#8369;<?= number_format($sales->income, 2) ?></td>
                                    <td><?= date("m-j-Y", $sales->sales_date) ?>
                                    </td>
                                    <td><u><a href = "<?= $this->config->base_url() ?>orders/view/<?= $sales->order_id ?>"><?= $sales->order_id ?></a></u></td>
                                    <td>
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
            title: "Are you sure you want to delete this?",
            // text: "You will not be able to undo this action once cancelled.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "<?= $this->config->base_url() ?>sales/delete/" + id;
                } else {
                    // swal("This order is safe!");
                }
            });
    });
</script>
z