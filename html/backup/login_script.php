<?php 
session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$database = "vitpay";


$conn = new mysqli($servername, $username, $password, $database);

$uname = $conn->real_escape_string($_POST['uname']);
$passwd = $conn->real_escape_string($_POST['passwd']);

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
	}

} 
if (!isset($_SESSION['uname']))
{
	$error = "Invalid Username or Password";
}
$conn->close();
header('Location: vitpay.php');
?>
