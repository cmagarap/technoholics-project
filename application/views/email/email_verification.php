<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body style="background-color: #fff;margin: 40px;font: 13px/20px normal Helvetica, Arial, sans-serif;color: #4F5155;">

	<div id="container">

		<div id="body"><center>
			<p><img src="https://image.ibb.co/hoZ6DH/logo.png" alt="" style="display: block; width:auto; max-width: 100%;height: 100%;"/></p>
			<p style="color:#31bbe0;font-family: Arial Narrow; font-size: 30px; margin:8px;"><b>Welcome to <span style="color:#dc2f54;">Technoholics</span></b></p></center></div>
			<br>
			<p style="font-family: Arial Narrow; margin:8px; font-size: 22px"><b>Hi, <?=$firstname." ".$lastname?>!</b></p>
			<p style="font-family: Arial Narrow; margin:8px; font-size: 19px">You have successfully created an account at Technoholics.</p>
			<p style="font-family: Arial Narrow; margin:8px; font-size: 17px">Please click on the button below to verify your email address and complete your registration.</p>
			<br>
			<center>
				<a href="<?= base_url()?>confirm/update/<?=$verification_code?>" ><button type="button" class="btn" style="background-color:#31bbe0; color:white; padding: 5px 10px;font-size: 16px; line-height: 1.3333333; border-radius: 6px;" size="50px"><b>Verify your email</b></button>
				</a>
				<br>
				<p style="font-family: Arial Narrow; margin:8px; color:#bbb; font-size: 14px;">Didn't create a Technoholics Account? It's likely someone just typed in your email address by accident. Feel free to ignore this message. </p>
			</center>
		</div>

	</body>
	</html>