<?php
if (isset($_POST['valider'])){
    //récupération des données
    $nom = $_POST['nom';]
    $email = $_POST['email';]
    $message = $_POST['message$message'];

    echo "$nom $email $message";
}