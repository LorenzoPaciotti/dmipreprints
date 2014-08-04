<?php

include_once 'mysql/db_conn.php';
connettiDBManager();
selezionaSchema();

$conteggioAnniDistinct = 'select distinct count(anno) from PRINTS';
$result = mysqli_query($db_connect, $conteggioAnniDistinct) or die(mysqli_error($db_connect));

function interrogaPerAnno($anno) {
    global $db_connect;
    $query = 'select * from PRINTS where anno=' . $anno;
    $result = mysqli_query($db_connect, $query) or die(mysqli_error($db_connect));
    mysqli_close($db_connect);
    return $result;
}
?>