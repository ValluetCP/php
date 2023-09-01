<?php
session_start(); // à mettre avant le html pour démarrer une session 
require_once("database_2.php");

if(isset($_POST['inscription'])){
    // récupération des données saisies par l'utilisateur
    $email=htmlspecialchars($_POST['email']);
    $pseudo=htmlspecialchars($_POST['pseudo']);
    $mdp=htmlspecialchars($_POST['mdp']);

    
    // ----------  MOT DE PASSE CRYPTE ---------- //

    $mdpCrypt= password_hash($mdp, PASSWORD_DEFAULT);
    // la fonction password_hash comprend 2 paramètres : la valeur dans le formulaire, et la seconde le degré de sécurité


    // ----------  RECUPERER L'IMAGE ---------- //

    /*objectif : 
        - récupérer tous les fichiers (images) qui sont dans le formulaire.
        - copie l'image et la stock dans un endroit temporaire sur le serveur
        - on lui donnera par la suite le chemin d'accès à notre dossier
    */

    $imgName = $_FILES ['image']['name']; // nom de l'image
    // la 1ère valeur 'image' (récupéré dans le formulaire)
    // la 2ème valeur 'name' (toujours la même, ne change pas)

    $tmpName = $_FILES ['image']['tmp_name']; // localisation temporaire sur le server


    // ----------  DESTINATION DE L'IMAGE ---------- //

    //1
    $destination = $_SERVER['DOCUMENT_ROOT'].'/php/WF3/espace_membre/image/'.$imgName; // destination finale de mon image
    // $_SERVER['DOCUMENT_ROOT'] + chemin du dossier image
    //['DOCUMENT_ROOT'] : syntaxe qui veut dire pointe à la racine du serveur, si on n'indique pas le chemin, il s'arrêra au dossier 'htdocs'

    // $_SERVER['DOCUMENT_ROOT'] pointe à la racine du server c'est à dire le dossier principal (dossier racine)
    
    //2
    //echo $destination;
    move_uploaded_file($tmpName,$destination);
    // permet de prendre l'image et de la mettre dans le dossier que l'on a pointé au dessus.
    // 1er paramètre, la destination temporaire où a été stocker le fichier temporairement
    // 2ème paramètre, c'est la destination que l'on souhaite

    

    // ----------  CONNEXION A LA BASE DE DONNEE ---------- //

    // il faut se connecter à la base de donnée
    $db = dbConnexion(); //permet d'établir la connexion avec la base de donnée
    // var_dump($db); // voir ce qu'il retourne

    

    // ----------  REQUETE D'INSERTION ---------- //

    //préparation de la requête
    $request = $db->prepare("INSERT INTO membres (email, pseudo, mdp, profil_img) VALUES (?, ?, ?, ?) ");
    // (nom, prenom, email, mdp) : nom des colonnes


    // ----------  EXECUTION D'UNE REQUETE ---------- //

    //exécution de la requete
    try{ // essayer d'enregister les infos dans la table utilisateur
        $request->execute(array($email, $pseudo, $mdpCrypt, $imgName ));
        //redirection vers
    }catch(PDOexception $e){
        echo $e->getMessage(); // afficher l'erreur sql généré
    }
}
 

//pour la connexion
if(isset($_POST['connect'])){
    $pseudo=htmlspecialchars($_POST['pseudo']);
    $mdp=htmlspecialchars($_POST['mdp']);
    //etablir la connexion avec bbd
    $db = dbConnexion();
    //préparer la requete, est-ce que le pseudo est dans la bdd? à l'aide d'une requête de lecture
    $connexionRequest = $db->prepare("SELECT * FROM membres WHERE pseudo = ?");
    // La method prepare est une requete préparé. Pour question de sécurité. Apparaît à chaque fois qu'il y a la clause WHERE.  Evite que l'utilisateur saisisse les infos directement depuis l'URL.
    // Le " ? "
    
    //exécuter une requête
    $connexionRequest->execute(array($pseudo));
    
    //récupère le résultat de la requete dans le tableau : $utilisateur
    $utilisateur = $connexionRequest->fetch(PDO::FETCH_ASSOC); // converti le résultat de la requête en tableau pour le manipuler facilement. Au départ c'est objet
    // "fetch", "prepare", "exécute"...  sont des méthod de la class PDO qui nous les fournis

    echo "<pre>";
    print_r($utilisateur);
    echo "<pre>";
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
}


//pour la page publication "fichier : post.php".

if(isset($_POST['publier'])){
    $message = htmlspecialchars($_POST['message']);
    $image_name = $_FILES['img']['name'];
    $tmp = $_FILES['img']['tmp_name'];
    $destination = $_SERVER['DOCUMENT_ROOT'].'/php/WF3/espace_membre/image/'.$image_name;

    move_uploaded_file($tmp, $destination);
    
    // connexion à la base de donnée
    $dbconnect = dbconnexion();
    // préparation de la requête
    $request = $dbconnect->prepare("INSERT INTO posts (membre_id, photo, text) VALUES (?,?,?)");

    //execution de la requête
    try{
        $request->execute(array($_SESSION["id"], $image_name, $message));
        // retour à la page d'accueil après avoir publié
        header("Location: accueil_membre.php"); 
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

if(isset($_GET['idpost'])){
    // connexion à la base de donnée
    $dbconnect = dbconnexion();
    // préparation de la requête
    $request = $dbconnect->prepare("SELECT likes FROM posts WHERE id_post = ?");
    //executer la requete
    $request->execute(array($_GET['idpost']));
    // on récupère le résultat
    $likes = $request->fetch();

    // echo $likes['likes'];
    // requête pour modifier le nombre de like
    $request1 = $dbconnect->prepare("UPDATE posts SET likes = ? WHERE id_post = ?");
    // exécute la requête
    $request1->execute(array($likes['likes']+1, $_GET['idpost']));
    header(('Location: accueil_membre.php'));
}
?>