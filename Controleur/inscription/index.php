<?php

include_once('../../modele/inscription/insert_membre.php');

// Vérification de la validité des informations
$pseudo = htmlspecialchars(isset($_POST['pseudo']));
$email = htmlspecialchars(isset($_POST['email']));
$pass = htmlspecialchars(isset($_POST['pass']));
$passbis = htmlspecialchars(isset($_POST['passbis']));


$req = $bdd->prepare('SELECT pseudo FROM membres WHERE pseudo = ?');
$req->execute(array($pseudo));

if (!isset($pseudo) OR !isset($mail) OR !isset($pass) OR !isset($passbis)) {
    header('Location: ../../vue/inscription/index.php?champ=vide');        
} elseif ($donnees = $req->fetch()) {
    header('Location: ../../vue/inscription/index.php?pseudo=erreur');        
} elseif ($pass !== $passbis) {
    header('Location: ../../vue/inscription/index.php?pass=erreur');
} elseif (!preg_match("#^[a-z0-9.-_]+@[a-z0-9.-_]{2,}\.[a-z]{2,4}$#", $email)) {
    header('Location: ../../vue/inscription/index.php?mail=erreur');
} else {
    // Hachage du mot de passe
    $pass_hache = sha1($_POST['pass']);
    // appel de la bdd
    inscription();
    include_once('vue/inscription/index.php');
    header('Location: vue/inscription.index.php');    
}