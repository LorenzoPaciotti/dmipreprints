<?php

#CHECK SESSIONE
##END CHECK SESSIONE
include 'db_conn.php';

##INSERIMENTO PAPER

function inserisci_paper($titolo, $autore, $abstract, $file_path) {
    global $db_connect;
    #db_conn.php -> connettiDBManager()
    connettiDBManager();
    
    #selezione dello schema DMIPrePrints
    mysqli_select_db($db_connect,'DMIPrePrints') or die('Could not select database');
    
    $query = 'INSERT INTO PRINTS(titolo,autore,abstract,percorso) values ('.$titolo.','.$autore.','.$abstract.','.$file_path.')';
    $result = mysqli_query($db_connect, $query) or die('Query failed: ' . mysqli_error());
    print $result;
}
