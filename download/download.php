<?php

if (isset($_POST['path'])) {
    $filename = filter_input($_POST['path']); //path assoluto al file sul server
    header('Pragma: public');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Cache-Control: private', false);
    header('Content-Type: application/pdf');

    header('Content-Disposition: attachment; filename="' . basename($filename) . '";');
    header('Content-Transfer-Encoding: binary');
    header('Content-Length: ' . filesize($filename));

    readfile($filename);

    exit;
}
?>