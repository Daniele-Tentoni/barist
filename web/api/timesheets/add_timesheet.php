<?php
	if ( !is_ajax() ) {
		echo "Is not ajax.";
		exit;
	}

	$conn = new mysqli("localhost", "root", "", "my_barist");
	$conn->set_charset("utf8");
	if($conn->connect_error){
		echo "Connection error.";
		exit;
	}

	$sql = "INSERT INTO timesheets VALUES (NULL, ?, ?, ?, ?)";
	$query = $conn->prepare($sql);
	$query->bind_param("isss", $employee_input, $date_ts, $time_ts, $mansion_input);
	$employee_input = $_POST['employee_input'];
	$date_ts = $_POST['date_ts'];
	$time_ts = $_POST['time_ts'];
	$mansion_input = $_POST['mansion_input'];
	$query->execute();
	$result = $query->get_result();
	$conn->close();
	echo json_encode($result);
	
	//Funzione che serve per controllare se la chiamata è ajax o no.
	function is_ajax() {
		return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
	}
?>