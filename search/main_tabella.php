<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/tabelle.css">
    </head>
</html>
<?php

function stampaRigaLinkPDF($nome_file) {
    print_r('<a href="download/download.php?file=' . $nome_file . '">PDF</a>');
}

function stampaTabella($resultPerAnno) {
    echo '<table class="tabelle">';
    echo '<tr>';
    echo '<td>';
    echo 'titolo';
    echo '</td>';
    echo '<td>';
    echo 'autore';
    echo '</td>';
    echo '<td>';
    echo 'data';
    echo '</td>';
    echo '<td>';
    echo 'PDF';
    echo '</td>';
    echo '</tr>';
    while ($row = mysqli_fetch_array($resultPerAnno)) {
        echo '<tr>';
        echo '<td>';
        print_r($row['titolo']);
        echo '</td>';
        echo '<td>';
        print_r($row['autore']);
        echo '</td>';
        echo '<td>';
        print_r($row['data_inserimento']);
        echo '</td>';
        echo '<td>';
        stampaRigaLinkPDF($row['nome_file']);
        echo '</td>';
        echo '</tr>';
    }
    echo '</table>';
}
?>