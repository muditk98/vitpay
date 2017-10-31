<?php 
include 'session.php';

if ($_SERVER["REQUEST_METHOD"] != "POST")
{
	header('Location: vitpay.php');
}

$conn = Connect();
$uname = $_SESSION['uname'];
$sql = "SELECT hash FROM UserLogin WHERE Id = '$uname'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$oldpass = $conn->real_escape_string($_POST['oldpass']);
$newpass = $conn->real_escape_string($_POST['newpass']);

if( $oldpass == $newpass )
{
	$_SESSION['msg'] = '<span class="highlight">New and old passwords are same</span>';
}
elseif (strlen($newpass) < 8)
{
	$_SESSION['msg'] = '<span class="highlight">Minimum password length is 8</span>';
}
elseif ( password_verify($oldpass, $row['hash']) )
{
	$newpasshash = password_hash($newpass, PASSWORD_DEFAULT);
	$conn->query("UPDATE UserLogin SET hash = '$newpasshash' WHERE Id = '$uname'");
	$_SESSION['msg'] = '<span class="highlightgreen">Password Updated Sucessfully</span>';
}
else
{
	$_SESSION['msg'] = '<span class="highlight">Wrong Password</span>';
}
$conn->close();
header('Location: profile.php');
?>