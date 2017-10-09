<?php 
session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$database = "vitpay";

$uname = $_POST['uname'];
$passwd = $_POST['passwd'];

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT Password FROM UserLogin WHERE UserId = '$uname'";
$result = $conn->query($sql);
if ($result->num_rows == 1)
{
    // output data of each row
	$row = $result->fetch_assoc();
	if ($row['Password'] == $passwd)
	{
		$_SESSION['uname'] = $uname;
	}
	else
	{
		$_SESSION['error'] = "Invalid Password";
	}
} 
else
{
	$_SESSION['error'] = "Invalid Username";
}
$conn->close();
header('Location: vitpay.php');
?>
