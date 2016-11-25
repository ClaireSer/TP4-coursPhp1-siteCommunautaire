<?php 

function insert_membre($pseudo, $pass_hache, $email) {
    global $bdd;
    $req = $bdd->prepare('INSERT INTO membres(pseudo, pass, email, date_inscription) VALUES(:pseudo, :pass, :email, CURDATE())');
    $req->execute(array(
        'pseudo' => $pseudo,
        'pass' => $pass_hache,
        'email' => $email
        ));
}

function pseudo_exists($pseudo) {
    global $bdd;
    $req = $bdd->prepare('SELECT pseudo FROM membres WHERE pseudo = ?');
    $req->execute(array($pseudo));
    return ($donnees = $req->fetch());
}