<?php

$db_connect;

function connettiDBManager() {
    #CONNESSIONE SERVER DB
    global $db_connect;
    $db_connect = new mysqli('localhost', 'root@localhost', null) or die('errore connessione mysql');
    $errore = mysqli_errno($db_connect);
    print $errore . "\n";
    return $db_connect;
}