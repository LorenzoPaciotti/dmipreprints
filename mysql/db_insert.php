<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/dmipreprints/'.'mysql/db_conn.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/dmipreprints/'.'authorization/sec_sess.php';
##INSERIMENTO PAPER
function inserisciPaper($titolo, $autore, $abstract, $nome_file, $data, $anno) {
    global $db_connect;
    connettiDBManager();

    #selezione dello schema DMIPrePrints
    mysqli_select_db($db_connect, 'DMIPrePrints') or die('Could not select database');
    
    //controllo autore presente
    $query = "select count(*) from AUTORI where uid = '".$autore."'";
    $result = mysqli_query($db_connect, $query) or die('\n\nQuery failed: ' . mysqli_error() . $query);
    $row = mysqli_fetch_array($result,MYSQLI_NUM);
    mysqli_free_result($result);
    if($row[0] == 0){
        echo '#INSERIMENTO AUTORE NON PRESENTE#';
        sec_session_start();
        $nome = $_SESSION['nome'];
        print "\$nome = " . $nome . "\n";

        $uid = $_SESSION['uid'];
        print "\$uid = " . $uid . "\n";

        //insert nuovo autore
        $query = "insert into AUTORI (uid, nome) values ('".$uid."','".$nome."')";
        $result = mysqli_query($db_connect, $query) or die('\n\nQuery failed: ' . mysqli_error($db_connect) . $query);
    }
    echo '::::::::::::inserimento prints::::::';
    $query = "INSERT INTO PRINTS(titolo,autore,abstract,nome_file,data_inserimento,anno) values ('" . $titolo . "','" . $autore . "','" . $abstract . "','" . $nome_file . "','" . $data . "'," . $anno . ")";
    $result = mysqli_query($db_connect, $query) or die('\n\nQuery failed: ' . mysqli_error($db_connect) . $query);
    print mysqli_errno($db_connect) . "\n";
    print mysqli_error($db_connect);
    
    
    echo ':::FINE DB_INSERT:::';
    return $result;
}

?>