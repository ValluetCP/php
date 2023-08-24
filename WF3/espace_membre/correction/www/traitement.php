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
    $utilisateur = $connexionRequest->fetch(PDO::FETCH_ASSOC); // convertir le resultat de la requete en tableau pour le manipuler facilement 
    // echo "<pre>";
    // print_r($utilisateur);
    // echo "<pre>";

    if(empty($utilisateur)){ // si le tableau $utilisateur est vide
        echo "Utilisateur inconnu...";
    }else{ // sinon
        // on verifie le mot de passe
        if(password_verify($mdp, $utilisateur['mdp'])){
            //creer les variable de session
            $_SESSION["id"] = $utilisateur['id_membre'];
            $_SESSION["pseudo"] = $utilisateur['pseudo'];
            $_SESSION["img"] = $utilisateur['profil_img'];

            header("Location: accueil.php");

        }else{
            echo "mot de passe incorrect";
        }
    }
}