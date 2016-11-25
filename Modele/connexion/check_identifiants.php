<?php 

// Vérification des identifiants
function check_id($pseudo, $pass_hache) {
    global $bdd;
    $req = $bdd->prepare('SELECT id FROM membres WHERE pseudo = :pseudo AND pass = :pass');
    $req->execute(array(
        'pseudo' => $pseudo,
        'pass' => $pass_hache));

    return ($resultat = $req->fetch());
}
