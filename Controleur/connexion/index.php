<?php
include_once("modele/connexion/check_identifiants.php");

$pseudo = "";
if (isset($_POST['pseudo'])) {
    $pseudo = htmlspecialchars($_POST['pseudo']);
} else if (isset($_COOKIE['pseudo'])) {
    $pseudo = htmlspecialchars($_COOKIE['pseudo']);
}

$pass_hache = "";
if (isset($_POST['pass'])) {
    $pass_hache = htmlspecialchars(sha1($_POST['pass']));
} else if (isset($_COOKIE['pass_hache'])) {
    $pass_hache = htmlspecialchars($_COOKIE['pass_hache']);
}

if (!(check_id($pseudo, $pass_hache))) {
    header("Location: vue/connexion/index.php?identifiant=erreur");
} else {
    session_start();
    $_SESSION['id'] = check_id($pseudo, $pass_hache)['id'];
    $_SESSION['pseudo'] = $pseudo;
    if (isset($_POST['connexion_auto'])) {
        setcookie('pseudo', $pseudo, time() + 365*24*3600, null, null, false, true);
        setcookie('pass_hache', $pass_hache, time() + 365*24*3600, null, null, false, true);
    }
    header("Location: vue/deconnexion/index.php");    
}
