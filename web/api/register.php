<?php
if ( !isset( $_POST['registrati'] ) ) {
    // header( 'Refresh: 0;URL=register.php?error=nopost' );
    echo 'Non è una richiesta in post.';
    exit;
} else {
    session_start();
    $conn = new mysqli( 'localhost', 'root', '', 'my_barist' );
    $conn->set_charset( 'utf8' );
    if ( $conn->connect_error ) {
        // header( 'Refresh: 0,URL:register.php?error=connerr' );
        echo 'Errore di connessione al server database.';
        exit;
    } else {
        $company_pass = mysql_real_escape_string( $_POST['company_pass'] );
        $company_id = check_company( $company_pass, $conn );
        if ( $company_id < 0 ) {
            echo 'Company not found';
            exit;
        }

        // Now I can check passwords and insert user.
        $password = mysql_real_escape_string( $_POST['password'] );
        $conpassword = mysql_real_escape_string( $_POST['conpassword'] );
        if ( $password != $conpassword ) {
            // header( 'Refresh: 0;URL=register.php?error=passne' );
            echo 'Le password non corrispondono.';
            exit;
        } else {
            // Crea una chiave casuale
            $random_salt = hash( 'sha512', uniqid( mt_rand( 1, mt_getrandmax() ), true ) );
            // Crea una password usando la chiave appena creata.
            $passwordhash = hash( 'sha512', $password.$random_salt );
            $name = mysql_real_escape_string( $_POST['name'] );
            $surname = mysql_real_escape_string( $_POST['surname'] );
            $email = mysql_real_escape_string( $_POST['email'] );
            $res_insert = insert_into_users( $conn, $name, $surname, $email, $passwordhash, $random_salt );
            if ( $res_insert > 0 ) {
                // header( 'Refresh: 0;URL=register.php?error='.$query->errno );
                echo "Errore di database {$res_insert}";
                exit;
            }

            // Now I can insert into CompanyUsers too.
            $res_company = insert_into_companyusers( $conn, $user_id, $company_id );
            if ( !$res_company ) {
                $conn->close();
                echo 'Registrazione riuscita, procedere con il login o con la conferma della mail.';
                // header( 'Refresh: 3;URL=inviaConfEmail.php?IdUtente='.$lastid );
                exit;
            }
            $conn->close();
            echo 'Errore nei dati.';
            // header( 'Refresh: 0;URL=register.php?error=dataerr' );
            exit;
        }
    }
}

function check_company( $company_password, $mysqli ) {
    // Usando statement sql 'prepared' non sarà possibile attuare un attacco di tipo SQL injection.
    $query = 'SELECT Id FROM Companies WHERE Pass = ? LIMIT 1';
    $stmt = $mysqli->prepare( $query );
    $stmt->bind_param( 's', $company_password );
    // esegue il bind del parametro '$company_password'.
    $stmt->execute();
    // esegue la query appena creata.
    $result = $stmt->get_result();
    if ( $result->num_rows == 1 ) {
        // se la compagnia esiste.
        $fetch = $result->fetch_array( MYSQLI_ASSOC );
        // Restituisco l'id della compagnia.
	   return $fetch["Id"];
	} else {
		// Restituisco l'id negativo in caso di compagnia non trovata.
        return -1;
    }
}

function insert_into_users( $conn, $name, $surname, $email, $passwordhash, $random_salt ) {
    $sql = 'insert into Users(Name, Surname, Email, Password, Sale) values (?, ?, ?, ?, ?)';
    $query = $conn->prepare( $sql );
    $query->bind_param( 'sssss', $name, $surname, $email, $passwordhash, $random_salt );
    $query->execute();
    $result = $query->get_result();
    if ( !$result ) {
        return -1;
    } else {
        return $query->errno;
    }
}

function insert_into_companyusers( $conn, $user_id, $company_id ) {
    $query = $conn->prepare( 'INSERT INTO CompanyUsers(CompanyId, UserId) VALUES (?, ?)' );
    $query->bind_param( 'ss', $user_id, $company_id );
    $query->execute();
    return $query->get_result();
}
?>
