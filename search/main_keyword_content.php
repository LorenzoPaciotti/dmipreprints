<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/dmipreprints/' . 'mysql/db_select.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/dmipreprints/' . 'search/main_tabella.php';

if (isset($_POST['query']) && $_POST['query'] != '') {
    stampaTabella(interrogaPerKeyword($_POST['query']));
}
?>