<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login Page</title>
	<link rel="stylesheet" href="homepage.css">
<body>
	<div id="background" style="opacity: 1"></div>
	<h1>vitPay</h1>
	<form action="/login_script.php" method="post">
		<div class="container" style="margin-top: 0">
			<p id="signin">Sign in</p>
			<div id="inpcont">
				<input type="text" placeholder="Enter Username" name="uname" required autofocus/><br>
				<input type="password" placeholder="Enter Password" name="passwd" required /><br>
				<p id="error"><?php echo $_SESSION['error']; $_SESSION['error'] = '';?></p><br>
				<input type="Submit" value="LOGIN"/><br>
			</div>
		</div>
	</form>
</body>
</html>
