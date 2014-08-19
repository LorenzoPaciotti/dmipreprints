<?php
require_once getcwd().'/../mysql/db_select.php';
require_once 'main_tabella.php';

if (isset($_POST['query']) && $_POST['query']!=''){
    //interrogaPerAnno($anno, $moderatore)
    stampaTabella(interrogaPerAnno($_POST['query']),1);
}else{
    print_r ('Invalid query');
}
?>