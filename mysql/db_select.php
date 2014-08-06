<?php

include_once 'mysql/db_conn.php';
include_once 'mysql/db_sec.php';
connettiDBManager();
selezionaSchema();

function listaAnni(){
    global $db_connect;
    $query = 'select distinct(anno) from PRINTS';
    $query = pulisciQuery($query);
    echo $query;
    $result = mysqli_query($db_connect, $query) or die(mysqli_error($db_connect));
    mysqli_close($db_connect);
    return $result;
}

function interrogaPerAnno($anno) {
    global $db_connect;
    $query = 'select * from PRINTS where anno=' . $anno;
    $query = pulisciQuery($query);
    echo $query;
    $result = mysqli_query($db_connect, $query) or die(mysqli_error($db_connect));
    mysqli_close($db_connect);
    return $result;
}

function interrogaPerKeyword($keyword){
    global $db_connect;
    $keyword = '"%'.$keyword.'%"';
    $query = 'select * from PRINTS where titolo LIKE '.$keyword.' OR abstract LIKE '.$keyword.' OR autore LIKE '.$keyword;
    $query = pulisciQuery($query);
    echo $query;
    $result = mysqli_query($db_connect, $query) or die(mysqli_error($db_connect));
    mysqli_close($db_connect);
    return $result;
}
?>