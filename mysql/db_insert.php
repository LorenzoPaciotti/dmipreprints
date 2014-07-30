<?php

#CHECK SESSIONE
##END CHECK SESSIONE
include 'db_conn.php';

##INSERIMENTO PAPER

function inserisci_paper($titolo, $autore, $abstract, $file_path) {
    global $db_connect;
    connettiDBManager();

    $query = 'INSERT INTO PRINTS(titolo,autore,abstract,percorso) values () ';
    $result = mysqli_query($db_connect, $query) or die('Query failed: ' . mysqli_error());
}
