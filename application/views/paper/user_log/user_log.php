<?php $counter = 1; ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style = "padding: 30px">
                    <div class="header">
                        <h3 class="title"><b>User Log</b></h3>
                        <p class="category"><i>The activities performed by the system users.</i></p>
                    </div>
                    <?php if(!$logs) { ?>
                        <center>
                            <h3><hr><br>There are no user logs recorded in the database.</h3><br>
                        </center><br><br>
                    <?php } else { ?>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                                <th><b>#</b></th>
                                <th><b>User</b></th>
                                <th><b>Action</b></th>
                                <th><b>User type</b></th>
                                <th><b>Date</b></th>
                                <th><b>Time</b></th>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($logs as $logs):?>
                                <tr>
                                    <td><?= $logs->log_id ?></td>
                                    <td><?= $logs->username ?></td>
                                    <td><?= $logs->action ?></td>
                                    <td>
                                        <?php if($logs->user_type == 0) echo "General Manager";
                                        elseif($logs->user_type == 1) echo "Admin Assistant";
                                        elseif($logs->user_type == 2) echo "Customer";
                                        ?>
                                    </td>
                                    <td><?= date("F j, Y", $logs->date) ?></td>
                                    <td><?= date("h:i A", $logs->date) ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div align = 'center'><?= $links ?></div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>