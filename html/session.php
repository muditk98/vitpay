<?php 
	session_start();
	function Connect()
	{
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$database = "vitpay";
		$conn =  new mysqli($servername, $username, $password, $database);
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 
		return $conn;
	}
	if (!isset($_SESSION['uname'])) {
		header('Location: vitpay.php');
	}
	if ( !isset($_SESSION['UserFullName']) ) {
		$conn = Connect();
		$uname = $_SESSION['uname'];
		$sql = "SELECT * FROM User WHERE Id = '$uname'";
		$result = $conn->query($sql);
		if ($result->num_rows == 1)
		{
			$row = $result->fetch_assoc();
			// echo $row['FirstName'] . " " . $row['LastName'];
			$_SESSION['UserFullName'] = $row['FirstName'] . " " . $row['LastName'];
		}
		$conn->close();
	}

 ?>
