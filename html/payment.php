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
	<section class="background" id="pay">
			<div class="container flexcont">
				<p class="title">
					<?php echo $_SESSION['paymsg'];?>
				</p>
			</div>
	</section>
</body>
</html>