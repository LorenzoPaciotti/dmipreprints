<?php
require_once getcwd().'/../impost_car.php';
$db_connect;

function connettiDBManager() {
    global $db_connect, $mysql_addr, $mysql_user, $mysql_pass;
    print_r($mysql_addr.$mysql_user.$mysql_pass);
    $db_connect = new mysqli($mysql_addr, $mysql_user, $mysql_pass) or die('errore connessione mysql');
    $errore = mysqli_errno($db_connect);
    print "codice stato sql alla connessione ---> ".$errore;
}

function selezionaSchema(){
    global $db_connect;
    mysqli_select_db($db_connect, 'DMIPrePrints') or die('Could not select database');
}

function disconnettiDBManager(){
    
}