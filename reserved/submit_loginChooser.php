<?php
//INIT SESSIONE
session_start();
if (isset($_SESSION['logged_user'])) {
    //non mostrare login perché è già autenticato
    echo caso1;

    if (isset($_SESSION['logged_mod'])) {
        //sessione moderatore
        echo caso2;
    }
} else {
    //deve fare login
    include_once getcwd().'/reserved/submit_loginForm.php';
}
?>
