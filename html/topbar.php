<header>
	<div class="grid-container">
		<div id="brand">
			<h1>
				VIT<em><span class="highlight">pay</span></em>
			</h1>
		</div>
		<nav>
			<ul>
				<li <?php if($_SERVER["PHP_SELF"] == "/vitpay.php") echo 'class="current"'; ?>>
					<a href="vitpay.php">Home</a>
				</li>
				<li <?php if($_SERVER["PHP_SELF"] == "/about.php") echo 'class="current"'; ?>>
					<a href="about.php">About</a>
				</li>
				<li <?php if($_SERVER["PHP_SELF"] == "/contact.php") echo 'class="current"'; ?>>
					<a href="contact.php">Contact Us</a>
				</li>
			</ul>
		</nav>
		<div class="dropdown">
			<div class="dropbtn"><?php echo $_SESSION['UserFullName']; ?></div>
			<div class="dropdown-content" id="dcont">
				<a href="profile.php">Profile</a>
				<a href="logout.php">Logout</a>
			</div>
		</div>
	</div>
</header>