<html>
    <head>
                <link rel="stylesheet" type="text/css" href="css/tabelle.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
    </head>
</html>
<?php

function stampaRigaLinkPDF($nome_file) {
    print_r('<a href="download/download.php?file=' . $nome_file . '">PDF</a>');
}

function stampaTabella($resultPerAnno) {
    echo 'tabella';
    echo '<table class="tabelle">';
    while ($row = mysqli_fetch_array($resultPerAnno)) {
        echo '<tr>';
        echo '<td>';
        print_r($row['timestamp']);
        echo '</td>';
        echo '<td>';
        stampaRigaLinkPDF($row['nome_file']);
        echo '</td>';
        echo '</tr>';
    }
    echo '</table>';
}

?>