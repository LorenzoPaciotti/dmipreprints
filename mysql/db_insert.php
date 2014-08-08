<?php

#CHECK SESSIONE
##END CHECK SESSIONE
require_once getcwd().'/../mysql/db_conn.php';

function pulisciQuery($query) {
    
}

##INSERIMENTO PAPER

function inserisciPaper($titolo, $autore, $abstract, $nome_file, $data, $anno) {
    global $db_connect;
    connettiDBManager();

    #selezione dello schema DMIPrePrints
    mysqli_select_db($db_connect, 'DMIPrePrints') or die('Could not select database');

    $query = "INSERT INTO PRINTS(titolo,autore,abstract,nome_file,data_inserimento,anno) values ('" . $titolo . "','" . $autore . "','" . $abstract . "','" . $nome_file . "','" . $data . "','" . $anno . "')";

    pulisciQuery($query);
    $result = mysqli_query($db_connect, $query) or die('\n\nQuery failed: ' . mysqli_error() . $query);
}

?>