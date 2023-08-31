<?php
require_once "database_2.php";

// Cette fonction sert à récupérer la liste des posts
function getPost(){
    $lesPosts = null;
    $dbconnect = dbConnexion(); // connexion à la base de donnée


    // préparation à la requête

    // $request = $dbconnect->prepare("SELECT * id_post, likes, membre_id, text, photo FROM posts WHERE membre_id IN (SELECT * FROM membres");
    
    //ou
    
    // $request = $dbconnect->prepare("SELECT * id_post, likes, membre_id, text, photo, id_membre, pseudo FROM posts, membres WHERE post.membre_id = membres.id_membre");

    $request = $dbconnect->prepare("SELECT id_post, likes, membre_id, text, photo, id_membre, pseudo FROM posts, membres WHERE posts.membre_id = membres.id_membre");


    // execution de la requête
    try{
        $request->execute();
        // Transformer le resultat de la reqête en tableau
        $lesPosts = $request->fetchAll();
        // on utilise fetchAll plutôt que fetch car on transforme TOUS les éléments de la table posts.
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    return $lesPosts; // retourne la liste des posts
}



?>