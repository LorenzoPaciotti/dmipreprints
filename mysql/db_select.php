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

function recuperaAbstract($id_paper){
    connettiDBManager();
    selezionaSchema();
    global $db_connect;
    $query = 'select abstract from PRINTS where id_PRINTS='.$id_paper;
    $query = pulisciQuery($query);
    $result = mysqli_query($db_connect, $query) or die(mysqli_error($db_connect));
    mysqli_close($db_connect);
    if($result){
        $row = mysqli_fetch_array($result);
        return ($row['abstract']);
    }
    echo 'errore recuperaAbstract';
    return 'non disponibile';
}

function recuperaTitolo($id_paper){
    connettiDBManager();
    selezionaSchema();
    global $db_connect;
    $query = 'select titolo from PRINTS where id_PRINTS='.$id_paper;
    $query = pulisciQuery($query);
    $result = mysqli_query($db_connect, $query) or die(mysqli_error($db_connect));
    mysqli_close($db_connect);
    if($result){
        $row = mysqli_fetch_array($result);
        return ($row['titolo']);
    }
    echo 'errore recuperaTitolo';
    return 'non disponibile';
}

function interrogaPerAnno($anno, $moderatore) {
    connettiDBManager();
    selezionaSchema();
    global $db_connect;
    $query = 'select * from PRINTS join AUTORI on PRINTS.autore = AUTORI.uid where anno=' . $anno;
    
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
    $query = 'select * from PRINTS join AUTORI on PRINTS.autore = AUTORI.uid where (titolo LIKE ' . $keyword . ' OR abstract LIKE ' . $keyword . ' OR autore LIKE ' . $keyword.') AND approvato = 1';
    
    //query per moderatore
    if ($moderatore){
        $query = 'select * from PRINTS join AUTORI on PRINTS.autore = AUTORI.uid where titolo LIKE ' . $keyword . ' OR abstract LIKE ' . $keyword . ' OR autore LIKE ' . $keyword;
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
    $query = "select * from PRINTS join AUTORI on PRINTS.autore = AUTORI.uid where autore= '" . $uid ."'";
    $query = pulisciQuery($query);
    $result = mysqli_query($db_connect, $query) or die(mysqli_error($db_connect));
    mysqli_close($db_connect);
    return $result;
}

function interrogaPerIdPaper($id){
    connettiDBManager();
    selezionaSchema();
    global $db_connect;
    $query = "select * from PRINTS join AUTORI on PRINTS.autore = AUTORI.uid where id_PRINTS= '" . $id ."'";
    $query = pulisciQuery($query);
    $result = mysqli_query($db_connect, $query) or die(mysqli_error($db_connect));
    mysqli_close($db_connect);
    return $result;
}

function interrogaWhole(){
    connettiDBManager();
    selezionaSchema();
    global $db_connect;
    $query = "select * from PRINTS join AUTORI on PRINTS.autore = AUTORI.uid";
    $query = pulisciQuery($query);
    $result = mysqli_query($db_connect, $query) or die(mysqli_error($db_connect));
    mysqli_close($db_connect);
    return $result;
}

?>