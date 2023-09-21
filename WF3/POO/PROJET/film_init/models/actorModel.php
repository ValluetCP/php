<?php

require_once $_SERVER["DOCUMENT_ROOT"]."/film/models/database.php";

class Actor{

    // pour la méthode static, pas besoin de déclarer une variable à l'inverse des contructeurs

    // methode pour s'inscrire
    public static function addActor($name,$email){

        // on appel la fonction dbConnect qui est dans la class Database
        $db = Database::dbConnect();

        // preparation de la requête
        $request =$db->prepare("INSERT INTO `actor`(`name`, `email`) VALUES (?,?)");

        // exécuter la requête
        try {
            $request->execute(array($name,$email));

            // rediriger vers la page login.php
            header("Location: http://localhost/film/views/list_actor.php");
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    // methode pour tout afficher 
    public static function findAllActors(){

        // on appel la fonction dbConnect qui est dans la class Database
        $db = Database::dbConnect();

        // preparation de la requête
        $request =$db->prepare("SELECT * FROM actor");

        // exécuter la requête
        $actorList = null;
        try {
            $request->execute();
    
            // récupère le résultat dans un tableau
            $actorList = $request->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $actorList;
    }

    // methode pour changer l'id 
    public static function updateActorById($id,$name,$email){
        
        // on appel la fonction dbConnect qui est dans la class Database
        $db = Database::dbConnect();

        // preparation de la requête
        $request =$db->prepare("UPDATE actor SET name= ?, email= ? WHERE id = $id ");

        // exécuter la requête
        try {
            $request->execute(array($id,$name,$email));

            // rediriger vers la page login.php
            header("Location: http://localhost/film/views/list_actor.php");
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    // methode pour tout afficher 
    public static function deleteActorById($id){
        
        // on appel la fonction dbConnect qui est dans la class Database
        $db = Database::dbConnect();

        // preparation de la requête
        $request =$db->prepare(" DELETE FROM actor WHERE id_actor = ?");

        // exécuter la requête
        $result = false;
        try {
            $request->execute(array($id));
            $result = true;
            
        // rediriger vers la page login.php
        header("Location: http://localhost/film/views/list_actor.php");

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $result;

    }

    // methode pour tout afficher 
    public static function findActorById(){

    }
}