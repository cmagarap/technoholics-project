<br><br><br><br><br>
<div class="content">
    <div class="container-fluid">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card" style="padding: 50px;">
                <p align="center" style="font-size: 30px"><b>Sales Reports</b></p>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <a href="<?= base_url() ?>reports/daily_sales" class="btn btn-info" style="width: 100%;">
                            <h1><?= date('F') ?>
                                <?= date('d') ?></h1>
                            <p>Daily Sales</p>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="<?= base_url() ?>reports/weekly_sales" class="btn btn-warning" style="width: 100%;">
                            <h1>Week <?= date('W') ?></h1>
                            <p>Weekly Sales</p>
                        </a>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-6">
                        <a href="<?= base_url() ?>reports/monthly_sales" class="btn btn-gray" style="width: 100%;">
                            <h1><?= strtoupper(date('F')) ?></h1>
                            <p>Monthly Sales</p>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="<?= base_url() ?>reports/annual_sales" class="btn btn-danger" style="width: 100%;">
                            <h1><?= date('Y') ?></h1>
                            <p>Annual Sales</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
