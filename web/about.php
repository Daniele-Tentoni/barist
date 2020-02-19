<!doctype html>
<html lang="en">

<head>
	<?php
	$title = "Home";
	require("components/headers/main_header.php");
	?>
</head>

<body>
	<div class="wrapper">
		<?php require("components/navbar/sidebar.php"); ?>

		<div id="content">
	<?php require("components/navbar/navbar.php"); ?>

	<div class="container">
		<div class="row">
			<div class="col-sm">
                <p>
                    Barist! is a new brand from Cesena made by Daniele Tentoni for any bar-entusiastic. Try our magic features!
                </p>
                <h3>F.A.Q.s (Frequently Asked Questions)</h3>
                <div class="accordion" id="accordionExample">
					<div class="card">
						<div class="card-header" id="headingOne">
							<h2 class="mb-0">
							<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
								What is Timesheets?
							</button>
							</h2>
						</div>

    					<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
							<div class="card-body">
							Timesheets is a tool where you can define turns for you colleges and find best accordition between team components.
      						</div>
    					</div>
  					</div>
					<div class="card">
						<div class="card-header" id="who_timesheets">
							<h2 class="mb-0">
								<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#who_timesheets_collapse" aria-expanded="true" aria-controls="who_timesheets_collapse">
								Who can use Timesheets?
								</button>
							</h2>
						</div>

						<div id="who_timesheets_collapse" class="collapse show" aria-labelledby="who_timesheets" data-parent="#accordionExample">
							<div class="card-body">
								<p>All logged user can use Timesheets, admins and simple users too. </p>
								<p>
									An admin can:
									<ul>
										<li>Add/Update/Delete a turn for a user.</li>
										<li>Take a turn.</li>
									</ul>
								</p>
								<p>
									A simple user can:
									<ul>
										<li>Take a turn.</li>
									</ul>
								</p>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-header" id="headingTwo">
						<h2 class="mb-0">
							<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							What is Payments?
							</button>
						</h2>
						</div>
						<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
						<div class="card-body">
							Payments is a toll where you can define payments for your team comp based on hours worked.
						</div>
						</div>
					</div>
					<div class="card">
						<div class="card-header" id="headingThree">
						<h2 class="mb-0">
							<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							What is Proviges?
							</button>
						</h2>
						</div>
						<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
							<div class="card-body">
								What are proviges?
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		</div>
	</div>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>