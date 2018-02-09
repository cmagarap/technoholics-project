<?php $counter = 1; ?>
<div class="content">
    <div class="container-fluid">
        <div align = "right">
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card" style = "padding: 30px">
                    <div class="header">
                        <div align = "left">
                            <h3 class="title"><b>Reports for daily sales.</b></h3></br>
                       </div>
                    </div>
                    <br>
                    <?php if(!$daily) {
                        echo "<center><h3><hr><br>There are no reports recorded today.</h3><br></center><br><br>";
                    } else {
                        ?>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped">
                              <thead>
                              <th><b>#</b></th>
                              <th><b>Details</b></th>
                              <th><b>Income</b></th>
                              <th><b>Date</b></th>
                              <th><b>Order</b></th>
                              <th></th>
                              </thead>
                                <tbody>
                                <?php
                                foreach ($daily as $daily): ?>
                                <tr>
                                    <td><?= $daily->sales_id ?></td>
                                    <td><i><?= $daily->sales_detail ?></i></td>
                                    <td>&#8369;<?= number_format($daily->income, 2) ?></td>
                                    <td><?= date("m-j-Y", $daily->sales_date) ?>
                                    </td>
                                    <td><u><a href = "<?= $this->config->base_url() ?>orders/view/<?= $daily->order_id ?>"><?= $daily->order_id ?></a></u></td>
                                </tr>
                                <?php endforeach; ?>
                                <thead>
                                <th><b>Total</b></th>
                                <th></th>
                                <th><b>&#8369;<?= number_format($dailytotal->income, 2)?></b></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                </thead>
                                </tbody>
                            </table>
                    <?php }?>
                </div>
            </div>
        </div>
      <div class="row">
        <div class="col-md-12">
            <div class="card" style = "padding: 30px">
                <div class="header">
                    <div align = "left">
                        <h3 class="title"><b>Reports for weekly sales.</b></h3></br>
                   </div>
                </div>
                <br>
                <?php if(!$weekly) {
                    echo "<center><h3><hr><br>There are no reports recorded this week.</h3><br></center><br><br>";
                } else {
                    ?>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                          <thead>
                          <th><b>#</b></th>
                          <th><b>Details</b></th>
                          <th><b>Income</b></th>
                          <th><b>Date</b></th>
                          <th><b>Order</b></th>
                          <th></th>
                          </thead>
                            <tbody>
                            <?php
                            foreach ($weekly as $weekly): ?>
                            <tr>
                                <td><?= $weekly->sales_id ?></td>
                                <td><i><?= $weekly->sales_detail ?></i></td>
                                <td>&#8369;<?= number_format($weekly->income, 2) ?></td>
                                <td><?= date("m-j-Y", $weekly->sales_date) ?>
                                </td>
                                <td><u><a href = "<?= $this->config->base_url() ?>orders/view/<?= $weekly->order_id ?>"><?= $weekly->order_id ?></a></u></td>
                            </tr>
                            <?php endforeach; ?>
                            <thead>
                            <th><b>Total</b></th>
                            <th></th>
                            <th><b>&#8369;<?= number_format($weeklytotal->income, 2)?></b></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            </thead>
                            </tbody>
                        </table>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col-md-12">
                <div class="card" style = "padding: 30px">
                    <div class="header">
                        <div align = "left">
                            <h3 class="title"><b>Reports for monthly sales.</b></h3></br>
                        </div>
                    </div>
                    <br>
                    <?php if(!$monthly) {
                        echo "<center><h3><hr><br>There are no reports recorded this month.</h3><br></center><br><br>";
                    } else {
                        ?>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped">
                              <thead>
                              <th><b>#</b></th>
                              <th><b>Details</b></th>
                              <th><b>Income</b></th>
                              <th><b>Date</b></th>
                              <th><b>Order</b></th>
                              <th></th>
                              </thead>
                                <tbody>
                                <?php
                                foreach ($monthly as $monthly): ?>
                                <tr>
                                    <td><?= $monthly->sales_id ?></td>
                                    <td><i><?= $monthly->sales_detail ?></i></td>
                                    <td>&#8369;<?= number_format($monthly->income, 2) ?></td>
                                    <td><?= date("m-j-Y", $monthly->sales_date) ?>
                                    </td>
                                    <td><u><a href = "<?= $this->config->base_url() ?>orders/view/<?= $monthly->order_id ?>"><?= $monthly->order_id ?></a></u></td>
                                </tr>
                                <?php endforeach; ?>
                                <thead>
                                <th><b>Total</b></th>
                                <th></th>
                                <th><b>&#8369;<?= number_format($monthlytotal->income, 2)?></b></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                </thead>
                                </tbody>
                            </table>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col-md-12">
                <div class="card" style = "padding: 30px">
                    <div class="header">
                        <div align = "left">
                            <h3 class="title"><b>Reports for annually sales.</b></h3></br>
                        </div>
                    </div>
                    <br>
                    <?php if(!$annually) {
                        echo "<center><h3><hr><br>There are no reports recorded in this year.</h3><br></center><br><br>";
                    } else {
                        ?>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped">
                              <thead>
                              <th><b>#</b></th>
                              <th><b>Details</b></th>
                              <th><b>Income</b></th>
                              <th><b>Date</b></th>
                              <th><b>Order</b></th>
                              <th></th>
                              </thead>
                                <tbody>
                                <?php
                                foreach ($annually as $annually): ?>
                                <tr>
                                    <td><?= $annually->sales_id ?></td>
                                    <td><i><?= $annually->sales_detail ?></i></td>
                                    <td>&#8369;<?= number_format($annually->income, 2) ?></td>
                                    <td><?= date("m-j-Y", $annually->sales_date) ?>
                                    </td>
                                    <td><u><a href = "<?= $this->config->base_url() ?>orders/view/<?= $annually->order_id ?>"><?= $annually->order_id ?></a></u></td>
                                </tr>
                                <?php endforeach; ?>
                                <thead>
                                <th><b>Total</b></th>
                                <th></th>
                                <th><b>&#8369;<?= number_format($annuallytotal->income, 2)?></b></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                </thead>
                                </tbody>
                            </table>
                    <?php } ?>
                </div>
            </div>
        </div>                
</div>
</div>
