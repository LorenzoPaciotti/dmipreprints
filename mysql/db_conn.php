<?php

#VARIABILE GLOBALE PER LA CONNESSIONE AL DB, VIENE USATA DA TUTTI I FILE DB_*.PHP
$db_connect;

#CONNESSIONE SERVER DB
function connettiDBManager() {
    
    global $db_connect;
    $db_connect = new mysqli('localhost', 'root@localhost', null) or die('errore connessione mysql');
    $errore = mysqli_errno($db_connect);
    print $errore . "\n";
    return $db_connect;
}