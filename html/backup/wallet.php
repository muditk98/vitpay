<?php include 'session.php'; ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>vitPay</title>
 	<link rel="stylesheet" href="homepage.css">
 </head>
 <body>
 	<div id="background"></div>
	<?php include 'topbar.php'; ?>
	<h1>
		<?php 
			$conn = Connect();
			$uname = $_SESSION['uname'];
			$sql = "SELECT Balance FROM User WHERE RegId = '$uname'";
			$result = $conn->query($sql);
			echo "Balance: " . $result->fetch_assoc()['Balance'];
		 ?>
	</h1>
 </body>
 </html>