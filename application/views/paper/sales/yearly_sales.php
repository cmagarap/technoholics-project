<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="card">
                    <div class="header">
                        <div align = "left">
                            <h3 class="title"><span class="ti-money" style = "color: #dc2f54;"></span> <b>Annual Sales</b></h3>
                            <p class="category"><?= $sub ?></p>
                        </div>
                    </div>
                    <?php
                    if(isset($_POST['enter'])) {
                        $year = $this->input->post('year');
                    } else {
                        $year = '';
                    }
                    ?>
                    <div class="content">
                        <form role="form" method="POST">
                            <div class="form-group">
                                <div class="col-md-3"></div>
                                <div class="col-md-3">
                                    <label>Filter by Years:</label>
                                    <select name="year" class="form-control border-input file">
                                        <option value="0">Select Years</option>
                                        <option value="5" <?php if($this->input->post('year') == 5) echo "selected"; ?>>For the last five years.</option>
                                        <option value="10" <?php if($this->input->post('year') == 10) echo "selected"; ?>>For the last ten years.</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label style="color: white;">`</label><br>
                                    <button type="submit" class="btn btn-info btn-fill btn-wd" style="background-color: #31bbe0; border-color: #31bbe0; color: white;" name="enter">Enter</button>
                                    <a href = "<?= base_url() ?>reports/sales_reports" class="btn btn-info btn-fill btn-wd" style = "background-color: #dc2f54; border-color: #dc2f54; color: white;">Go back</a>
                                </div>
                            </div>
                        </form>
                        <?php
                        if (!$annual) {
                            #echo "<center><h3><br><br><br><hr><br>There are no annual sales report recorded.</h3><br></center><br><br></div>";
                            echo $no_fetched;
                        } else {
                        ?>
                    </div>
                    <br><br><br>
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
                                    <td align="right"><?= $annual->order_quantity ?></td>
                                    <?php $total_items += $annual->order_quantity; ?>
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
