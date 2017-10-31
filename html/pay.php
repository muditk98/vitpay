<?php include 'session.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>VITpay | Pay</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/styledue.css">
	<script>
		function userEnable() {
			// alert("wow");
			var selected = (document.getElementById('receiver').value != "user")
		    document.getElementById("ureceiver").disabled = selected;
		    var disp = "none";
		    if (!selected)
		    {
		    	disp = "block";
		    }
		    document.getElementById("ureceiver").style.display = disp;
		}
	    // document.getElementById("ureceiver").disabled = true;
	</script>
</head>
<body onload="userEnable()">
	<?php include 'topbar.php'; ?>
	<section class="background" id="pay">
		<div class="container flexcont">
			<form action="makepayment.php" method="post">
				<select name="receiver" id="receiver" required="true" onchange="userEnable()">
					<option value="" disabled selected>Select Receiver</option>
					<option value="CRCL13">CRCL</option>
					<option value="Gazebo15">Gazebo</option>
					<option value="Nightm12">Night-Mess</option>
					<option value="Pits14">Pitstop</option>
					<option value="VIT10">VIT</option>
					<option value="Vmart11">VMart</option>
					<option value="user">User</option>
				</select>
				<input type="text" name="ureceiver" id="ureceiver" disabled="true" placeholder="Enter User Id" />
				<input type="number" name="amount" placeholder="Enter Amount" required="true" min='0' autocomplete="off" />
				<input type="submit" name="paybtn" id="paybtn" value="Pay" />
			</form>
		</div>
	</section>
</body>
</html>