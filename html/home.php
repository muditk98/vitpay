<?php include 'session.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<title>VITpay | Home</title>
	<link rel="stylesheet" href="./css/stylepax.css">
	<link rel="stylesheet" href="./css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="./js/main.js"></script>
</head>
<body >
	<?php include 'topbar.php'; ?>
	<div class="container">
		<section class="background">
			<div class="content-wrapper">
				<a href="pay.php">
					<p class="content-title">Pay</p>
					<p class="content-subtitle">Make fast and secure transactions</p>
				</a>
			</div>
		</section>
		<section class="background">
			<div class="content-wrapper">
				<a href="event.php">				
					<p class="content-title">Events</p>
					<p class="content-subtitle">Quickly register for any event</p>
				</a>
			</div>
		</section>
		<section class="background">
			<div class="content-wrapper">
				<a href="due.php">					
					<p class="content-title">Dues</p>
					<p class="content-subtitle">Clear your pending dues</p>
				</a>
			</div>
		</section>
		<section class="background">
			<div class="content-wrapper">
				<a href="passbook.php">					
					<p class="content-title">Passbook</p>
					<p class="content-subtitle">Check your balance and transaction history</p>
				</a>
			</div>
		</section>
	</div>
</body>
</html>

