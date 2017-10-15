<?php 
	session_start();
	if ($_SERVER["REQUEST_METHOD"])
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login Page</title>
	<link rel="stylesheet" href="homepage.css">
<body>
	<div id="background" style="opacity: 1"></div>
	<h1>vitPay</h1>
	<div class="container" style="margin-top: 0">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			<p id="signin">Sign in</p>
			<div id="inpcont">
				<input type="text" placeholder="Enter Username" name="uname" required autofocus/><br>
				<input type="password" placeholder="Enter Password" name="passwd" required /><br>
				<p id="error"><?php echo $_SESSION['error']; $_SESSION['error'] = '';?><br></p><br>
				<input type="Submit" value="LOGIN"/><br>
			</div>
		</form>
	</div>
</body>
</html>
