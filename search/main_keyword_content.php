<?php
require_once getcwd().'/../mysql/db_select.php';
require_once 'main_tabella.php';

if (isset($_POST['query']) && $_POST['query']!=''){
    stampaTabella(interrogaPerKeyword($_POST['query']));
}
?>