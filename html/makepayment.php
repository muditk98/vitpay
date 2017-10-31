
<?php
	include 'session.php';

	if ($_SERVER["REQUEST_METHOD"] != "POST")
	{
		header('Location: vitpay.php');
	}

	$conn = Connect();
	$uname = $_SESSION['uname'];
	$payAmount = -1;
	$userNewBalance = -1;
	$pid = -1;
	$sqluser = "SELECT * FROM User WHERE Id = '$uname'";
	$resultuser = $conn->query($sqluser);
	$userCurrentBalance = ($resultuser->fetch_assoc())['Balance'];

	if( isset($_POST['dueid']) )
	{
		// Page is due page
		$dueid = $conn->real_escape_string($_POST['dueid']);
		$receiver = 'VIT10';
		$sqldue = "SELECT * FROM Due WHERE Id = $dueid AND Debtor = '$uname'";
		$resultdue = $conn->query($sqldue);
		if( $resultdue->num_rows == 1)
		{
			$row = $resultdue->fetch_assoc();
			$payAmount = $row['Amount'];
			$pid = $row['PurposeId'];
			if( $payAmount <= $userCurrentBalance )
			{
				$conn->query("DELETE FROM Due WHERE Id = $dueid");
			}
		}
	}
	elseif( isset($_POST['eventid']) )
	{
		// Page is event page
		$pid = $conn->real_escape_string($_POST['eventid']);
		$receiver = 'VIT10';
		$payAmount = ($conn->query("SELECT * FROM Fees WHERE Id = $pid")->fetch_assoc())['Amount'];
	}
	else
	{
		$pid = 11;
		$receiver = $conn->real_escape_string($_POST['receiver']);
		if($receiver == 'user')
		{
			$receiver = $conn->real_escape_string($_POST['ureceiver']);
			$receiver = strtoupper($receiver);
		}
		if( is_numeric($_POST['amount']) )
		{
			$payAmount = $_POST['amount'];
		}

	}
	// echo "$payAmount, $userNewBalance, $pid";
	$userNewBalance = $userCurrentBalance - $payAmount;	
	if($payAmount > 0 and $userNewBalance >= 0 and $pid > 0 and $uname != $receiver)
	{
		$type = (($conn->query("SELECT type FROM UserMap WHERE Id = '$receiver'"))->fetch_assoc())['type'];
		if($type == 'Vitian')
		{
			$type = 'User';
		}
		else
		{
			$type = 'Merchant';
		}
		$conn->query("UPDATE $type SET Balance = Balance + $payAmount WHERE Id = '$receiver'");
		$conn->query("UPDATE User SET Balance = $userNewBalance WHERE Id = '$uname'");
		$conn->query("INSERT INTO Transaction (Payer, Receiver, Amount, TransactionTime, PurposeId) VALUES ('$uname', '$receiver', $payAmount, now(), $pid)");
		$_SESSION['paymsg'] = "Payment of &#8377; $payAmount Successfuly made to $receiver";
	}
	else
	{
		if($userNewBalance < 0)
		{
			$_SESSION['paymsg'] = 'Insufficient Funds';
		}
		else
		{
			$_SESSION['paymsg'] = 'Payment Unsuccessful';
		}
	}
	$conn->close();
	header('Location: payment.php');
 ?>
