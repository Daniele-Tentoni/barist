<!doctype html>
<html lang="en">

<head>
	<?php
	$title = "Sign Up";
	require("components/headers/main_header.php"); ?>
</head>

<body>
	<?php require("components/navbar/navbar.php"); ?>

	<div class="container">
  <div class="row">
    <div class="col-sm-5" id="Register">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Registrati</h3>
        </div>
        <div class="panel-body">
          <form method="post" action="api/register.php" autocomplete="on">
            <fieldset>
              <div class="form-group row">
                <label for="name" class="col-form-label col-sm-3">
                  Nome
                </label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="name" id="name" placeholder="Nome" required/>
                  <span id="nameTip" class="help-block">Nome dell'utente. Le firme delle recensioni sul sito conterranno sia il Nome che il Cognome.</span>
                </div>
              </div>
              <div class="form-group row">
                <label for="surname" class="col-form-label col-sm-3">
                  Cognome
                </label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="surname" id="surname" placeholder="Cognome" required/>
                  <span id="surnameTip" class="help-block">Cognome dell'utente. Le firme delle recensioni sul sito conterranno sia il Nome che il Cognome.</span>
                </div>
              </div>
              <div class="form-group row">
                <label for="email" class="col-form-label col-sm-3">
                  Indirizzo Email
                </label>
                <div class="col-sm-9">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email" required/>
                  <span id="emailTip" class="help-block">Non condivideremo la sua email con nessuno.</span>
                </div>
              </div>
              <div class="form-group row">
                <label for="password" class="col-form-label col-sm-3">
                  Password
                </label>
                <div class="col-sm-9">
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password" minlenght="8" required/>
                  <span id="passwordTip" class="help-block">Password di sicurezza per l'accesso ai servizi.</span>
                </div>
              </div>
              <div class="form-group row">
                <label for="conpassword" class="col-form-label col-sm-3">
                  Conferma Password
                </label>
                <div class="col-sm-9">
                  <input type="password" class="form-control" name="conpassword" id="conpassword" placeholder="Conferma Password" minlenght="8" required/>
                  <span id="conpassowrdTip" class="help-block">Chiediamo di confermare la password per sicurezza.</span>
                </div>
              </div>
              <div class="form-group row">
                <label for="name" class="col-form-label col-sm-3">
                  Codice Organizzazione
                </label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="name" id="name" placeholder="Nome" required/>
                  <span id="nameTip" class="help-block">Codice della tua organizzazione. Chiedi al tuo titolare ulteriori informazioni.</span>
                </div>
              </div>
              <label for="registrati" class="sr-only">Procedi con la Registrazione.</label>
              <input type="submit" id="registrati" name="registrati" class="btn btn-primary btn-large" value="Registrati"/>
              <label for="reset" class="sr-only">Azzera tutti i campi.</label>
              <input type="reset" class="btn btn-outline-primary" id="reset" name="reset" />
            </fieldset>
          </form>
        </div>
      </div>
    </div>
    <div class="col-sm-7">
      <?php
      if(isset($_GET["error"])){
        echo '<div class="panel panel-danger">
          <div class="panel-heading">
            <h3 class="panel-title">Problema di registrazione</h3>
          </div>
          <div class="panel-body">';
        if($_GET["error"] == "2031"){
          echo 'I dati immessi non corrispondono al tipo di dato richiesto.<br />Controllare di aver immesso i dati correttamente e riprovare.';
        } else if($_GET["error"] === "1048" or $_GET["error"] === "1364"){
          echo 'Un campo del form non è stato compilato correttamente o non è stato compilato affatto.';
        } else if($_GET["error"] === "1292"){
          echo "Formato della data incorretto. Controllare l'orologio di sistema o contattare un amministratore.";
        } else if($_GET["error"] === "passne"){
          echo "Le password inserite con corrispondono.";
        } else if($_GET["error"] === "nopost"){
          echo "Sei stato reindirizzato qui da un'altra pagina.";
        } else {
          echo 'Errore sconosciuto, contattare un amministratore di sistema.';
        }
        echo '</div></div>';
      }
      ?>
      <p>Grazie alla funzione di registrazione avrai la possibilità di usare la maggior parte delle funzioni del nostro servizio.</p>
      <p>Inserisci il codice della tua organizzazione per avere accesso a tutte le funzionalità.</p>
      <p>I tuoi dati non verranno condivisi con nessuno! </p>
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