<?php include 'session.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>VITpay | Dues</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/styledue.css">
</head>
<body>
	<?php include 'topbar.php'; ?>
	<section class="background" id="due">
		<div class="container">
			<table class="cleantable">
				<?php 
					$conn = Connect();
					$uname = $_SESSION['uname'];
					$sql = "SELECT d.Id, p.Name, p.Category, d.Amount, d.StartDate, d.DueDate FROM Purpose p, Due d WHERE d.PurposeId = p.Id AND d.Debtor = '$uname' ORDER BY d.DueDate";
					$result = $conn->query($sql);
					if($result->num_rows > 0)
					{
						echo "<tr>";
						echo "<th>ID</th>";
						echo "<th>Purpose Name</th>";
						echo "<th>Purpose Category</th>";
						echo "<th>Amount</th>";
						echo "<th>Start Date</th>";
						echo "<th>Due Date</th>";
						echo "</tr>";
						while($row = $result->fetch_assoc())
						{
							echo "<tr>";
							echo "<td>".$row['Id']."</td>";
							echo "<td>".$row['Name']."</td>";
							echo "<td>".$row['Category']."</td>";
							echo "<td>".$row['Amount']."</td>";
							echo "<td>".$row['StartDate']."</td>";
							echo "<td>".$row['DueDate']."</td>";
							echo "</tr>";
						}
					}
					else
					{
						echo "<tr><th>You have no dues</th></tr>";
					}
					$conn->close();
				?>
			 </table>
		</div>
	</section>
</body>
</html>