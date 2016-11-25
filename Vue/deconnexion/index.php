<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon site communautaire</title>
	    <link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body style="text-align:center;">
        <h1>Vous êtes connecté !</h1>
        
        <?php 
        if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
        {
            echo 'Bonjour ' . $_SESSION['pseudo'] . ' !!! <br/>';
            echo 'cookiePseudo : ' . $_COOKIE['pseudo'] . '<br/>';
            echo 'cookiePass : ' . $_COOKIE['pass_hache'] . '<br/>';            
        }?> 
        
        <form action="../../membres_deconnexion.php" method="post">
            <input type="submit" value="Se déconnecter" />            
        </form>
    </body> 
</html> 

