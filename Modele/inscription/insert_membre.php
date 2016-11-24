<?php 
try {
    $bdd = new PDO('mysql:host=localhost;dbname=TP4-membres;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));           
} catch(Exception $e) {
    die('Erreur : '.$e->getMessage());
}

function inscription() {
    // global $bdd;
    $req = $bdd->prepare('INSERT INTO membres(pseudo, pass, email, date_inscription) VALUES(:pseudo, :pass, :email, CURDATE())');
    $req->execute(array(
        'pseudo' => $pseudo,
        'pass' => $pass_hache,
        'email' => $email
        ));

    
}
