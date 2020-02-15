<p>
	Use this tool to produce a calendar of barist turns like this.
</p>
<table class="display compact">
	<thead class="thead-dark">
		<tr>
			<th>Date</th>
			<th>Hour</th>
			<th>Employee</th>
			<th>Mansion</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th>1</th>
			<td>01/01/2020</td>
			<td>19:00</td>
			<td>Filo</td>
		</tr>
		<tr>
			<th>2</th>
			<td>03/01/2020</td>
			<td>19:00</td>
			<td>Chiara</td>
		</tr>
		<tr>
			<th>3</th>
			<td>04/01/2020</td>
			<td>14:00</td>
			<td>Paolo</td>
		</tr>
	</tbody>
	<tfoot>
		<tr>
			<th>Date</th>
			<th>Hour</th>
			<th>Employee</th>
			<th>Mansion</th>
		</tr>
	</tfoot>
</table>
<script type="text/javascript">
	$(document).ready(function() {
		$('.display').DataTable();
	} );
</script>