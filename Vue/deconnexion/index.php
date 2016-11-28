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
        }
        if (isset($_COOKIE['pseudo']) AND isset($_COOKIE['pass_hache']))
        {
            echo 'cookiePseudo : ' . $_COOKIE['pseudo'] . '<br/>';
            echo 'cookiePass : ' . $_COOKIE['pass_hache'] . '<br/>';
        }
        ?> 
        
        <form action="cible_avatar.php" method="post" enctype="multipart/form-data">
            <p>
                Votre avatar :<br />
                <input type="file" name="monavatar" /><br />
                <input type="submit" value="Envoyer le fichier" />
            </p>
        </form>

        <?php
        if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])) {
            echo '<p><a href="../../profils.php">Profil des membres</a></p>';
        }
        ?>
        
        <form action="../../membres_deconnexion.php" method="post">
            <input type="submit" value="Se déconnecter" />            
        </form>
    </body> 
</html> 

