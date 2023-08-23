<?php
require_once("database_2.php");

if(isset($_POST['inscription'])){
    // récupération des données saisies par l'utilisateur
    $pseudo=htmlspecialchars($_POST['pseudo']);
    $mdp=htmlspecialchars($_POST['mdp']);

    $mdpCrypt= password_hash($mdp, PASSWORD_DEFAULT);
    // la fonction password_hash comprend 2 paramètres : la valeur dans le formulaire, et la seconde le degré de sécurité

    // il faut se connecter à la base de donnée
    $db = dbConnexion(); //permet d'établir la connexion avec la base de donnée

    // $_SERVER['DOCUMENT_ROOT'] pointe à la racine du server c'est à dire le dossier principal (dossier racine)
    $destination = $_SERVER['DOCUMENT_ROOT'].'/php/WF3/espace_membre/image/'.$imgName; // destination finale de mon image
    //echo $destination;
    move_uploaded_file($tmpName,$destination);

           // ----------  REQUETE DE LECTURE ---------- //

    //préparation de la requête de lecture
    $request = $db->prepare("SELECT * FROM membres WHERE pseudo: ?");

    //exécution de la requete
    try{ // essayer d'enregister les infos dans la table utilisateur
        $request->execute(array($pseudo, $mdpCrypt));
    }catch(PDOexception $e){
        echo $e->getMessage(); // afficher l'erreur sql généré
    }
}
 
?>