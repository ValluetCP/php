<?php

require_once $_SERVER["DOCUMENT_ROOT"]."/wf3_poo_final_cynthia/models/database.php";

class Game{

    // pour la méthode static, pas besoin de déclarer une variable à l'inverse des contructeurs

    // methode pour s'inscrire
    public static function addGame($title,$min_players,$max_players){

        // on appel la fonction dbConnect qui est dans la class Database
        $db = Database::dbConnect();

        // preparation de la requête
        $request =$db->prepare("INSERT INTO `game`( `title`, `min_players`, `max_players`) VALUES (?,?,?)");

        // exécuter la requête
        try {
            $request->execute(array($title,$min_players,$max_players));

            // rediriger vers la page login.php
            header("Location: http://localhost/wf3_poo_final_cynthia/views/list_game.php");
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public static function findAllGame(){

        // on appel la fonction dbConnect qui est dans la class Database
        $db = Database::dbConnect();

        // preparation de la requête
        $request = $db->prepare("SELECT * FROM `game`");

        // exécuter la requête
        $gameList = null;
        try {
            $request->execute();

            // récupère le résultat dans un tableau
            $gameList = $request->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $gameList;
    }
}