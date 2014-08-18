<?php

require_once getcwd() . '/../impost_car.php';
$db_connect;

function connettiDBManager() {
    global $db_connect, $mysql_addr, $mysql_user, $mysql_pass;
    $db_connect = new mysqli($mysql_addr, $mysql_user, $mysql_pass) or die('errore connessione mysql');
    $errore = mysqli_errno($db_connect);
    print_r(mysqli_error($db_connect));
    if ($errore !== 0) {
        print "ERRORE db_conn: " . $errore;
        print mysqli_error();
        return -1;
    }
    return 0;
}

function selezionaSchema() {
    global $db_connect;
    mysqli_select_db($db_connect, 'DMIPrePrints') or die('Could not select database');
}

function disconnettiDBManager() {
    
}
