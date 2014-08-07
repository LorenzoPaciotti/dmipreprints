<?php

#CHECK SESSIONE
#inizializzazione db mysql
include_once 'db_conn.php';

function CreaDB() {
    global $db_connect;
    connettiDBManager();

    #CREAZIONE DB
    $query = 'CREATE DATABASE if not exists DMIPrePrints';
    $result = mysqli_query($db_connect, $query) or die('Impossibile creare schema');

    #SELEZIONE SCHEMA
    mysqli_select_db($db_connect, 'DMIPrePrints') or die('Could not select database');

    ##CREAZIONE TABELLE
    #AUTORI contiene tutti i possibili utenti del servizio (professori o altri ruoli)
    $query = 'CREATE TABLE if not exists AUTORI (uid VARCHAR(9) PRIMARY KEY, nome VARCHAR (50) NOT NULL, cognome VARCHAR(50) NOT NULL)';
    $result = mysqli_query($db_connect, $query) or die('Query failed: ' . mysqli_error());

    #PRINTS contiene le informazioni sui preprint memorizzati, il campo TIMESTAMP contiene l'istante dell'ultima MODIFICA, il campo data_inserimento la data di inserimento originale (con formato '05-05-22 11:16:33')
    $query = 'CREATE TABLE if not exists PRINTS (id_PRINTS INT NOT NULL AUTO_INCREMENT PRIMARY KEY, titolo VARCHAR(100) NOT NULL, autore VARCHAR(100) NOT NULL,abstract VARCHAR(10000) NOT NULL, percorso VARCHAR(500) NOT NULL, timestamp TIMESTAMP, data_inserimento DATETIME NOT NULL, anno int NOT NULL, approvato TINYINT(1) default 0 NOT NULL, FOREIGN KEY (autore) REFERENCES AUTORI(uid))';
    $result = mysqli_query($db_connect, $query) or die('Query failed: ' . mysqli_error());


    #CHIUSURA CONNESSIONE SERVER DB
    mysqli_close($db_connect) or die('problema chiusura connessione db');
    echo 'chiusa connessione db';
    return $result;
}

?>