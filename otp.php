<?php 
session_start();

if (!isset($_SESSION['otp'])) {
    header('location:portal.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/otp.css">
</head>
<body>
	<form action="server.php" method="post" class="container">
		<h1>ENTER OTP</h1>
		<div class="userInput">
			<input type="text" name="a" maxlength="1">
			<input type="text" name="b" maxlength="1">
			<input type="text" name="c" maxlength="1">
			<input type="text" name="d" maxlength="1">
			<input type="text" name="e" maxlength="1">
		</div>
		<button name="otp">CONFIRM</button>
	</form>
	
</body>
</html>