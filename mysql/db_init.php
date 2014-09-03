<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/dmipreprints/'.'mysql/db_conn.php';

CreaDB();


function CreaDB() {
    global $db_connect;
    connettiDBManager();

    #CREAZIONE DB
    $query = 'CREATE DATABASE if not exists DMIPrePrints';
    $result = mysqli_query($db_connect, $query) or die('Impossibile creare schema');

    #SELEZIONE SCHEMA
    mysqli_select_db($db_connect, 'DMIPrePrints') or die('Impossibile selezionare lo schema');

    ##CREAZIONE TABELLE
    #AUTORI contiene tutti i possibili utenti del servizio (professori o altri ruoli) (la tabella si auto-aggiorna)
    $query = 'CREATE TABLE if not exists AUTORI (uid VARCHAR(10) PRIMARY KEY, nome VARCHAR (80) NOT NULL)';
    $result = mysqli_query($db_connect, $query) or die('Query failed: ' . mysqli_error($db_connect));
    $query = 'ALTER TABLE AUTORI AUTO_INCREMENT = 100';#numero di partenza di id
    $result = mysqli_query($db_connect, $query) or die('Query failed: ' . mysqli_error($db_connect));

    #PRINTS contiene le informazioni sui preprint memorizzati, il campo TIMESTAMP contiene l'istante dell'ultima MODIFICA, il campo data_inserimento la data di inserimento originale (con formato '05-05-22 11:16:33')
    $query = 'CREATE TABLE if not exists PRINTS (id_PRINTS INT NOT NULL AUTO_INCREMENT PRIMARY KEY, titolo VARCHAR(80) NOT NULL, autore VARCHAR(10) NOT NULL,abstract VARCHAR(1200) NOT NULL, nome_file VARCHAR(100) NOT NULL, timestamp TIMESTAMP, data_inserimento DATETIME NOT NULL, anno int(4) NOT NULL, approvato TINYINT(1) default 0 NOT NULL, FOREIGN KEY (autore) REFERENCES AUTORI(uid))';
    $result = mysqli_query($db_connect, $query) or die('Query failed: ' . mysqli_error($db_connect));
    $query = 'ALTER TABLE AUTORI AUTO_INCREMENT = 1000';#numero di partenza di id
    $result = mysqli_query($db_connect, $query) or die('Query failed: ' . mysqli_error($db_connect));

    #CHIUSURA CONNESSIONE SERVER DB
    mysqli_close($db_connect) or die('problema chiusura connessione db, TUTTO OK');
    echo 'chiusa connessione db';
    return $result;
}

?>
