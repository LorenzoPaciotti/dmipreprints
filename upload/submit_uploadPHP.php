<?php
// Example of accessing data for a newly uploaded file
$fileName = $_FILES["userfile"]["name"]; 
$fileTmpLoc = $_FILES["userfile"]["tmp_name"];
// Path and file name
$pathAndName = "/home/lorenzo/uploads/".$fileName;
// Run the move_uploaded_file() function here
$moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
echo "$fileTmpLoc</br>";
echo "$pathAndName</br>";
print_r(error_get_last());
echo "</br>";
// Evaluate the value returned from the function if needed
if ($moveResult == true) {
    echo "File has been moved from " . $fileTmpLoc . " to" . $pathAndName;
} else {
     echo "ERROR: File not moved correctly";
}
?>