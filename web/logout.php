<?php
// I must logout on db too.
echo 'Logout in corso...';
session_start();
setcookie( 'Login', '', time() - 3600 );
$_SESSION = array();
session_unset();
if ( session_destroy() ) {
    echo 'Logout riuscito, reindirizzamento...';
} else {
    echo 'Logout non riuscito, reindirizzamento...';
}
header( 'Refresh: 1;URL=index.php' );
?>
