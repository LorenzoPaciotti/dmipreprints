<?php
require_once getcwd().'/../mysql/db_conn.php';

function editPaper($id_PAPER){
    global $db_connect;
    connettiDBManager();
    
    mysqli_select_db($db_connect, 'DMIPrePrints') or die('Could not select database');
    
    $query = "UPDATE PRINTS set    ".'where id_PRINTS='.$id_PAPER;
    
    pulisciQuery($query);
    $result = mysqli_query($db_connect, $query) or die('\n\nQuery failed: ' . mysqli_error() . $query);
    return $result;
}