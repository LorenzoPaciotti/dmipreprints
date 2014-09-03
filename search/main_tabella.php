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

function stampaLinkAbstract($id) {

    //$id = "'.$id.'";
    $tmp = 'onClick="visAbstract(' . $id . ')"';
    echo '<a href="#" class="apri-trg-overlay" data="modal1" ' . $tmp . ' >abstract</a>';
}

function stampaTabellaCompleta($data, $mod) {
    if (mysqli_num_rows($data) > 0) {
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
}

function stampaTabella($data) {
    if (mysqli_num_rows($data) > 0) {
        echo '<table class="tabelle">';
        echo '<tr>';
        echo '<td>';
        echo 'Title';
        echo '</td>';
        echo '<td>';
        echo 'Abstract';
        echo '</td>';
        echo '<td>';
        echo 'Author';
        echo '</td>';
        echo '<td>';
        echo 'Upload Date';
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
            stampaLinkAbstract($row['id_PRINTS']);
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
}

?>