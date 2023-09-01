<?php
session_start(); 
require_once ("../inc/db_connection.php");
require_once ("../inc/function.php");


if(isset($_POST['submit'])){
    $firstname = htmlspecialchars($_POST['firstname']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    // $mdpHash = password_hash($password, PASSWORD_DEFAULT);

    // Connection à la base de donnée
    $connectDb = dbConnexion();

    // Préparation de la requête
    $request = $connectDb->prepare('SELECT * FROM user WHERE  email = ?');

    // Execution de la requête
    $request->execute(array($email));

    $utilisateur = $request->fetch(PDO::FETCH_ASSOC);

    echo '<pre>';
    print_r($utilisateur);
    echo '<pre>';
    

    // if(empty($_SESSION["firstname"])){
    //     $_SESSION['errorUser'] = "Utilisateur inconnu.."; 
    // header("Location: ../connection.php"); 
    // }

     
 if(empty($utilisateur)){ 
    
    $_SESSION['errorUser'] = "Veuillez remplir tous les champs"; 
    header("Location: ../connection.php"); 
    
    // $_SESSION['errorUser'] = "Utilisateur inconnu..."; 
    // header("Location: ../connection.php");

    // if(empty($_SESSION["firstname"]))

}else{

    if(password_verify($password,$utilisateur["password"])){
    // ou
    //if($mdpCrypt == $utilisateur["mdp"]){
        
        //créer les variable de session
        $_SESSION["id"] = $utilisateur['id_user'];
        $_SESSION["email"] = $utilisateur['email'];
        $_SESSION["firstname"] = $utilisateur['firstname'];

        // setcookie("id_user", $utilisateur['id_membre'], time()+3600, '/', 'localhost', false, true);

        // echo '<pre>';
        // var_dump($_COOKIE);
        // echo '<pre>';
        
        header("Location: ../profil.php");// redirige vers accueil_membre.php, penser à ajouter sur cette page, en haut, la fonction session_start();

        // autre syntaxe :
        // echo"<script>location.href='accueil_membre.php'</script>";
        
    }else{
        $_SESSION['error'] = "mot de passe incorrect";
        header("Location: ../connection.php"); 
        // header("refresh:2;http://localhost/php/WF3/espace_membre/connexion.php");
    }
    
} 

    

    

}

die;


 //si aucun utilisateur ne correspond, il retourne un tableau vide
 if(empty($utilisateur)){ // si le tableau $utilisateur est vide
    // echo "Utilisateur inconnu...";
    $_SESSION['error'] = "Utilisateur inconnu..."; // ajouter le message d'erreur dans le tableau $_SESSION
    header("Location: connexion.php"); // redirige vers connexion.php, penser à ajouter sur cette page, en haut, la fonction session_start(); pour faire la liaison entre les fichiers.

}else{//sinon
    //vérifie le mot de passe (est-ce cette chaine de caractère qui est à l'origine du cryptage)
    if(password_verify($mdp,$utilisateur["mdp"])){
    // ou
    //if($mdpCrypt == $utilisateur["mdp"]){
        
        //créer les variable de session
        $_SESSION["id"] = $utilisateur['id_membre'];
        $_SESSION["pseudo"] = $utilisateur['pseudo'];
        $_SESSION["img"] = $utilisateur['profil_img'];
        /*c'est comme ci on ecrit :
        $_SESSION =[
            "img" => "profil_img"
        ]
        La première valeur : c'est la clé, on la nomme comme on le souhaite
        La seconde valeur: c'est le nom des colonnes*/
        // $_MAJUSCULE : tous les éléments de ce type retourne des tableaux

        //creation du cookie qui va stocker la valeur (= l'dentifiant de l'utilisateur) pour permettre une meilleure expérience.
        // c'est à dire, on va la connecter automatiquement après vérification du cookie
        setcookie("id_user", $utilisateur['id_membre'], time()+3600, '/', 'localhost', false, true);

        echo '<pre>';
        var_dump($_COOKIE);
        echo '<pre>';
        
        header("Location: accueil_membre.php");// redirige vers accueil_membre.php, penser à ajouter sur cette page, en haut, la fonction session_start();

        // autre syntaxe : 
        // echo"<script>location.href='accueil_membre.php'</script>";
        
    }else{
        $_SESSION['error'] = "mot de passe incorrect";
        header("Location: connexion.php"); 
        // header("refresh:2;http://localhost/php/WF3/espace_membre/connexion.php");
    }
    
} 



?>