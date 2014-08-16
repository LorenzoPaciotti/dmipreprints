<?php

if (isset($_POST['uid']) && isset($_POST['pw'])) {
    $filteredUID = filter_input(INPUT_POST, 'uid', FILTER_SANITIZE_SPECIAL_CHARS);
    $filteredPW = filter_input(INPUT_POST, 'pw', FILTER_SANITIZE_SPECIAL_CHARS); //la password di ateneo può contenere car speciali

    require_once getcwd() . '/../authorization/auth.php';
    $filteredUID = "rz690001"; //TEST TEST TEST
    $output_ldap = LDAPAuth($filteredUID);
    print_r($output_ldap[0]['sn']) ;
    if ($output_ldap['count'] == 1) {
        print "autorizzazione OK";
        //TEST
        session_start();
        $_SESSION['logged_user'] = true;
        $_SESSION['uid'] = $filteredUID;
        $_SESSION['nome'] = $output_ldap[0]['sn'][0];
         //TEST
        if (RADIUSAuth($filteredUID, $filteredPW)) {
            print "autenticazione OK";
            // pannello utente o amm
            // e parte la sessione
        } else {
            echo "\nNO autenticazione\n";
        }
    } else {
        echo "\nNO autorizzazione\n";
    }
} else {
    echo 'DEBUG: parametri POST non impostati';
}
?>