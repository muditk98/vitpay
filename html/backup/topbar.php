<div id="topbar">
	<ul>
		<li class="topbarlink"><a href="vitpay.php">Home</a></li>
		<li class="topbarlink"><a href="#">News</a></li>
		<li class="topbarlink"><a href="#">Contact</a></li>
		<li class="topbarlink"><a href="#">About</a></li>
		<li class="topbarlink" style="float: right;">
			<a href="logout.php">
				<?php
					echo $_SESSION['UserFullName'];
				?>
			</a>
		</li>
	</ul>
</div>