<?php

#VARIABILE GLOBALE PER LA CONNESSIONE AL DB, VIENE USATA DA TUTTI I FILE DB_*.PHP
$db_connect;

#CONNESSIONE SERVER DB
function connettiDBManager() {
    
    global $db_connect;
    $db_connect = new mysqli('localhost', 'preprints', 'preprints') or die('errore connessione mysql');
    $errore = mysqli_errno($db_connect);
    print $errore . "\n";
    echo "connesso\n";
}

function selezionaSchema(){
    global $db_connect;
    mysqli_select_db($db_connect, 'DMIPrePrints') or die('Could not select database');
}

function disconnettiDBManager(){
    
}