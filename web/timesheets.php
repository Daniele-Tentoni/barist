<!doctype html>
<html lang="en">

<head>
	<?php
	$title = "Timesheets";
	require("components/headers/main_header.php"); ?>
</head>

<body>
	<div class="wrapper">
		<?php require("components/navbar/sidebar.php"); ?>

		<div id="content">
	<?php require("components/navbar/navbar.php"); ?>

	<div class="container">
		<div class="row">
			<div class="col-sm">
				<?php
				if (isset($_SESSION["login_user"])) {
					require("components/timesheets/main_timesheet.php");
				} else {
					require("demos/timesheet_demo.php");
				}
				?>
			</div>
		</div>
	</div>
		</div>
	</div>
	
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/dt-1.10.20/af-2.3.4/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/datatables.min.js"></script>
</body>

</html>