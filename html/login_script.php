<!DOCTYPE html>
<head>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$database = "vitpay";

$uname = $_POST['uname'];
$passwd = $_POST['passwd'];

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT Password FROM UserLogin WHERE UserId = '" . $uname . "'";
$result = $conn->query($sql);
if ($result->num_rows == 1)
{
    // output data of each row
	$row = $result->fetch_assoc();
	if ($row['Password'] == $passwd)
	{
		echo "Hello " . $uname . " Logged in<br/>";
	}
	else
	{
		echo "Incorrect Password Bitch<br/>";
	}
} 
else
{
	echo "Username not found<br/>";
}


$conn->close();
?>
</body>
</html>
