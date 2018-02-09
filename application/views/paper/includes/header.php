<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0'  />
    <meta name="viewport" content="width=device-width" />
    <meta name="keywords" content="Technoholics, Technoholics Store, Online Philippine Store">
    <meta name="description" content="Technoholics Online Store">
    
    <meta name="author" content="Ethereal">
    <title><?= $title ?></title>
    <link href="<?= $this->config->base_url().'assets/ordering/css/nprogress.css'; ?>" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= $this->config->base_url()?>images/icon2.png">
    <!-- Bootstrap core CSS -->
    <link href="<?= $this->config->base_url()?>assets/paper/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Animation library for notifications -->
    <link href="<?= $this->config->base_url()?>assets/paper/css/animate.min.css" rel="stylesheet"/>
    <!-- Paper Dashboard core CSS -->
    <link href="<?= $this->config->base_url()?>assets/paper/css/paper-dashboard.css" rel="stylesheet"/>
    <!-- Fonts and icons -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="<?= $this->config->base_url()?>assets/paper/css/themify-icons.css" rel="stylesheet">
    <link type="text/css" href="<?= $this->config->base_url()?>assets/paper/css/semantic.ui.min.css" rel="stylesheet" >
	<link type="text/css" href="<?= $this->config->base_url()?>assets/paper/css/prism.css" rel="stylesheet"/>
	<link type="text/css" href="<?= $this->config->base_url()?>assets/paper/css/calendar-style.css" rel="stylesheet"/>
    <link type="text/css" href="<?= $this->config->base_url()?>assets/paper/dist/pignose.calendar.min.css" rel="stylesheet" />

    <script src="<?= base_url().'assets/ordering/js/nprogress.js'; ?>"></script>
    
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script src="<?= $this->config->base_url()?>assets/paper/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="<?= $this->config->base_url()?>assets/paper/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- <script src="<?= $this->config->base_url()?>assets/paper/js/jquery.latest.min.js" type="text/javascript"></script> -->
    <script src="<?= $this->config->base_url()?>assets/paper/js/semantic.ui.min.js" type="text/javascript"></script>
    <script src="<?= $this->config->base_url()?>assets/paper/js/prism.min.js" type="text/javascript"></script>
    <script src="<?= $this->config->base_url()?>assets/paper/dist/pignose.calendar.full.min.js" type="text/javascript"></script>
    <!--  Notifications Plugin    -->
    <script src="<?= $this->config->base_url()?>assets/paper/js/bootstrap-notify.js"></script>
    <!--  Charts Plugin -->
    <script src="<?= $this->config->base_url()?>assets/paper/js/chartist.min.js"></script>
    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="<?= $this->config->base_url()?>assets/paper/js/bootstrap-checkbox-radio.js"></script>
    <!--  Google Maps Plugin    -->
    <!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>-->
    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
    <script src="<?= $this->config->base_url()?>assets/paper/js/paper-dashboard.js"></script>
    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="<?= $this->config->base_url()?>assets/paper/js/demo.js"></script>

    <style>

        input[type=text]:focus, input[type=number]:focus, input[type=password]:focus {
            background-color: lightblue;
        }
        .file:hover {
            background-color: lightblue;
        }

        input[type=text].search {
            width: 245px;
            height: 40px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 20px 0px 0px 20px;
            font-size: 14px;
            background-color: white;
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 7px 7px 7px 20px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
        }
        input[type=text]:focus.search {
            /*width: 50%;*/
            background-color: lightblue;
        }

        .searchbtn:hover {
            background-color: #31bbe0;
            color: white;
        }

        /*button {
            width: 50px;
            box-sizing: border-box;
            border: 2px solid #31bbe0;
            border-radius: 20px;
            font-size: 14px;
            background-color: white;
            padding: 7px;
        }*/

        .navtxt:hover {
            color: #31bbe0;
        }

        .navtxt {
            color: #38D5FF;
        }

        /* AYAW GUMANA*/
        .recover:hover {
            background-color: #7ace4c;
            border-color: #7ace4c;
            color: white;
        }

        div.box-shadow {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            text-align: center;
        }

        .image-shadow {
            box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.2), 0 6px 10px 0 rgba(0, 0, 0, 0.19);
        }

        .demo-picked {
            font-size: 1.2rem;
            text-align: center;
        }


    </style>
</head>
<body>

