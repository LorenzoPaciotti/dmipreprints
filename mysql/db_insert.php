<?php

#CHECK SESSIONE
##END CHECK SESSIONE
include 'db_conn.php';

function pulisciQuery($query){
    
}

##INSERIMENTO PAPER
function inserisciPaper($titolo, $autore, $abstract, $nome_file, $data) {
    global $db_connect;
    #db_conn.php -> connettiDBManager()
    connettiDBManager();
    
    #selezione dello schema DMIPrePrints
    mysqli_select_db($db_connect,'DMIPrePrints') or die('Could not select database');
    
    $query = "INSERT INTO PRINTS(titolo,autore,abstract,nome_file,data_inserimento) values ('".$titolo."','".$autore."','".$abstract."','".$nome_file."','".$data."')";
    
    pulisciQuery($query);
    $result = mysqli_query($db_connect, $query) or die('\n\nQuery failed: ' . mysqli_error() . $query);
}
?>