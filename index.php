<?php

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=e, initial-scale=1.0">
    <title>exo-binome</title>
    <link rel="stylesheet" href="uploadPreview/style.css">
</head>

<body>
    <div>

        <p>Veuillez choisir une image :</p>

        <form action="index.php" method="post" enctype="multipart/form-data">

            <div>
                <input type="file" name="fileToUpload" id="fileToUpload">
            </div>
            <div class="button">
                <button id="submit" type="submit">UPLOAD</button>
            </div>
        </form>
        <div>
            <img id="preview" src="img/">
        </div>
    </div>

    <?php
    // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
    if (isset($_FILES['fileToUpload']) and $_FILES['fileToUpload']['error'] == 0) {
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['fileToUpload']['size'] <= 1024000) {
            // Testons si l'extension est autorisée
            $infosfichier = pathinfo($_FILES['fileToUpload']['name']);
            $extension_upload = $infosfichier['extension'];
            $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png', 'pdf');
            if (in_array($extension_upload, $extensions_autorisees)) {
                // On peut valider le fichier et le stocker définitivement

                move_uploaded_file($_FILES['fileToUpload']['tmp_name'], 'img/' . basename($_FILES['fileToUpload']['name']));

                echo "L'envoi a bien été effectué !";
            } else {
                echo "Le dossier n'a pas été transmit.";
            }
        }
    } 
    ?>


<script src="uploadPreview/script.js"></script>
</body>

</html>