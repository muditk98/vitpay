<?php 
	session_start();
	if (!isset($_SESSION['uname'])) {
		include 'loginpage.php';
	}
	else
	{
		echo $_SESSION['uname'];
		include 'home.php';
	}
 ?>