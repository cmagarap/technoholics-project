<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Technoholics</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 0px solid #D0D0D0;
	}

	#container2 {
		margin: 10px;
		border: 1px solid #D0D0D0;
		padding: 12px 10px 12px 10px;
	}
	p {
		font-family: Arial Narrow;
		font-size: 35px;
	}

	.button {
		font-family: Arial Narrow;
		font-size: 35px;
		padding: 12px 80px;
	}
</style>
</head>
<body>

	<div id="container">
		<div id="body"><center>
			<h1>Hi! <?=$firstname." ".$lastname?></h1>
			<p style="color: #016FFF"><b>Before we <span style="color: #FF00A1">get started...</span></b></p>
			<br>
			<p style="font-size: 23px">You choosed <strong><?=$email?></strong> to be your email. 
			Please activate your account by clicking the button below: </p>
			<br>
			<a href="<?= base_url()?>confirm/update/<?=$verification_code?>"  class="btn btn-danger btn-lg" size="50px" ><b>Confirm your email</b></a>
			<br><br><br>
			<div id="container2">
				<p><img src="<?= base_url()?>images/logo2.png" alt="" style="width: auto; height: 80px;"/></p>
				<b>Grass Residences, Unit 1717-B Tower 1 SMDC The, Nueva Viscaya, <br>
					Bago Bantay, Quezon City, Metro Manila
					<br>
				</div>
			</div>
		</div>
