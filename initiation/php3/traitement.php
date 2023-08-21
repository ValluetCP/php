<?php
if (isset($_POST['valider'])){
    //récupération des données
    $nom = htmlspecialchars ($_POST['nom']);
    $email = htmlspecialchars ($_POST['email']);
    $message = htmlspecialchars ($_POST['message']);

    //htmlspecialchars : pour prévenir les attaques de type XSS et pour échapper
    echo "<pre>";
    print_r ($_FILES);
    echo "</pre>";

    $imgName = $_FILES ['image'] ['name']; // nom de l'image
    $tmpName = $_FILES ['image'] ['tmp_name']; // localisation temporaire sur le server

    // $_SERVER['DOCUMENT_ROOT'] pointe à la racine du server c'est à dire le dossier principal (dossier racine)
    $destination = $_SERVER['DOCUMENT_ROOT'].'/php/initiation/php3/images/'.$imgName;// destination finale de mon image
    echo $destination;
    move_uploaded_file($tmpName,$destination);

    echo ("<p>".$nom. " " .$email. " " . $message."</p>");
}