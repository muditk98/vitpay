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
	<table class="grid">
		<tr>
			<td>
				<a href="pay.php" class="tlink">
					<img src="images/icons/Pay.svg" alt="Pay"/>
					<p>Pay</p>
				</a>
			</td>
			<td>
				<a href="#" class="tlink">
					<img src="images/icons/Dues.svg" alt="Dues"/>
					<p>Dues</p>
				</a>
			</td>
			<td>
				<a href="transaction.php" class="tlink">
					<img src="images/icons/Transaction.svg" alt="Transaction"/>
					<p>Transaction</p>
				</a>
			</td>
		</tr>
		<tr>
			<td>
				<a href="#" class="tlink">
					<img src="images/icons/Events.svg" alt="Events"/>
					<p>Events</p>
				</a>
			</td>
			<td>
				<a href="#" class="tlink">
					<img src="images/icons/Fees.svg" alt="Fees"/>
					<p>Fees</p>
				</a>
			</td>
			<td>
				<a href="wallet.php" class="tlink">
					<img src="images/icons/Wallet.svg" alt="Wallet">
					<p>Wallet</p>
				</a>
			</td>
		</tr>
	</table>

</body>
</html>