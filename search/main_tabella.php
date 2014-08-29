<?php

function stampaRigaLinkPDF($nome_file) {
    print_r('<a href="download/download.php?file=' . $nome_file . '">PDF</a>');
}

function stampaApprovato($val) {
    if ($val === "1") {
        echo 'SI';
    } else {
        echo 'NO';
    }
}

function stampaButtonElimina($id) {
    echo '<button class="bottoni" id=elim#"' . $id . '">Elimina' . "</button>";
}

function stampaButtonApprova($id) {
    echo '<button class="bottoni" id=appr#"' . $id . '">Approva' . "</button>";
}

function stampaTabellaCompleta($data, $mod) {
    if ($mod === 1) {//mod
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
        echo 'Approvato';
        echo '</td>';
        echo '<td>';
        echo 'Elimina';
        echo '</td>';
        echo '<td>';
        echo 'Approva';
        echo '</td>';
        echo '</tr>';
        while ($row = mysqli_fetch_array($data)) {
            echo '<tr>';
            echo '<td>';
            print_r($row['titolo']);
            echo '</td>';
            echo '<td>';
            print_r($row['nome']);
            echo '</td>';
            echo '<td>';
            print_r($row['data_inserimento']);
            echo '</td>';
            echo '<td>';
            stampaRigaLinkPDF($row['nome_file']);
            echo '</td>';
            echo '<td>';
            stampaApprovato($row['approvato']);
            echo '</td>';
            echo '<td>';
            stampaButtonElimina($row['id_PRINTS']);
            echo '</td>';
            echo '<td>';
            stampaButtonApprova($row['id_PRINTS']);
            echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {//user
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
        echo 'Approvato';
        echo '</td>';
        echo '<td>';
        echo 'Operazioni';
        echo '</td>';
        echo '</tr>';
        while ($row = mysqli_fetch_array($data)) {
            echo '<tr>';
            echo '<td>';
            print_r($row['titolo']);
            echo '</td>';
            echo '<td>';
            print_r($row['nome']);
            echo '</td>';
            echo '<td>';
            print_r($row['data_inserimento']);
            echo '</td>';
            echo '<td>';
            stampaRigaLinkPDF($row['nome_file']);
            echo '</td>';
            echo '<td>';
            stampaApprovato($row['approvato']);
            echo '</td>';
            echo '<td>';
            stampaButtonElimina($row['id_PRINTS']);
            echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
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
        print_r($row['nome']);
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