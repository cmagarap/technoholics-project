<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body style="background-color: #fff;margin: 40px;font: 13px/20px normal Helvetica, Arial, sans-serif;color: #4F5155;">

	<div id="container">

		<div id="body"><center>
			<p><img src="images/logo2.png" alt="" style="display: block; width:auto; max-width: 100%;height: 100%;"/></p>
			<p style="color:#31bbe0;font-family: Arial Narrow; font-size: 30px; margin:8px;"><b>Forgotten your <span style="color:#dc2f54;">password?</span></b></p></center></div>
			<br>
			<p style="font-family: Arial Narrow; margin:8px; font-size: 22px"><b>Hi, <?=$firstname." ".$lastname?>!</b></p>
			<p style="font-family: Arial Narrow; margin:8px; font-size: 19px">There was a request to change your password.</p>
			<p style="font-family: Arial Narrow; margin:8px; font-size: 17px">If you didn't make this request, just ignore this email. Otherwise, please click the button below to change your password:</p>
			<br>
			<center>
				<a href="<?= base_url()?>login/change_password/<?=$verification_code?>">
					<button type="button" class="btn" style="background-color:#31bbe0; color:white; padding: 5px 10px;font-size: 16px; line-height: 1.3333333; border-radius: 6px;" size="50px"><b>Reset your password</b>
					</button>
				</a>
				<br>
				<p style="font-family: Arial Narrow; margin:8px; color:#bbb; font-size: 14px;">Didn't request for a password reset for your account? It's likely someone just typed in your email address by accident. Feel free to ignore this message. </p>
			</center>
		</div>

	</body>
	</html>