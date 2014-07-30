<?php
include '../mysql/db_insert.php';

// lettura dati dall'array $_FILES
$fileName = $_FILES["userfile"]["name"]; 
$fileTmpLoc = $_FILES["userfile"]["tmp_name"];
// Path e filename
$pathAndName = "/home/lorenzo/uploads/".$fileName;
// spostamento del file inviato alla cartella di storage
$moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
print_r(error_get_last());


##DEBUG
if ($moveResult == true) {
    echo "\nDEBUG: File has been moved from " . $fileTmpLoc . " to " . $pathAndName;
} else {
     echo "\nERROR: File not moved correctly\n";
}
##

//INSERIMENTO IN DATABASE

$titolo = $_POST["titolo"];
$autore = $_POST["uid"];
$abstract = $_POST["abstract"];

inserisciPaper($titolo, $autore, $abstract, $pathAndName);
?>