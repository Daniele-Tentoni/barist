<?php
session_start();
$conn = new mysqli("localhost", "root", "", "my_barist");
$conn->set_charset("utf8");
if($conn->connect_errno) {
	// header("Refresh: 0;URL=login.php?error=connerr");
	echo "Errore di connessione";
	exit;
} else {
	$email = $_POST["login-email"];
	echo $_POST["login-email"];
	$password = $_POST["login-password"];
	echo $_POST["login-password"];
	$result = login($email, $password, $conn);
	$conn->close();
	if($result == false) {
		// header("Refresh: 0;URL=login.php?error=dataerr");
	echo "Errore di dati";
	exit;
	} else {
		echo "Login effettuato.";
		header("Refresh: 0;URL=../account.php");
		exit;
	}
}

function login($email, $password, $mysqli) {
  // Usando statement sql 'prepared' non sarà possibile attuare un attacco di tipo SQL injection.
  $query = "SELECT users.Id as UserId, Name, Surname, Email, Sale, Password FROM users WHERE Email = ? LIMIT 1";
  $stmt = $mysqli->prepare($query);
  $stmt->bind_param("s", $email); // esegue il bind del parametro '$email'.
  $stmt->execute(); // esegue la query appena creata.
  $result = $stmt->get_result();
  if($result->num_rows == 1) { // se l'utente esiste
    $fetch = $result->fetch_array(MYSQLI_ASSOC);
     // Verifichiamo che non sia disabilitato in seguito all'esecuzione di troppi tentativi di accesso errati.
     if(checkbrute($fetch["UserId"], $mysqli) == true) {
        // Account disabilitato
        // Invia un e-mail all'utente avvisandolo che il suo account è stato disabilitato.
        return false;
     } else {
		 $password = hash('sha512', $password.$fetch["Sale"]); // Codifica la password usando una chiave univoca.
		 echo $password;
		 if($fetch["Password"] == $password) { // Verifica che la password memorizzata nel database corrisponda alla password fornita dall'utente.
          // Password corretta!
          $ricordami = isset($_POST["ricordami"]) ? $_POST["ricordami"] : "off";
          if($ricordami === "on") {
            setcookie("Login", $fetch["UserId"], time() + 2592000);
          } else {
            setcookie("Login", $fetch["UserId"], time() - 3600);
          }
          $_SESSION["login_user"] = $fetch;
          return true;
       } else {
          // Password incorretta.
          // Registriamo il tentativo fallito nel database.
          $now = time();
          $query = "INSERT INTO logins (UserId, Data) VALUES (" . $fetch["UserId"] . ", " . $now . ")";
          $mysqli->query($query);
          return false;
       }
    }
  } else {
     // L'utente inserito non esiste.
     return false;
  }
}

function checkbrute($user_id, $mysqli) {
   // Recupero il timestamp
   $now = time();
   // Vengono analizzati tutti i tentativi di login a partire dalle ultime due ore.
   $valid_attempts = $now - (2 * 60 * 60);
   if ($stmt = $mysqli->prepare("SELECT time FROM logins WHERE UserId = ? AND time > '$valid_attempts'")) {
      $stmt->bind_param('i', $user_id);
      // Eseguo la query creata.
      $stmt->execute();
      $stmt->store_result();
      // Verifico l'esistenza di più di 5 tentativi di login falliti.
      if($stmt->num_rows > 5) {
         return true;
      } else {
         return false;
      }
   }
}
?>
