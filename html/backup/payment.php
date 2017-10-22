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
		$amount = $_POST['amount'];
		$retailer = $_POST['retailer'];
		$sql = "SELECT * FROM User WHERE RegId = '$uname'";
		$result = $conn->query($sql);
		if ($result->num_rows == 1)
		{
			$row = $result->fetch_assoc();
			if($row['Balance'] >= $amount)
			{
				$newuserbal = $row['Balance'] - $amount;
				$sql = "SELECT * FROM Merchant WHERE LOWER(Name) = '$retailer'";
				$mresult = $conn->query($sql);
				if ($mresult->num_rows == 1)
				{
					$mrow = $mresult->fetch_assoc();
					$newmerchbal = $mrow['Balance'] + $amount;
					$merchid = $mrow['Id'];
					$sql = "UPDATE User SET Balance = $newuserbal";
					$conn->query($sql);
					$sql = "UPDATE Merchant SET Balance = $newmerchbal WHERE Id = $merchid";
					$conn->query($sql);
					$sql = "INSERT INTO Transaction(Payer,Receiver,Amount) VALUES('$uname', $merchid, $amount)";
					$conn->query($sql); 
					echo "Payment Successful";
				}
			}	
		}
		else
		{
			echo "Payment unsuccessful";
		}
		$conn->close();
	 ?>
	</h1>

</body>
</html>