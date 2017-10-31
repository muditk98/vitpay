<?php include 'session.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>VITpay | Payment Status</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/styledue.css">
</head>
<body>
	<?php include 'topbar.php'; ?>
	<section class="background" id="userprofile">
			<div class="container flexcont">
				<table class="cleantable">
					<?php 
					$conn = Connect();
					$uname = $_SESSION['uname'];
					$sql = "SELECT * FROM User WHERE Id = '$uname'";
					$result = $conn->query($sql);
					if($result->num_rows > 0)
					{
						$row = $result->fetch_assoc()
						foreach ($row as $key => $value)
						{
							echo "<tr>";
							echo "<th>$key</th>";
							echo "<td>$value</td>";
							echo "</tr>";
						}
					}
					else
					{
						echo "<tr><th>Your existence is a lie</th></tr>";
					}
					$conn->close();
					?>
				</table>
			</div>
	</section>
</body>
</html>

