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
                            <h3 class="title"><b>Daily Sales</b></h3></br>
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
                              <th><b>Date</b></th>
                              <th><b>Income</b></th>
                              <th><b>Items sold</b></th>
                              <th></th>
                              </thead>
                                <tbody>
                                <?php
                                foreach ($daily as $daily): ?>
                                <tr>
                                    <td><?= date("F j, Y", $daily->sales_date) ?>
                                    </td>
                                    <td>&#8369;<?= number_format($daily->income, 2) ?></td>
                                    <?php $this->db->select("order_quantity");
                                    $order_q = $this->item_model->fetch("orders", "order_id = " . $daily->order_id)[0];
                                    ?>
                                    <td><?= $order_q->order_quantity ?></td>

                                </tr>
                                <?php endforeach; ?>
                                <thead>
                                <th><b>Total</b></th>
                                <th></th>
                                <th><b>&#8369;<?= number_format($dailytotal, 2)?></b></th>
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
                        <h3 class="title"><b>Weekly Sales</b></h3></br>
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
                          <th><b>Date</b></th>
                          <th><b>Income</b></th>
                          <th></th>
                          </thead>
                            <tbody>
                            <?php
                            foreach ($weekly as $weekly): ?>
                            <tr>
                                <td><?= date("m-j-Y", $weekly->sales_date) ?></td>
                                <td>&#8369;<?= number_format($weekly->income, 2) ?></td>
                            </tr>
                            <?php endforeach; ?>
                            <thead>
                            <th><b>Total</b></th>
                            <th></th>
                            <th><b>&#8369;<?= number_format($weeklytotal, 2)?></b></th>
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
                            <h3 class="title"><b>Monthly Sales</b></h3></br>
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
                              <th><b>Month</b></th>
                              <th><b>Income</b></th>
                              <th></th>
                              </thead>
                                <tbody>
                                <?php
                                foreach ($monthly as $monthly): ?>
                                <tr>
                                    <td><?= $monthly->sales_month ?>
                                    </td>
                                    <td>&#8369;<?= number_format($monthly->income, 2) ?></td>
                                </tr>
                                <?php endforeach; ?>
                                <thead>
                                <th><b>Total</b></th>
                                <th></th>
                                <th><b>&#8369;<?= number_format($monthlytotal, 2)?></b></th>
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
                            <h3 class="title"><b>Annual Sales</b></h3></br>
                        </div>
                    </div>
                    <br>
                    <?php if(!$annual) {
                        echo "<center><h3><hr><br>There are no reports recorded in this year.</h3><br></center><br><br>";
                    } else {
                        ?>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped">
                              <thead>
                              <th><b>Year</b></th>
                              <th><b>Income</b></th>
                              <th></th>
                              </thead>
                                <tbody>
                                <?php
                                foreach ($annual as $annual): ?>
                                <tr>
                                    <td><?= $annual->sales_y ?>
                                    </td>
                                    <td>&#8369;<?= number_format($annual->income, 2) ?></td>
                                </tr>
                                <?php endforeach; ?>
                                <thead>
                                <th><b>Total</b></th>
                                <th></th>
                                <th><b>&#8369;<?= number_format($annualtotal, 2)?></b></th>
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


