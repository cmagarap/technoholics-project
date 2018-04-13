<?php if($this->session->flashdata('statusMsg')):?>
    <script>
        $(document).ready(function(){
            $.notify({
                icon: 'ti-direction',
                message: "<?= $this->session->flashdata('statusMsg') ?>"
            },{
                type: 'info',
                timer: 2000
            });
        });
    </script>
<?php endif; ?><div class="content">
    <div class="container-fluid">
        <div class="card" style = "padding: 30px">
            <div class="row">
                <div class="col-md-12">
                    <div class="header">
                        <div align = "left">
                            <h2 class="title"><b>Sales Forecasting</b></h2>
                            <form role="form" method="post" action="<?=base_url()?>/forecasting/forecast_exec">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Year:</label>
                                        <select name="year" id="year" class="form-control border-input file">
                                            <option value="">Select Year</option>
                                            <?php foreach ($years as $y): ?>
                                                <option value="<?= $y->sales_year ?>"><?= $y->sales_year ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?php if(validation_errors()):
                                        echo "<span style = 'color: red'>" . form_error("year") . "</span>";
                                    elseif ($this->session->flashdata('error')): 
                                        echo "<span style = 'color: red'>" . $this->session->flashdata('error') . "</span>";
                                        endif; ?>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Month:</label>
                                        <select name="month" id="month" class="form-control border-input file">
                                            <option value="">Select Month</option>
                                            <option value='01'>January</option>
                                            <option value='02'>February</option>
                                            <option value='03'>March</option>
                                            <option value='04'>April</option>
                                            <option value='05'>May</option>
                                            <option value='06'>June</option>
                                            <option value='07'>July</option>
                                            <option value='08'>August</option>
                                            <option value='09'>September</option>
                                            <option value='10'>October</option>
                                            <option value='11'>November</option>
                                            <option value='12'>December</option>
                                        </select>
                                        <?php if(validation_errors()):
                                        echo "<span style = 'color: red'>" . form_error("month") . "</span>";
                                        endif; ?>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label style="color: white;">`</label>
                                        <br>
                                        <button type="submit" class="btn btn-info btn-fill" style="background-color: #31bbe0; border-color: #31bbe0; color: white; width: 100px" name="Forecast" title="Forecast">Forecast</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <br>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="content">
                        <div id="chart-container">
                            <canvas id="forecast"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <h3 class="title">Forecasted Reports for the year <b>2018</b></h3>
                    <table class="table table-striped">
                        <thead>
                            <th><b>Month</b></th>
                            <th><b>Forecasted Income</b></th>
                        </thead>
                        <tbody>
                            <?php foreach ($forecast as $forecast): ?>
                                <tr>
                                    <td><?=date("F",$forecast->date_forecasted)?></td>
                                    <td>&#8369;<?= number_format($forecast->forecasted_income, 2) ?></td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?= base_url() ?>assets/paper/js/forecast.js"></script>