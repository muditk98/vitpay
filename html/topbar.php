<div id="topbar">
	<ul>
		<li class="topbarlink"><a href="vitpay.php">Home</a></li>
		<li class="topbarlink"><a href="#">News</a></li>
		<li class="topbarlink"><a href="#">Contact</a></li>
		<li class="topbarlink"><a href="#">About</a></li>
		<li class="topbarlink" style="float: right;">
			<a href="logout.php">
				<?php
				$conn = Connect();
				$uname = $_SESSION['uname'];
				$sql = "SELECT * FROM User WHERE RegId = '$uname'";
				$result = $conn->query($sql);
				if ($result->num_rows == 1)
				{
					$row = $result->fetch_assoc();
					echo $row['FirstName'] . " " . $row['LastName'];
				}
				$conn->close();
				?>
			</a>
		</li>
	</ul>
</div>