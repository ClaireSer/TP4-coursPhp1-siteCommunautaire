<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon site communautaire</title>
	    <link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body style="text-align:center;">
        <h1>Votre inscription s'est réalisée avec succès !</h1>
        <h2>Connectez-vous dès maintenant !</h2>
 
        <form action="../../membres_connexion.php" method="post">
            <strong>Pseudo :</strong> <input type="text" name="pseudo" <?php if (isset($_COOKIE['pseudo'])) 'value=' . $_COOKIE['pseudo'] ?> /> <br/>
            <strong>Mot de passe :</strong> <input type="password" name="pass" <?php if (isset($_COOKIE['pass_hache'])) 'value=' . $_COOKIE['pass_hache'] ?> /><br/>
            <strong>Connexion automatique :</strong> <input type="checkbox" name="connexion_auto" /><br/>

            <input type="submit" value="Se connecter" />            
        </form>
        <div>
            <?php if (isset($_GET['identifiant'])) echo 'Mauvais identifiant ou mot de passe !';?>
        </div>
    </body> 
</html> 