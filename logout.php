<?php
session_start();
$_SESSION = array();
session_destroy();
echo "<h1>Disconnessione riuscita, arrivederci!</h1>";
header("Location: login.php");
?>