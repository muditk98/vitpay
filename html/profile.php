<?php include 'session.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>VITpay | Payment Status</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/styledue.css">
	<script>
		function validateNewPass() {
			var newpass = document.getElementById('newpass').value;
			var conpass = document.getElementById('conpass').value;
			var err = document.getElementById('message');
			if( newpass == conpass && newpass.length >= 8)
			{
				return true;
			}
			else if( newpass != conpass )
			{
				err.innerHTML = 'Passwords do not match';
			}
			else
			{
				err.innerHTML = 'Minimum password length is 8';
			}
			return false;
		}
	</script>
</head>
<body>
	<?php include 'topbar.php'; ?>
	<section class="background" id="profile">
			<div class="container flexcont">
				<table class="cleantable">
					<?php 
					$conn = Connect();
					$uname = $_SESSION['uname'];
					$sql = "SELECT * FROM User WHERE Id = '$uname'";
					$result = $conn->query($sql);
					if($result->num_rows > 0)
					{
						$row = $result->fetch_assoc();
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
				<form action="changepassword.php" method="post" onsubmit="return validateNewPass()">
					<input type="password" name="oldpass" placeholder="Enter old password" autocomplete="off" required />
					<input type="password" name="newpass" id="newpass" placeholder="Enter new password" autocomplete="off" required />
					<input type="password" id="conpass" placeholder="Confirm password" autocomplete="off" required />
					<input type="submit" name="passbtn" id="passbtn" value="Change Password" />
					<?php echo $_SESSION['msg']; $_SESSION['msg'] = ''; ?>
					<span class="highlight" id="message"></span>
				</form>
			</div>
	</section>
</body>
</html>

