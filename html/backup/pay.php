<?php include 'session.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>vitPay</title>
	<link rel="stylesheet" href="homepage.css">
	<script>
		function payfunc(id) {
			var x = document.getElementsByClassName("iconimg");
			for (var i = 0; i < x.length; i++) {
				x[i].style.opacity = 0.2;
			}
			document.getElementById(id).style.opacity = 1;
			document.getElementById('retailer').value = id;
		}
	</script>
</head>
<body>
	<div id="background"></div>
	<?php include 'topbar.php'; ?>
	<h1>Pay To</h1>
	<table class="grid" id="paygrid">
		<tr>
			<td>
				<img id="vmart" class="iconimg" src="images/icons/vmart.png" alt="vmart" onclick="payfunc(id);" />
			</td>
			<td>
				<img id="gazebo" class="iconimg" src="images/icons/gazebo.png" alt="gazebo" onclick="payfunc(id);"/>
			</td>
		</tr>
		<tr>
			<td>
				<img id="nightmess" class="iconimg" src="images/icons/nightmess.png" alt="nightmess" onclick="payfunc(id);"/>
			</td>			
		</tr>
	</table>
	<form id="payment" action="payment.php" method="post">
		<input id="retailer" type="text" placeholder="Select retailer" name="retailer" readonly />
		<input id="amount" type="text" placeholder="Enter amount" name="amount" required />
		<input type="submit" name="Submit" value="Pay"/>
	</form>

	
</body>
</html>