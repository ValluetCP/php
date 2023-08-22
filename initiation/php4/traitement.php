<?php
require_once("database.php");
// on inclu le fichier database qui contitent la fonction permettant de se connecter à la base de donner

if(isset($_POST['envoi'])){
    // récupération des données saisies par l'utilisateur
    $nom=htmlspecialchars($_POST['nom']);
    $prenom=htmlspecialchars($_POST['prenom']);
    $email=htmlspecialchars($_POST['email']);
    $mdp=htmlspecialchars($_POST['mdp']);

    // crypter le mot de passe "hasher" (pour sécuriser un mot de passe, il est haché).
    $mdpCrypt= password_hash($mdp, PASSWORD_DEFAULT);
    // la fonction password_hash comprend 2 paramètres : la valeur dans le formulaire, et la seconde le degré de sécurité

    // il faut se connecter à la base de donnée
    $db = dbConnexion(); //permet d'établir la connexion avec la base de donnée

    // var_dump($db); // voir ce qu'il retourne

    // ----------  REQUETE D'INSERTION ---------- //
    //préparation de la requête
    $request = $db->prepare("INSERT INTO utilisateur (nom, prenom, email, mdp) VALUES (?, ?, ?, ?) ");
    // (nom, prenom, email, mdp) : nom des colonnes

    //exécution de la requete
    try{ // essayer d'enregister les infos dans la table utilisateur
        $request->execute(array($nom, $prenom, $email, $mdpCrypt));
    }catch(PDOexception $e){
        echo $e->getMessage(); // afficher l'erreur sql généré
    }
}
 
?>