<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="header">
                        <h3><span class="ti-stats-up" style = "color: #dc2f54;"></span>&nbsp;<b>Chart</b></h3>
                        <hr>
                        <div id="chart-container">
                            <canvas id="salesLine"></canvas>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="header">
                        <h3><span class="ti-calendar" style = "color: #dc2f54;"></span>&nbsp; <b>Calendar</b></h3>
                        <hr>
                        <div class= "calendar">
                            <div id="v-cal">
                                <div class="vcal-header">
                                    <button class="vcal-btn" data-calendar-toggle="previous">
                                        <svg height="24" version="1.1" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z"></path></svg>
                                    </button>
                                    <div class="vcal-header__label" data-calendar-label="month">
                                        March 2017
                                    </div>
                                    <button class="vcal-btn" data-calendar-toggle="next">
                                        <svg height="24" version="1.1" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path></svg>
                                    </button>
                                </div>
                                <div class="vcal-week"style="color: #fff;">
                                    <span>Mon</span> <span>Tue</span><span>Wed</span> <span>Thu</span> <span>Fri</span> <span>Sat</span> <span>Sun</span>
                                </div>
                                <div class="vcal-body" data-calendar-area="month"></div>
                            </div>

                            <p class="demo-picked">
                                Date picked: <span data-calendar-label="picked"></span>
                            </p>

                            <script src="<?= $this->config->base_url() ?>assets/paper/dist/vanillaCalendar.js" type="text/javascript"></script>
                            <script>
                                window.addEventListener('load', function () {
                                    vanillaCalendar.init();
                                })
                            </script>
                        </div>
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
<script type="text/javascript" src="<?= base_url() ?>assets/js/sales_line.js"></script>