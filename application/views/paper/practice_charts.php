<!DOCTYPE html>
<html>
<head>
    <title>Practice: ChartJS - BarGraph</title>
    <!-- Bootstrap core CSS -->
    <link href="<?= $this->config->base_url()?>assets/paper/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Animation library for notifications -->
    <link href="<?= $this->config->base_url()?>assets/paper/css/animate.min.css" rel="stylesheet"/>
    <!-- Paper Dashboard core CSS -->
    <link href="<?= $this->config->base_url()?>assets/paper/css/paper-dashboard.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <style type="text/css">
        #chart-container {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
<div id="chart-container">
    <canvas id="inventoryBar"></canvas>
</div>

<!-- This is the bar chart script -->
<script type="text/javascript" src="<?= base_url() ?>assets/js/inventory_bar.js"></script>
</body>
</html>