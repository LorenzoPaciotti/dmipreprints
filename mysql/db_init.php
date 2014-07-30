<?php

#CHECK SESSIONE
#inizializzazione db mysql
include 'db_conn.php';

function CreaDB() {
    global $db_connect;
    connettiDBManager();

    #CREAZIONE DB
    $query = 'CREATE DATABASE if not exists DMIPrePrints';
    $result = mysqli_query($db_connect, $query) or die('Impossibile creare schema');

    #CREAZIONE TABELLE
    mysqli_select_db($db_connect, 'DMIPrePrints') or die('Could not select database');

    #AUTORI contiene tutti i possibili utenti del servizio (professori o altri ruoli)
    $query = 'CREATE TABLE if not exists AUTORI (id_AUTORI INT NOT NULL AUTO_INCREMENT PRIMARY KEY, nome VARCHAR (50), cognome VARCHAR(50), uid VARCHAR(9) NOT NULL)';
    $result = mysqli_query($db_connect, $query) or die('Query failed: ' . mysqli_error());

    #PRINTS contiene le informazioni sui preprint memorizzati
    $query = 'CREATE TABLE if not exists PRINTS (id_PRINTS INT NOT NULL AUTO_INCREMENT PRIMARY KEY, titolo VARCHAR(100) NOT NULL, autore VARCHAR(100) references AUTORI(id_AUTORI),abstract VARCHAR(10000), percorso VARCHAR(500))';
    $result = mysqli_query($db_connect, $query) or die('Query failed: ' . mysqli_error());


    #CHIUSURA CONNESSIONE SERVER DB
    mysqli_close($db_connect) or die('problema chiusura connessione db');
    echo 'chiusa connessione db';
    return $result;
}
