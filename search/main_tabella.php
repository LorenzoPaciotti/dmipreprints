<?php

function stampaRigaLinkPDF($nome_file) {
    print_r('<a href="download/download.php?file=' . $nome_file . '">PDF</a>');
}

function stampaApprovato($val) {
    if ($val == 1) {
        print YES;
    } else {
        print NO;
    }
}

function stampaTabellaCompleta($data) {
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
    echo '<td>';
    echo 'ACCEPTED';
    echo '</td>';
    echo '</tr>';
    while ($row = mysqli_fetch_array($data)) {
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

function stampaTabella($data) {
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
    while ($row = mysqli_fetch_array($data)) {
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