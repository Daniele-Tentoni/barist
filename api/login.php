<?php
session_start();
$conn = new mysqli("localhost", "root", "", "my_apenzapina");
$conn->set_charset("utf8");
if($conn->connect_errno) {
  header("Refresh: 0;URL=login.php?error=connerr");
} else {
  $result = login($_POST["login-email"], $_POST["login-password"], $conn);
  $conn->close();
  if($result == false) {
    header("Refresh: 0;URL=login.php?error=dataerr");
  } else {
    header("Refresh: 0;URL=account.php");
  }
}

function login($email, $password, $mysqli) {
  // Usando statement sql 'prepared' non sarà possibile attuare un attacco di tipo SQL injection.
  $query = "SELECT Utente.IdUtente, Nome, Cognome, Titolo, Telefono, Email, Celiaco, Vegetariano, Vegano, ConfEmail, Sale, Password FROM Utente INNER JOIN (Potere INNER JOIN Permesso ON Potere.IdPermesso = Permesso.IdPermesso) ON Utente.IdUtente = Potere.IdUtente WHERE Email = ? LIMIT 1";
  $stmt = $mysqli->prepare($query);
  $stmt->bind_param("s", $email); // esegue il bind del parametro '$email'.
  $stmt->execute(); // esegue la query appena creata.
  $result = $stmt->get_result();
  if($result->num_rows == 1) { // se l'utente esiste
    $fetch = $result->fetch_array(MYSQLI_ASSOC);
     // verifichiamo che non sia disabilitato in seguito all'esecuzione di troppi tentativi di accesso errati.
     if(checkbrute($fetch["IdUtente"], $mysqli) == true) {
        // Account disabilitato
        // Invia un e-mail all'utente avvisandolo che il suo account è stato disabilitato.
        return false;
     } else {
       $password = hash('sha512', $password.$fetch["Sale"]); // codifica la password usando una chiave univoca.
       if($fetch["Password"] == $password) { // Verifica che la password memorizzata nel database corrisponda alla password fornita dall'utente.
          // Password corretta!
          $ricordami = $_POST["ricordami"];
          if($ricordami === "on") {
            setcookie("Login", $fetch["IdUtente"], time() + 2592000);
          } else {
            setcookie("Login", $fetch["IdUtente"], time() - 3600);
          }
          $_SESSION["login_user"] = $fetch;
          return true;
       } else {
          // Password incorretta.
          // Registriamo il tentativo fallito nel database.
          $now = time();
          $query = "INSERT INTO Login (IdUtente, Data) VALUES (" . $fetch["IdUtente"] . ", " . $now . ")";
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
   if ($stmt = $mysqli->prepare("SELECT time FROM login_attempts WHERE user_id = ? AND time > '$valid_attempts'")) {
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
