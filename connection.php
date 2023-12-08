<?php

// Credenziali necessarie per permettere la connessione al server MySQL:
$servername = "localhost";
$username = "root";
$password = "";

// Creazione della connessione:
$connection = new mysqli($servername, $username, $password);
$dbName = "Tennis";

// Controllo della connessione:
if ($connection->connect_error) {
  die("Connessione fallita: " . $connection->connect_error);
}

// Selezione del database su cui verranno effettuate le successive operazioni:
mysqli_select_db($connection, $dbName);

?>