<?php

include '../mysql/db_insert.php';

// lettura dati dall'array $_FILES
$fileName = $_FILES["userfile"]["name"];
$fileTmpLoc = $_FILES["userfile"]["tmp_name"];
// Path e filename
$pathAndName = "/home/lorenzo/uploads/" . $fileName;
// spostamento del file inviato alla cartella di storage
$moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
print_r(error_get_last());


##DEBUG
if ($moveResult == true) {
    echo "\nDEBUG: file spostato correttamente da " . $fileTmpLoc . " a " . $pathAndName;
    //INSERIMENTO IN DATABASE
    $titolo = $_POST["titolo"];
    $autore = $_POST["uid"];
    ###DEBUG
    $autore = 'testuid';
    $abstract = $_POST["abstract"];

    inserisciPaper($titolo, $autore, $abstract, $pathAndName);
} else {
    echo "\nERROR: file non spostato correttamente, non inserita riga database\n";
}
##
?>