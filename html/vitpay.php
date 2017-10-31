<?php 
	session_start();
	if (!isset($_SESSION['uname'])) {
		include 'loginpage.php';
	}
	else
	{
		include 'home.php';
	}
 ?>