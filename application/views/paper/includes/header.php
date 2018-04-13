<?php $content = $this->item_model->fetch("content",  array("content_id" => 1));
$image = $content[0]; ?>
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
    <link rel="icon" type="image/png" sizes="96x96" href="<?= base_url() ?>assets/ordering/img/<?= $image->logo_icon ?>">
    <!-- Bootstrap core CSS -->
    <link href="<?= base_url()?>assets/paper/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Animation library for notifications -->
    <link href="<?= base_url()?>assets/paper/css/animate.min.css" rel="stylesheet"/>
    <!-- Paper Dashboard core CSS -->
    <link href="<?= base_url()?>assets/paper/css/paper-dashboard.css" rel="stylesheet"/>
    <!-- Fonts and icons -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="<?= base_url()?>assets/paper/css/themify-icons.css" rel="stylesheet">
    <link type="text/css" href="<?= base_url()?>assets/paper/css/semantic.ui.min.css" rel="stylesheet" >
    <link type="text/css" href="<?= base_url()?>assets/paper/css/prism.css" rel="stylesheet"/>
    <link type="text/css" href="<?= base_url()?>assets/paper/css/calendar-style.css" rel="stylesheet"/>
    <link type="text/css" href="<?= base_url()?>assets/paper/dist/pignose.calendar.min.css" rel="stylesheet" />
    <link type="text/css" href="<?= base_url()?>assets/ordering/css/starability-all.min.css" rel="stylesheet" />

    <link href="<?= $this->config->base_url()?>assets/paper/css/jquery.simplecolorpicker-fontawesome.css" rel="stylesheet">
    <link href="<?= $this->config->base_url()?>assets/paper/css/jquery.simplecolorpicker-glyphicons.css" rel="stylesheet">     
    <link href="<?= $this->config->base_url()?>assets/paper/css/jquery.simplecolorpicker-regularfont.css" rel="stylesheet">
    <link href="<?= $this->config->base_url()?>assets/paper/css/jquery.simplecolorpicker.css" rel="stylesheet">

    <script src="<?= base_url().'assets/ordering/js/nprogress.js'; ?>"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script src="<?= base_url()?>assets/paper/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="<?= base_url()?>assets/paper/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- <script src="<?= base_url()?>assets/paper/js/jquery.latest.min.js" type="text/javascript"></script> -->
    <script src="<?= base_url()?>assets/paper/js/semantic.ui.min.js" type="text/javascript"></script>
    <script src="<?= base_url()?>assets/paper/js/prism.min.js" type="text/javascript"></script>
    <script src="<?= base_url()?>assets/paper/dist/pignose.calendar.full.min.js" type="text/javascript"></script>
    <!--  Notifications Plugin    -->
    <script src="<?= base_url()?>assets/paper/js/bootstrap-notify.js"></script>
    <!--  Charts Plugin -->
    <script src="<?= base_url()?>assets/paper/js/chartist.min.js"></script>
    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="<?= base_url()?>assets/paper/js/bootstrap-checkbox-radio.js"></script>
    <script src="<?= base_url()?>assets/paper/js/jspdf.plugin.autotable.js"></script>
    <script src="<?= base_url()?>assets/paper/js/jspdf.min.js"></script>
    
    <!--  Google Maps Plugin    -->
    <!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>-->
    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
    <script src="<?= base_url()?>assets/paper/js/paper-dashboard.js"></script>
    <script type="text/javascript"> var base_url = "<?= base_url() ?>";</script>
    
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

    .box {
        background: #fff;
        margin: 0 0 30px;
        border: solid 1px #e6e6e6;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        padding: 20px;
        -webkit-box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
        box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
    }

    @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,600,700);
    .star-ratings-css {
        unicode-bidi: bidi-override;
        color: #c5c5c5;
        font-size: 25px;
        height: 25px;
        width: 100px;
        margin: 0 auto;
        position: relative;
        padding: 0;
        text-shadow: 0px 1px 0 #a2a2a2;
    }
    .star-ratings-css-top {
        color: #f5bd23;
        padding: 0;
        position: absolute;
        z-index: 1;
        display: block;
        top: 0;
        left: 0;
        overflow: hidden;
    }
    .star-ratings-css-bottom {
        padding: 0;
        display: block;
        z-index: 0;
    }

    .product_image {
        width:auto;
        height: 250px;
        max-width: 100%;
        object-fit: contain;
    }

    .ellipsis {
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }
        .btn-gray {
            color: #555555;
            border-color: #555555;

        }

</style>
</head>
<body>
