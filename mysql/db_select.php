<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/dmipreprints/'.'mysql/db_conn.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/dmipreprints/'.'mysql/db_sec.php';


function listaAnni() {
    connettiDBManager();
    selezionaSchema();
    global $db_connect;
    $query = 'select distinct(anno) from PRINTS';
    $query = pulisciQuery($query);
    $result = mysqli_query($db_connect, $query) or die(mysqli_error($db_connect));
    mysqli_close($db_connect);
    return $result;
}

function interrogaPerAnno($anno, $moderatore) {
    connettiDBManager();
    selezionaSchema();
    global $db_connect;
    $query = 'select * from PRINTS where anno=' . $anno;
    
    //presentiamo al pubblico solo i paper approvati dal moderatore
    if (!$moderatore){
        $query = $query.' AND approvato=1';
    }
    
    $query = pulisciQuery($query);
    $result = mysqli_query($db_connect, $query) or die(mysqli_error($db_connect));
    mysqli_close($db_connect);
    return $result;
}

function interrogaPerKeyword($keyword, $moderatore) {
    connettiDBManager();
    selezionaSchema();
    global $db_connect;
    $keyword = '"%' . $keyword . '%"';
    $query = 'select * from PRINTS where (titolo LIKE ' . $keyword . ' OR abstract LIKE ' . $keyword . ' OR autore LIKE ' . $keyword.') AND approvato = 1';
    
    //query per moderatore
    $moderatore = 1; //TEST
    if ($moderatore){
        $query = 'select * from PRINTS where titolo LIKE ' . $keyword . ' OR abstract LIKE ' . $keyword . ' OR autore LIKE ' . $keyword;
    }
    
    $query = pulisciQuery($query, $moderatore);
    $result = mysqli_query($db_connect, $query) or die(mysqli_error($db_connect));
    mysqli_close($db_connect);
    return $result;
}

function interrogaPerUID($uid) {
    connettiDBManager();
    selezionaSchema();
    global $db_connect;
    $query = "select * from PRINTS where autore= '" . $uid ."'";
    $query = pulisciQuery($query);
    echo $query;
    $result = mysqli_query($db_connect, $query) or die(mysqli_error($db_connect));
    mysqli_close($db_connect);
    return $result;
}

function interrogaPerIdPaper($id){
    connettiDBManager();
    selezionaSchema();
    global $db_connect;
    $query = "select * from PRINTS where id_PRINTS= '" . $id ."'";
    $query = pulisciQuery($query);
    echo $query;
    $result = mysqli_query($db_connect, $query) or die(mysqli_error($db_connect));
    mysqli_close($db_connect);
    return $result;
}

function interrogaWhole(){
    connettiDBManager();
    selezionaSchema();
    global $db_connect;
    $query = "select * from PRINTS";
    $query = pulisciQuery($query);
    echo $query;
    $result = mysqli_query($db_connect, $query) or die(mysqli_error($db_connect));
    mysqli_close($db_connect);
    return $result;
}

?>