<?php
session_start();
if (isset($_SESSION['logged_user'])) {
    //sessione utente
    include_once getcwd() . '/reserved/controlPanel_user.php';
    if (isset($_SESSION['logged_mod'])) {
        //sessione moderatore
        include_once getcwd() . '/reserved/controlPanel_mod.php';
    }
} else {
    //deve fare login
    include_once getcwd() . '/reserved/submit_loginForm.php';
}
?>
