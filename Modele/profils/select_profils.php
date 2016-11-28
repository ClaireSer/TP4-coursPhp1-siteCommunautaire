<?php

function select_profils() {
    global $bdd;
    $req = $bdd->query('SELECT pseudo, email, date_inscription FROM membres ');
    $req->execute();
    while ($donnees = $req->fetch()) {
        echo '<li>Pseudo : ' . $donnees['pseudo'] . ', email : ' . $donnees['email'] . ', date d\'inscription : ' . $donnees['date_inscription'] . '</li>';
    }
}