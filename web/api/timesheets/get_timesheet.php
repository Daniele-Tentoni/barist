<?php
	//Info database.
	$host="localhost";
	$user="root";
	$pass="";
	$database="my_barist";

	//Connessione al database.
	$conn=new mysqli($host,$user,$pass,$database);
	//Codifica caratteri nel database.
	$conn->set_charset("utf8");
	//In caso di errore.
	if($conn->connect_error){
		die("Connessione fallita:".$conn->connect_error);
	}

	$sql="SELECT users.Name as Employee, DateTimesheet as Date, Hour, Mansion from (users join timesheets on users.Id = timesheets.UserId)";
	// Salvataggio risultato query.
	$result = $conn->query( $sql );

	// Creazione stringa di ritorno.
	$fin = array('data' => array());
    while( $row = $result->fetch_assoc() ) {
		$elem = array($row["Date"], $row["Hour"], $row["Employee"], $row["Mansion"]);
        array_push($fin["data"], $elem);
    }

    // Chisura connessione.
    $conn->close();

    // Ritorno.
    echo json_encode( $fin );

	//Funzione che serve per controllare se la chiamata è ajax o no.
	function is_ajax() {
		return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
	}
?>