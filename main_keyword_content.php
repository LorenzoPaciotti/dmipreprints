<?php
include_once 'mysql/db_select.php';
include_once 'main_tabella.php';

if (isset($_POST['query'])){
    stampaTabella(interrogaPerKeyword($_POST['query']));
}
?>