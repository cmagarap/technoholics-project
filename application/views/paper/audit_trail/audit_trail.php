<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style = "padding: 30px">
                    <div class="header">
                        <h2 class="title"><b>Audit Trail</b></h2>
                        <p class="category">Customers' record of transactions, viewed, and rated products.</p>
                    </div>
                    <?php if(!$trail) { ?>
                        <center>
                            <h3><hr><br>There are no audit trail recorded in the database.</h3><br>
                        </center><br><br>
                    <?php } else { ?>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped">
                                <thead>
                                <th><b>Audit Trail ID</b></th>
                                <th><b>Customer</b></th>
                                <th><b>Item</b></th>
                                <th><b>Details</b></th>
                                <th><b>Date</b></th>
                                <th><b>Time</b></th>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($trail as $trail):?>
                                    <tr>
                                        <td><?= $trail->at_id ?></td>
                                        <td><?= $trail->customer_name ?></td>
                                        <td><?= $trail->item_name ?></td>
                                        <td><?php if($trail->at_detail == NULL) echo "<font color = '#ccc' ><i>NULL</i></font>";
                                        else echo $trail->at_detail; ?></td>
                                        <td><?= date("F j, Y", $trail->at_date) ?></td>
                                        <td><?= date("h:i A", $trail->at_date) ?></td>
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
</div>