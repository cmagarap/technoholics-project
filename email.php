<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Registration</title>
 
</head>
<body>

<form id = "pay" name="contactform" method="post" action="" enctype="multipart/form-data">
<?php
$pota = "Hello";
?>
				<label for = "fname"> Firstname: </label>			
			  <input  type="text" name="fname" required> </br>

			  <label for = "lname" > Lastname: </label>
				<input  type="text" name="lname" required> </br>

				<label for = "pwd1" > Password: </label>
				<input title="Password must contain at least 6 characters, including UPPER/lowercase and numbers" type="password" required name="pwd1" onchange="
				this.setCustomValidity(this.validity.patternMismatch ? this.title : '');
				if(this.checkValidity()) form.pwd2.pattern = this.value;
				"> </br>

				<label for = "pwd2" > Confirm Password: </label>
				<input title="Please enter the same Password as above" type="password" required name="pwd2" onchange="
				this.setCustomValidity(this.validity.patternMismatch ? this.title : '');
				if(this.checkValidity())  = this.value;"> </br>

				<label for = "email" > Email Address: </label>
				<input  type="text" name="cemail" pattern="[A-Za-z0-9._%+-]{3,}@[a-zA-Z]{3,}([.]{1}[a-zA-Z]{2,}|[.]{1}[a-zA-Z]{2,}[.]{1}[a-zA-Z]{2,})" required> </br>
	
				<input type="hidden" name="email" value= "vvcalimlim@fit.edu.ph">
		
		  	<input type="submit" name="btn_submit" value="Submit">   
		
</form>

		  <?php
			include('sendmail.php');
			?>
			
</body>
</html>
