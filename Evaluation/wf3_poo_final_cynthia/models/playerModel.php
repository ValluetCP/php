<?php

require_once $_SERVER["DOCUMENT_ROOT"]."/wf3_poo_final_cynthia/models/database.php";

class Player{

    // pour la méthode static, pas besoin de déclarer une variable à l'inverse des contructeurs

    // methode pour s'inscrire
    public static function addPlayer($email,$nickname){

        // on appel la fonction dbConnect qui est dans la class Database
        $db = Database::dbConnect();

        // preparation de la requête
        $request =$db->prepare("INSERT INTO `player`( `email`, `nickname`) VALUES (?,?)");

        // exécuter la requête
        try {
            $request->execute(array($email,$nickname));

            // rediriger vers la page login.php
            header("Location: http://localhost/wf3_poo_final_cynthia/views/list_player.php");
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    // methode pour s'inscrire
    public static function findAllPlayer(){

        // on appel la fonction dbConnect qui est dans la class Database
        $db = Database::dbConnect();

        // preparation de la requête
        $request = $db->prepare("SELECT * FROM `player`");

        // exécuter la requête
        $playerList = null;
        try {
            $request->execute();

            // récupère le résultat dans un tableau
            $playerList = $request->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $playerList;
    }
}