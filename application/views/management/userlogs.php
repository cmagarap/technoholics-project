<html>
    <?php
    date_default_timezone_set("Asia/Manila");
    ?>
    <body>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                    <div class="table-responsive">
                        <div class="panel panel-info">
                            <div class="panel-body">
                                <?php if (!$logs): ?>
                                    <h1>NO ITEMS IN TABLE</h1>
                                <?php else: ?>
                                    <table class="table">
                                        <thead>
                                        <th>TRANSACTION ID</th>
                                        <th>USER ID</th>
                                        <th>USER TYPE</th>
                                        <th>USERNAME</th>
                                        <th>DATE</th>
                                        <th>ACTION</th>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($logs as $logs): ?>
                                                <tr>
                                                    <td><?= $logs->trans_id ?></td>
                                                    <td><?= $logs->user_id ?></td>
                                                    <td><?php if ($logs->user_type == 1){
                                                        echo "Admin";
                                                    }
                                                            else if ($logs->user_type == 2){
                                                        echo "User";        
                                                            } ?></td>
                                                    <td><?= $logs->username ?></td>
                                                    <td><?= date("F j, Y h:i A", $logs->date) ?></td>
                                                    <td><?= $logs->action?></td>
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
            </div>
            <div class="clearfix"> </div>
        </div>

    </body>
</html>