<?php
include_once 'mysql/db_select.php';
include 'main_tabella.php';

$resultPerAnno = interrogaPerAnno(2014);
stampaTabella($resultPerAnno);

?>