<?php

require_once $_SERVER["DOCUMENT_ROOT"]."/wf3_poo_final_cynthia/models/database.php";


class Contest{

    // pour la méthode static, pas besoin de déclarer une variable à l'inverse des contructeurs

    // methode pour s'inscrire
    public static function addContest($game,$start_date){

        // on appel la fonction dbConnect qui est dans la class Database
        $db = Database::dbConnect();

        // preparation de la requête
        $request =$db->prepare("INSERT INTO `contest`(`game_id`, `start_date`) VALUES (?,?)");

        // exécuter la requête
        try {
            $request->execute(array($game,$start_date));

            // rediriger vers la page login.php
            header("Location: http://localhost/wf3_poo_final_cynthia/views/list_contest.php");
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public static function findAllContest(){

        // on appel la fonction dbConnect qui est dans la class Database
        $db = Database::dbConnect();

        // preparation de la requête
        // $request = $db->prepare("SELECT * FROM `contest` c LEFT JOIN player p ON c.winner_id=p.id_player LEFT JOIN game g ON c.game_id=g.id_game ORDER BY c.start_date DESC");

        $request = $db->prepare("SELECT c.*, g.*, p.*, COUNT(cp.player_id) AS nombre_de_joueurs  FROM contest c  LEFT JOIN player p ON c.winner_id = p.id_player  LEFT JOIN game g ON c.game_id = g.id_game  LEFT JOIN player_contest cp ON c.id_contest = cp.contest_id  GROUP BY c.id_contest, g.id_game  ORDER BY c.start_date DESC;");

        // exécuter la requête
        $contestList = null;
        try {
            $request->execute();

            // récupère le résultat dans un tableau
            $contestList = $request->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $contestList;
    }

    public static function findContestById($id){

        // on appel la fonction dbConnect qui est dans la class Database
        $db = Database::dbConnect();

        // preparation de la requête
        // $request = $db->prepare("SELECT * FROM `contest` c LEFT JOIN player p ON c.winner_id=p.id_player LEFT JOIN game g ON c.game_id=g.id_game ORDER BY c.start_date DESC");

        $request = $db->prepare("SELECT c.*, g.*, p.*, COUNT(cp.player_id) AS nombre_de_joueurs  FROM contest c  LEFT JOIN player p ON c.winner_id = p.id_player  LEFT JOIN game g ON c.game_id = g.id_game  LEFT JOIN player_contest cp ON c.id_contest = cp.contest_id WHERE c.id_contest = ?  GROUP BY c.id_contest ");

        // exécuter la requête
        $match = null;
        try {
            $request->execute([$id]);

            // récupère le résultat dans un tableau
            $match = $request->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $match;
    }

}