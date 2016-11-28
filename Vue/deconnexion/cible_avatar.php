<?php
// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['monavatar']) AND $_FILES['monavatar']['error'] == 0)
{
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['monavatar']['size'] <= 1000000)
        {
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($_FILES['monavatar']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($extension_upload, $extensions_autorisees))
                {
                        // Redimensionnement de l'image
                        $source = imagecreatefromjpeg($_FILES['monavatar']['tmp_name']); // La photo est la source
                        $destination = imagecreatetruecolor(200, 150); // On crée la miniature vide

                        // Les fonctions imagesx et imagesy renvoient la largeur et la hauteur d'une image
                        $largeur_source = imagesx($source);
                        $hauteur_source = imagesy($source);
                        $largeur_destination = imagesx($destination);
                        $hauteur_destination = imagesy($destination);

                        // On crée la miniature
                        imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);

                        // On enregistre la miniature sous le nom "mini_avatar.jpg"
                        imagejpeg($destination, "avatar/mini_avatar.jpg");

                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($source['tmp_name'], 'avatar/mini_avatar.jpg');
                        echo "L'envoi a bien été effectué !";
                }
        }
}
?>