<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon site communautaire</title>
	    <link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <h1>Bienvenue sur mon site communautaire !</h1>
        <h2>Inscription :</h2>
 
        <form action="../../membres_inscription.php" method="post">
            <strong>Pseudo :</strong> <input type="text" name="pseudo" /> 
            <?php
            if (isset($_GET['pseudo'])) {
                echo 'Le pseudo existe déjà, veuillez en choisir un autre.';
            }?> <br/>
            <strong>Mot de passe :</strong> <input type="password" name="pass" /><br/>
            <strong>Retapez votre mot de passe :</strong> <input type="password" name="passbis" />
            <?php
            if (isset($_GET['pass'])) {
                echo 'Tapez un mot de passe identique.';
            }?> <br/>
            <strong>Adresse email :</strong> <input type="email" name="email" />
            <?php
            if (isset($_GET['mail'])) {
                echo 'Le format de l\'adresse email n\'est pas valide.';
            }?> <br/>
            <input type="submit" value="S'inscrire" />            
        </form>
        <div>
            <?php
            if (isset($_GET['champ'])) {
                echo 'Au moins un champ est vide';
            }?>
        </div>
    </body> 
</html> 