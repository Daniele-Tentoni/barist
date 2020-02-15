<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
	<a class="navbar-brand" href="index.php">Barist</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link" href="timesheets.php">Timesheets <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="payments.php">Payments</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="about.php">About</a>
			</li>
		</ul>
		<ul class="navbar-nav">
			<form class="form-inline">
				<?php
				if(isset($_SESSION["login_user"])) {
					echo '<a class="btn btn-success my-2 my-sm-0" href="account.php" role="button">Account</a>
					<a class="btn btn-outline-success mr-sm-2" href="logout.php" role="button">Logout</a>';
				} else {
					echo '<a class="btn btn-success my-2 my-sm-0" href="signup.php" role="button">Sign Up</a>
					<a class="btn btn-outline-success mr-sm-2" href="signin.php" role="button">Sign In</a>';
				}
				?>
			</form>
		</ul>
	</div>
</nav>