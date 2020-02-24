<table class="display compact">
	<thead>
		<tr>
			<th>Date</th>
			<th>Hour</th>
			<th>Employee</th>
			<th>Mansion</th>
			<th>Com</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th>Date</th>
			<th>Hour</th>
			<th>Employee</th>
			<th>Mansion</th>
			<th>Com</th>
		</tr>
	</tfoot>
</table>
<div class="row">
	<div class="col-sm">
		<form class="form-inline" id="add_timesheet">
			<div class="row">
				<div class="col-sm">
					<label class="sr-only" for="employee_input">Employee</label>
					<input type="text" class="form-control" id="employee_input" placeholder="Employee">
				</div>
				<div class="col-sm">
					<label class="sr-only" for="inlineFormInputGroupUsername2">Date</label>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">Date</span>
						</div>
						<input type="date" id="date_ts" aria-label="Date" class="form-control">
						<input type="time" id="time_ts" aria-label="Time" class="form-control">
					</div>
				</div>
				<div class="col-sm">
					<label class="sr-only" for="mansion_input">Mansion</label>
					<input type="text" class="form-control" id="mansion_input" placeholder="Mansion">
				</div>
				<div class="col-sm">
					<button type="button" id="add_ts_btn" class="btn btn-primary">Add</button>
				</div>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">
	var table;
	$(document).ready(function() {
		table = $('.display').DataTable( {
			"ajax": "api/timesheets/get_timesheet.php"
		} );

		$('#add_ts_btn').click(function () {
			// Add button on click listener. Send the Ajax request.
			console.log("Submit.");

			var ts = {
					"employee_input": $('#employee_input').val(),
					"date_ts": $('#date_ts').val(),
					"time_ts": $('#time_ts').val(),
					"mansion_input": $('#mansion_input').val(),
				};

			//Richiesta AJAX.
			$.ajax({
				type: "POST",
				dataType: "json",
				url: "api/timesheets/add_timesheet.php",
				data: ts,
				//In caso di successo
				success: function(data) {
					console.log("Success");
					console.log(data);
					table.ajax.reload();
				},
				error: function(data) {
					console.log("Error");
					console.log(data);
				}
			});
		});
	} );
</script>