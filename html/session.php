<?php 
	session_start();
	if (!isset($_SESSION['uname'])) {
		header('Location: vitpay.php');
	}
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
 ?>