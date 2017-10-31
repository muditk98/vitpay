<?php 
	session_start();
	if (isset($_SESSION['uname']))
	{
		header('Location: vitpay.php');
	}
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$database = "vitpay";


		$conn = new mysqli($servername, $username, $password, $database);

		$uname = $conn->real_escape_string($_POST['uname']);
		$passwd = $conn->real_escape_string($_POST['passwd']);
		$uname = strtoupper($uname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		$sql = "SELECT hash FROM UserLogin WHERE Id = '$uname'";
		$result = $conn->query($sql);
		if ($result->num_rows == 1)
		{
	    // output data of each row
			$row = $result->fetch_assoc();
			if ( password_verify($passwd, $row['hash']) )
			{
				$_SESSION['uname'] = $uname;
				header('Location: vitpay.php');		
			}

		}
		if (!isset($_SESSION['uname']))
		{
			$_SESSION['error'] = "Invalid Username or Password";
		}
		$conn->close();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>VITpay | Login</title>
	<link rel="stylesheet" href="./css/login.css">
<body>
	<h1>
		VIT<em><span class="highlight">pay</span></em>
	</h1>
	<div class="container">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			<p id="signin">Sign in</p>
			<div id="inpcont">
				<input type="text" placeholder="Enter Username" name="uname" required autofocus/><br>
				<input type="password" placeholder="Enter Password" name="passwd" required /><br>
				<p id="error"><?php echo $_SESSION['error']; $_SESSION['error'] = '';?></p>
				<input type="Submit" value="LOGIN"/>
				<!-- <a id="signup" href="signup.php">Sign up</a> -->
			</div>
		</form>
	</div>
</body>
</html>
