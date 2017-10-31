<?php include 'session.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>VITpay | Events</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/styledue.css">
</head>
<body>
	<?php include 'topbar.php'; ?>
	<section class="background" id="event">
		<div class="container">
			<form action="makepayment.php" method="post">
				<table class="cleantable">
					<?php 
					$conn = Connect();
					$uname = $_SESSION['uname'];
					$sql = "SELECT * FROM Purpose p, Fees f WHERE p.Category = 'EVENT' AND p.Id = f.Id";
					$result = $conn->query($sql);
					if($result->num_rows > 0)
					{
						echo "<tr>";
						echo "<th>Event Name</th>";
						echo "<th>Amount</th>";
						echo "</tr>";
						while($row = $result->fetch_assoc())
						{
							echo "<tr>";
							echo "<td>".$row['Name']."</td>";
							echo "<td>".$row['Amount']."</td>";
							echo "<td><input type='radio' name='eventid' value='".$row['Id']."'/></td>";
							echo "</tr>";
						}
						echo "<tr><td colspan='7'><input type='submit' name='payduebtn' id='payduebtn' value='Pay'/></td></tr>";
					}
					else
					{
						echo "<tr><th>There are no events currently available</th></tr>";
					}
					$conn->close();
					?>
				</table>
			</form>
		</div>
	</section>
</body>
</html>