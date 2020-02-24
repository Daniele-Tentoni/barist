<?php
if($TGBot->text == '/all_info') {
	$TGBot->sendMessage($TGBot->chat_id, "Username: " . $TGBot->get_bot_info("username"));
	$TGBot->sendMessage($TGBot->chat_id, "First Name: " . $TGBot->get_bot_info("first_name"));
	$TGBot->sendMessage($TGBot->chat_id, "Id: " . $TGBot->get_bot_info("id"));
} else if($TGBot->text == '/next') {
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
	$row = $result->fetch_assoc();
	$employee = $row["Employee"];
	$mansion = $row["Mansion"];
	$date = $row["Date"];
	$time = $row["Hour"];
	$message = "@{$employee} have the next turn for **{$Mansion}** at **{$date} {$time}**."
	$TGBot->sendMessage($TGBot->chat_id, $message);
    // Chisura connessione.
    $conn->close();
}