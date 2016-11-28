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
        
    <body>
        <h1 style="text-align:center;">Voici la liste de tous les membres :</h1>
        <ul>
        <?php select_profils(); ?>
        </ul>
    </body> 
</html> 

