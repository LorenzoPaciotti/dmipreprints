<?php
include_once 'mysql/db_select.php';
include_once 'main_tabella.php';

//TEST
$resultPerAnno = interrogaPerAnno(2014);
stampaTabella($resultPerAnno);

?>