<!doctype html>
<html lang="en">

<head>
	<?php
	$title = "Home";
	require("components/headers/main_header.php");
	?>
</head>

<body>
	<?php require("components/navbar/navbar.php"); ?>

	<div class="container">
		<div class="row">
			<div class="jumbotron">
				<h1 class="display-4">Hello, Barists!</h1>
				<p class="lead">A Barist is a barman, bartender or any bar-entusiastic that wanna manage his activity smarter than never.</p>
				<hr class="my-4">
				<p>Take a trip or Barist! and try our features.</p>
				<a class="btn btn-primary btn-lg" href="about.php" role="button">Learn more</a>
			</div>
		</div>
		<div class="row row-cols-4">
			<div class="col-sm">
				<?php require("components/cards/timesheet_card.php"); ?>
			</div>
			<div class="col-sm">
				<?php require("components/cards/payments_card.php"); ?>
			</div>
			<div class="col-sm">
				<?php require("components/cards/bad_english_card.php"); ?>
			</div>
		</div>
	</div>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script>!function(d,l,e,s,c){e=d.createElement("script");e.src="//ad.altervista.org/js.ad/size=2X2/?ref="+encodeURIComponent(l.hostname+l.pathname)+"&r="+Date.now();s=d.scripts;c=d.currentScript||s[s.length-1];c.parentNode.insertBefore(e,c)}(document,location)</script>
</body>

</html>