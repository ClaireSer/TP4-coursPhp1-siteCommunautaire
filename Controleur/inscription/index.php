<?php

include_once('modele/inscription/insert_membre.php');

// Vérification de la validité des informations
$pseudo = "";
if (isset($_POST['pseudo'])) {
    $pseudo = htmlspecialchars($_POST['pseudo']);
}
$email = "";
if (isset($_POST['email'])) {
    $email = htmlspecialchars($_POST['email']);
}
$pass = "";
if (isset($_POST['pass'])) {
    $pass = htmlspecialchars($_POST['pass']);
}
$passbis = "";
if (isset($_POST['passbis'])) {
    $passbis = htmlspecialchars($_POST['passbis']);
}

if (empty($pseudo) OR empty($email) OR empty($pass) OR empty($passbis)) {
    header("Location: vue/inscription/index.php?champ=vide");      
} elseif (pseudo_exists($pseudo)) {
    header("Location: vue/inscription/index.php?pseudo=erreur");      
} elseif ($pass !== $passbis) {
    header("Location: vue/inscription/index.php?pass=erreur");      
} elseif (!preg_match("#^[a-z0-9.-_]+@[a-z0-9.-_]{2,}\.[a-z]{2,4}$#", $email)) {
    header("Location: vue/inscription/index.php?mail=erreur");      
} else {
    // Hachage du mot de passe
    $pass_hache = sha1($_POST['pass']);
    // appel de la bdd
    insert_membre($pseudo, $pass_hache, $email);
    header('Location: vue/connexion/index.php');    
}
