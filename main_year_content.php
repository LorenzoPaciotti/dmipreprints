<?php
include_once 'mysql/db_select.php';
include_once 'main_tabella.php';

if (isset($_POST['query']) && $_POST['query']!=''){
    stampaTabella(interrogaPerAnno($_POST['query']));
}else{
    echo 'Invalid query';
}
?>