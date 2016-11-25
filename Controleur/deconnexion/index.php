<?php 
session_start();

// Suppression des variables de session et de la session
$_SESSION = array();
session_destroy();

// Suppression des cookies de connexion automatique
if (!isset($_POST['connexion_auto'])) {
    setcookie('pseudo', '');
    setcookie('pass_hache', '');
}

header("Location: vue/connexion/index.php");