<?php include 'session.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>VITpay | Passbook</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/styledue.css">
</head>
<body>
	<?php include 'topbar.php'; ?>
	<section class="background" id="passbook">
		<div class="container flexcont">
			<article class="transcont">
				<table class="cleantable">
					<?php 
						$conn = Connect();
						$uname = $_SESSION['uname'];
						$sql = "SELECT * FROM Transaction t, Purpose p WHERE (Payer='$uname' OR Receiver='$uname') AND t.PurposeId = p.Id ORDER BY TransactionTime desc";
						$result = $conn->query($sql);
						if($result->num_rows > 0)
						{
							echo "<tr>";
							echo "<th>Payer</th>";
							echo "<th>Receiver</th>";
							echo "<th>Amount</th>";
							echo "<th>Transaction time</th>";
							echo "<th>Purpose Name</th>";
							echo "<th>Purpose Category</th>";
							echo "</tr>";
							while($row = $result->fetch_assoc())
							{
								echo "<tr>";
								echo "<td>".$row['Payer']."</td>";
								echo "<td>".$row['Receiver']."</td>";
								echo "<td>".$row['Amount']."</td>";
								echo "<td>".$row['TransactionTime']."</td>";
								echo "<td>".$row['Name']."</td>";
								echo "<td>".$row['Category']."</td>";
								echo "</tr>";
							}
						}
						else
						{
							echo "<tr><th>You have not made any transactions</th></tr>";
						}
						$conn->close();
					 ?>
				 </table>
			</article>
			<aside class="wallet">
				<h1>Wallet</h1>
				<p>
					<span class="whitecolor">&#8377;</span>
				<?php
					$conn = Connect();
					$uname = $_SESSION['uname'];
					$sql = "SELECT Balance FROM User WHERE Id='$uname'";
					$result = $conn->query($sql);
					echo $result->fetch_assoc()['Balance'];
				 ?>
				</p>
			</aside>
		</div>
	</section>
</body>
</html>