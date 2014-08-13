<?php

require_once getcwd().'/../mysql/db_insert.php';

// lettura dati dall'array $_FILES
$fileName = $_FILES["userfile"]["name"];
$fileTmpLoc = $_FILES["userfile"]["tmp_name"];
// Path e filename
$pathAndName = "/home/lorenzo/uploads/" . $fileName;
// spostamento del file inviato alla cartella di storage
$moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);



##DEBUG
if ($moveResult == true) {
    echo "\nDEBUG: file spostato correttamente da " . $fileTmpLoc . " a " . $pathAndName;
    //INSERIMENTO IN DATABASE
    $titolo = $_POST["titolo"];
    $autore = $_POST["uid"];
    ###DEBUG
    $autore = 'testuid';
    $abstract = $_POST["abstract"];
    $data = date("Y-m-d H:i:s");
    $anno = date("Y");

    inserisciPaper($titolo, $autore, $abstract, $fileName, $data, $anno);
} else {
    echo "\nERRORE: file non spostato correttamente, non inserita riga database\n";
    print_r(error_get_last());
}
##
?>