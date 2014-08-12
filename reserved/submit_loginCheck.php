<?php
if(isset($_POST['uid']) && isset($_POST['pw'])){
    $filteredUID = filter_input(INPUT_POST, 'uid', FILTER_SANITIZE_SPECIAL_CHARS);
    $filteredPW = filter_input(INPUT_POST, 'pw', FILTER_SANITIZE_SPECIAL_CHARS);

    require_once getcwd().'/../authorization/auth.php';
    if(LDAPAuth($filteredUID)){
        if(RADIUSAuth($filteredUID,$filteredPW)){
            //pannello utente o amm
        }
    }
    
}else{
    print_r ($_POST . "\n");

    echo 'DEBUG: parametri POST non impostati';
}






?>