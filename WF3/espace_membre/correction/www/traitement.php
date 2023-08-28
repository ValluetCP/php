<?php
session_start();
require_once "database.php";
if(isset($_POST['valider'])){ // c'est pour l'inscription
    $email = $_POST['email'];
    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['mdp'];

    $mdpCrypt = password_hash($mdp, PASSWORD_DEFAULT);

    $imgName = $_FILES['photo']['name'];
    $tmp = $_FILES['photo']['tmp_name'];
    $destination = $_SERVER['DOCUMENT_ROOT'].'/img/'.$imgName;
    move_uploaded_file($tmp, $destination);
    // se connecter a la db
    $conn = dbConnexion();
    // preparer la requete
    $request = $conn->prepare("INSERT INTO membres (email, pseudo, mdp, profil_img) VALUES (?, ?, ?, ?)");
    // executer la requete
    try{
        $request->execute(array($email, $pseudo, $mdpCrypt, $imgName));
        // redirection vers une page de notre choix
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

// pour la connexion
if(isset($_POST['connexion'])){
    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['mdp'];
    // etablir la connexion avec la bd
    $connect = dbConnexion();
    // preparer la requete
    $connexionRequest = $connect->prepare("SELECT * FROM membres WHERE pseudo = ?");
    // executer la requete
    $connexionRequest->execute(array($pseudo));
    // recupere le resultat de la requete
    $utilisateur = $connexionRequest->fetch(PDO::FETCH_ASSOC); // fetch : convertir le resultat de la requete en tableau pour le manipuler facilement 
    // echo "<pre>";
    // print_r($utilisateur);
    // echo "<pre>";

    // le tableau $utilisateur (dans la bdd) contient les infos de l'utilisateur comme suivant : 
    /* Par Exemple : 
    $utilisateur = [
        'id_membre' => 1, 
        "email" => "WassilaDors@mail.com", 
        "pseudo" => "WassilaDors", 
        "mdp" => "$2y$10$vh0tSKgL8CTBL4ioplv.Juvtefi24KSx0U0XJn1dsr1lfr9jcP2ZK",
        "profil_img" => "sommeil-enfant-dormir.jpg"
    ];*/

    if(empty($utilisateur)){ // si le tableau $utilisateur est vide
        echo "Utilisateur inconnu...";
    }else{ // sinon

        // on verifie le mot de passe
        if(password_verify($mdp, $utilisateur['mdp'])){
            //password_verify : est une fonction qui comprend 2 paramètres.
            // le premier param correspond à ce que le user a taper dans la formulaire.
            // le deuxième ce qui se trouve dans la base de donnée, le nom de la colonne
            // (=  signifie, est-ce que c'est le mot de passe qui est à l'origine du mdp crypté.)

            //creer les variable de session
            // la variable $_SESSION est un tableau
            // toutes superglobal en php est un tableau
            $_SESSION["id"] = $utilisateur['id_membre'];
            $_SESSION["pseudo"] = $utilisateur['pseudo'];
            $_SESSION["img"] = $utilisateur['profil_img'];

            // ce qui donnerait :
            // $_SESSION = [
            //      'id' => 1,
            //      "pseudo" => "WassilaDors",
            //      "img" => "sommeil-enfant-dormir.jpg"
            // ];

            

            header("Location: accueil.php");

        }else{
            echo "mot de passe incorrect";
        }
    }
}