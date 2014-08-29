<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/dmipreprints/' . 'mysql/db_insert.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/dmipreprints/' . 'authorization/sec_sess.php';
sec_session_start();

$allowed = array('pdf');
$filename = $_FILES['userfile']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
if (!in_array($ext, $allowed)) {
    echo 'estensione file non corretta, permessi solo file pdf';
} else {
    $titolo_fixed = trim($_POST["titolo"]);
    if(strlen($titolo_fixed)>10){
        $titolo_fixed = substr($titolo_fixed, 0, 10);
    }
    $fileName = date("Y-m-d_H-i-s_") . $titolo_fixed . '.pdf';
    $fileTmpLoc = $_FILES["userfile"]["tmp_name"];
    $pathAndName = getcwd() . "/uploads/" . $fileName;
    $moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
    print_r(error_get_last());


    if ($moveResult == true) {
        print_r("\nDEBUG: file spostato correttamente da " . $fileTmpLoc . " a " . $pathAndName);
        //INSERIMENTO IN DATABASE
        $titolo = $_POST["titolo"];
        $autore = $_SESSION["uid"];
        $abstract = $_POST["abstract"];
        $data = date("Y-m-d H:i:s");
        $anno = date("Y");

        inserisciPaper($titolo, $autore, $abstract, $fileName, $data, $anno);
        #TEST
        //header("Location: ../reserved.php");
    } else {
        echo "\nERRORE: file non spostato correttamente, non inserita riga database\n";
    }
}
##
?>