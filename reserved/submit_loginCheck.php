<?php

if (isset($_POST['uid']) && isset($_POST['pw'])) {
    $filteredUID = filter_input(INPUT_POST, 'uid', FILTER_SANITIZE_SPECIAL_CHARS);
    print $filteredUID . "\n";

    $filteredPW = filter_input(INPUT_POST, 'pw', FILTER_SANITIZE_SPECIAL_CHARS); //la password di ateneo può contenere car speciali
    print $filteredPW . "\n";


    require_once getcwd() . '/../authorization/auth.php';
    if (LDAPAuth($filteredUID)) {
        print "autorizzazione OK";
        //TEST
        session_start();
        $_SESSION['logged_user'] = true;
        //TEST
        if (RADIUSAuth($filteredUID, $filteredPW)) {
            print "autenticazione OK";
            // pannello utente o amm
            // e parte la sessione
        } else {
            print "NO autenticazione\n";
        }
    } else {
        print "NO autorizzazione\n";
    }
} else {
    print_r($_POST . "\n");

    echo 'DEBUG: parametri POST non impostati';
}
?>