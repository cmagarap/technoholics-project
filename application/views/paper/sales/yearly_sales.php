<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="card">
                    <div class="header">
                        <div class="col-md-4">
                            <h3 class="title"><span class="ti-money" style = "color: #dc2f54;"></span> <b>Annual Sales</b></h3>
                            <p class="category"><?= $sub ?></p>
                        </div>
                        <?php $year = (isset($_POST['enter'])) ? $this->input->post('year') : ''; ?>
                        <div class="col-md-3"></div>
                        <form role="form" method="POST">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Filter by Years:</label>
                                    <select name="year" class="form-control border-input file">
                                        <option value="0">Select Years</option>
                                        <option value="5" <?php if($this->input->post('year') == 5) echo "selected"; ?>>For the last five years.</option>
                                        <option value="10" <?php if($this->input->post('year') == 10) echo "selected"; ?>>For the last ten years.</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label style="color: white;">`</label><br>
                                    <button type="submit" class="btn btn-info btn-fill" style="background-color: #31bbe0; border-color: #31bbe0; color: white;" name="enter"><i class="ti-filter"></i></button>
                                    <a href = "<?= base_url() ?>reports/sales_reports" class="btn btn-info btn-fill" style = "background-color: #dc2f54; border-color: #dc2f54; color: white;" title="Go Back"><i class="ti-arrow-left"></i></a>
                                </div>
                            </div>
                        </form>
                    </div>
                        <?php
                        if (!$annual) {
                            echo $no_fetched;
                        } else {
                        ?>
                    <br><br><br><br>
                    <hr style="margin-bottom: -20px">
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                            <td><b><p>Date</b></td>
                            <td align="right"><b><p>Items sold</p></b></td>
                            <td align="right"><b><p>Income</p></b></td>
                            <th></th>
                            </thead></p>
                            <tbody>
                            <?php $total_items = 0;
                            foreach ($annual as $annual): ?>
                                <tr>
                                    <td><?= $annual->sales_y ?></td>
                                    <td align="right"><?= $annual->items_sold ?></td>
                                    <?php $total_items += $annual->items_sold; ?>
                                    <td align="right">&#8369;<?= number_format($annual->income, 2) ?></td>
                                    <td></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td><h3>Total</h3></td>
                                <td align="right"><b><?= $total_items ?></b></td>
                                <td align="right"><h3>&#8369;<?= number_format($annualtotal, 2) ?></h3></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
