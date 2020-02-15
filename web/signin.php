<!doctype html>
<html lang="en">

<head>
	<?php
	$title = "Sign In";
	require("components/headers/main_header.php");
	?>
</head>

<body>
	<?php require("components/navbar/navbar.php"); ?>

	<div class="container">
  <div class="row">
    <div class="col-sm-5" id="login">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Login</h3>
        </div>
        <div class="panel-body">
			<!-- Form di login. Cambiare in modo che sia asincrono. -->
          <form action="api/login.php" method="post" autocomplete="on">
            <fieldset>
              <div class="form-group row">
                <label for="login-email" class="col-form-label col-sm-3">
                  Email
                </label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="login-email" id="login-email" placeholder="Indirizzo Email" required/>
                  <span id="emailTip" class="help-block">Non condivideremo la sua email con nessuno.</span>
                </div>
              </div>
              <div class="form-group row">
                <label for="login-password" class="col-form-label col-sm-3">
                  Password
                </label>
                <div class="col-sm-9">
                  <input type="password" class="form-control" name="login-password" minlenght="8" id="login-password" placeholder="Password" required/>
                  <span id="passwordTip" class="help-block">Non condivideremo la sua email con nessuno.</span>
                </div>
              </div>
              <div class="form-group">
                <div class="form-check">
                  <label class="form-check-label" for="ricordami">
                    <input type="checkbox" name="ricordami" id="ricordami" class="form-check-input" /> Ricordami
                  </label>
                  <span id="checkTip" class="help-block">Non dovrai digitare nuovamente email e password al tuo prossimo login.</span>
                </div>
              </div>
              <input type="submit" id="loggati" name="loggati" class="btn btn-primary btn-large" value="Accedi"/>
              <label for="reset" class="sr-only">Azzera tutti i campi.</label>
              <input type="reset" class="btn btn-outline-primary" id="reset" name="reset" value="Azzera" />
            </fieldset>
          </form>
        </div>
      </div>
    </div>
	<!-- Descrizione delle funzionalità. -->
    <div class="col-sm-7">
      <p>Grazie alla funzione di login avrai la possibilità di usare la maggior parte delle funzioni del nostro servizio.</p>
      <p>Puoi gestire la tua attività e i tuoi dipendeti oppure visionare i tuoi orari di lavoro.</p>
      <p>I tuoi dati non verranno condivisi con nessuno!</p>
      <div class="alert alert-info" role="alert">
        Non sei ancora un utente registrato? <a href="signup.php" class="alert-link">Effettua ora la registrazione!</a>
      </div>
      <?php
		// Gestione degli errori di login sui cookie.
      if(isset($_COOKIE["Login"]) && isset($cookie_error) && $cookie_error === "error") {
        echo '<div class="panel panel-danger">
                <div class="panel-heading">
                  <span class="panel-title">Errore Login</span>
                </div>
                <div class="panel-body"><p>';
        echo '    <div class="alert alert-danger" role="alert">
                    Non siamo riusciti a ripristinare la connessione a partire dai cookie, rieffettuare il login tramite il pannello qui a fianco.';
        echo "    </div>
                </div>
              </div>";
	  }
	  // Gestione dell'errore nel processo di login.
      if(isset($_GET["error"])) {
        $error = $_GET["error"];
        echo '<div class="panel panel-danger">
          <div class="panel-heading">
            <span class="panel-title">Errore Login</span>
          </div>
          <div class="panel-body"><p>';
        if($error === "dataerr") {
          echo "L'account non è presente o la password è sbagliata.";
        } else if ($error === "connerr") {
          echo "Impossibile collegarsi al database, contattare un amministratore di sistema.";
        } else if($error === "dataoterr") {
          echo "Errore sconosciuto al sistema. Contattare un amministratore di sistema.";
        }
        echo "</p></div></div>";
      }
      ?>
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