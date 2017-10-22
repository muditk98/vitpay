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
	<h1>Your Transactions</h1>
	<table class="trans">
		<?php 
			$conn = Connect();
			$uname = $_SESSION['uname'];
			$sql = "SELECT Merchant.Name as MerchantName, Transaction.Amount, Transaction.TransactionTime, Purpose.Name, Purpose.Category FROM Merchant, Transaction, Purpose WHERE Merchant.Id = Transaction.Receiver AND Purpose.Id = Transaction.PurposeId AND Transaction.Payer = '$uname'";
			$result = $conn->query($sql);
			if($result->num_rows > 0)
			{
				echo "<tr>";
				echo "<th>".'Merchant Name'."</th>";
				echo "<th>".'Amount'."</th>";
				echo "<th>".'Transaction Time'."</th>";
				echo "<th>".'Purpose Name'."</th>";
				echo "<th>".'Purpose Category'."</th>";
				echo "</tr>";
				echo "<tr><td colspan=5><hr></td></tr>";
				while($row = $result->fetch_assoc())
				{
					echo "<tr>";
					echo "<td>".$row['MerchantName']."</td>";
					echo "<td>".$row['Amount']."</td>";
					echo "<td>".$row['TransactionTime']."</td>";
					echo "<td>".$row['Name']."</td>";
					echo "<td>".$row['Category']."</td>";
					echo "</tr>";
				}
			}
			else
			{
				echo "<tr><td>You have no previous transactions</td></tr>";
			}
			$conn->close();
		 ?>
	</table>
</body>
</html>