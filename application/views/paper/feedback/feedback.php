<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="header">
                        <h3><span class="ti-calendar" style="color: #F3BB45"></span>&nbsp; <b>Calendar</b></h3>
                        <hr>
                        <div class="calendar"></div>
                        <form action="<?= base_url() . 'feedback'; ?>" method="POST">
                            </br>
                            <div align="center">
                                <button type="submit" id="submit" class="btn btn-info btn-fill" style="background-color: #31bbe0; border-color: #31bbe0; color: white;">Submit</button>
                                <input type="hidden" id="date" name="date">
                            </div>
                        </form>
                        </br>
                    </div>
                </div>
                <div class="card" style="padding-right: 25px">
                    <div class="content">
                        <div class="col-xs-10"><i class="ti-comment-alt" style="display: inline; color: #31bbe0"></i><b><p style="display: inline"> &nbsp;Average feedback per day:</p></b></div>
                        <div class="col-xs-2"><p><?= number_format($average, 2) ?></p></div>

                        <div class="col-xs-10"><i class="ti-close" style="display: inline; color: #dc2f54"></i><b><p style="display: inline"> &nbsp;Deleted:</p></b></div>
                        <div class="col-xs-2"><p><?= $deleted ?></p></div>

                        <div class="col-xs-10"><i class="ti-star" style="display: inline; color: #F3BB45"></i><b><p style="display: inline"> &nbsp;1-star:</p></b></div>
                        <div class="col-xs-2"><p><?= number_format($star1, 2) ?>%</p></div>

                        <div class="col-xs-10"><i class="ti-star" style="display: inline; color: #F3BB45"></i><b><p style="display: inline"> &nbsp;2-star:</p></b></div>
                        <div class="col-xs-2"><p><?= number_format($star2, 2) ?>%</p></div>

                        <div class="col-xs-10"><i class="ti-star" style="display: inline; color: #F3BB45"></i><b><p style="display: inline"> &nbsp;3-star:</p></b></div>
                        <div class="col-xs-2"><p><?= number_format($star3, 2)?>%</p></div>

                        <div class="col-xs-10"><i class="ti-star" style="display: inline; color: #F3BB45"></i><b><p style="display: inline"> &nbsp;4-star:</p></b></div>
                        <div class="col-xs-2"><p><?= number_format($star4, 2) ?>%</p></div>

                        <div class="col-xs-10"><i class="ti-star" style="display: inline; color: #F3BB45"></i><b><p style="display: inline"> &nbsp;5-star:</p></b></div>
                        <div class="col-xs-2"><p><?= number_format($star5, 2) ?>%</p></div>

                        <div class="col-xs-10"><i class="ti-comments" style="display: inline; color: green"></i><b><p style="display: inline"> &nbsp;Total feedback:</p></b></div>
                        <div class="col-xs-2"><p><?= $total_f ?></p></div>

                        <div class="footer">
                            <br><br><br><br><br><br><hr>
                            <div class="stats">
                                <i class="ti-reload"></i> Updated <?= date("F j, Y h:i A"); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h3><span class="ti-comment" style = "color: #F3BB45"></span>&nbsp; <b>Feedback</b></h3>
                        <p class="category"><?= $date ?></p>
                    </div>
                    <?php
                    if (!$feedback) {
                        echo "<center><h3><hr><br>There are no feedback recorded for the date you have selected.</h3><br></center><br><br>";
                    } else {
                        ?>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped">
                                <thead>
                                <th><b title = "Feedback ID">#</b></th>
                                <th colspan="2"><b>Customer</b></th>
                                <th><b>Feedback</b></th>
                                <th><b>Date</b></th>
                                <th><b>Rating</b></th>
                                <th><b title = "Product ID" class="ti-package"></b></th>
                                </thead>
                                <tbody>
                                <?php foreach ($feedback as $feed): ?>
                                    <tr>
                                        <?php $customer = $this->item_model->fetch("customer", "customer_id = " . $feed->customer_id)[0];
                                        $user_image = (string)$customer->image;
                                        $image_array = explode(".", $user_image); ?>

                                        <td><?= $feed->feedback_id ?></td>
                                        <td><p><img src="<?= $this->config->base_url() ?>uploads_users/<?= $image_array[0] . "_thumb." . $image_array[1]; ?>" class="img-responsive img-circle" alt="<?= $customer->username ?>" title="<?= $customer->firstname . " " . $customer->lastname ?>"></p></td>
                                        <td><a href="<?= base_url() ?>accounts/view/customer/<?= $customer->customer_id ?>" style="text-decoration: underline"><?= $customer->username ?></a></td>
                                        <td><?= $feed->feedback ?></td>
                                        <td><?= date("m-j-y", $feed->added_at) ?></td>
                                        <td>
                                            <div class="star-ratings-css">
                                                <div class="star-ratings-css-top" style="width: <?= ($feed->rating / 5) * 100 ?>%" title="<?= $feed->rating ?>"><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span></div>
                                                <div class="star-ratings-css-bottom"><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span></div>
                                            </div>
                                        </td>
                                        <td><a href="<?= base_url() ?>inventory/view/<?= $feed->product_id ?>" style="text-decoration: underline"><?= $feed->product_id ?></a></td>
                                        <td><a class="btn btn-danger cancel" href="#" data-id="<?= $feed->feedback_id ?>" title = "Delete this feedback">
                                                <span class="ti-close"></span>
                                            </a></td>
                                    </tr>
                                <?php endforeach; ?>
                                <tr>

                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <?php echo "<div align = 'center'>" . $links . "</div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("#submit").hide();

    $(".cancel").click(function () {
        var id = $(this).data('id');

        swal({
            title: "Are you sure you want to delete this feedback?",
            text: "You won't be able to undo this action.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "<?= $this->config->base_url() ?>feedback/delete/" + id;
                } else {
                    // swal("This feedback is safe!");
                }
            });
    });

    $(function() {
        $('#wrapper .version strong').text('v' + $.fn.pignoseCalendar.version);

        function onClickHandler(date, obj) {
            /**
             * @date is an array which be included dates(clicked date at first index)
             * @obj is an object which stored calendar interal data.
             * @obj.calendar is an element reference.
             * @obj.storage.activeDates is all toggled data, If you use toggle type calendar.
             * @obj.storage.events is all events associated to this date
             */

            var $calendar = obj.calendar;
            $("#submit").show();
            var text = '';

            if(date[0] !== null) {
                text += date[0].format('YYYY-MM-DD');
            }

            if(date[0] !== null && date[1] !== null) {
                text += ' ~ ';
            } else if(date[0] === null && date[1] == null) {
                text += 'nothing';
                $("#submit").hide();
            }

            if(date[1] !== null) {
                text += date[1].format('YYYY-MM-DD');
            }

            $('#date').val(text);
        }

        // Default Calendar
        $('.calendar').pignoseCalendar({
            select: onClickHandler
        });

        // This use for DEMO page tab component.
        $('.menu .item').tab();
    });
</script>