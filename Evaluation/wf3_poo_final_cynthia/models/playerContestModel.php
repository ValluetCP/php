<?php

require_once $_SERVER["DOCUMENT_ROOT"]."/wf3_poo_final_cynthia/models/database.php";

class PlayerContest{

    // pour la méthode static, pas besoin de déclarer une variable à l'inverse des contructeurs

    // methode pour s'inscrire
    public static function addPlayerContest($player,$id_contest){

        // on appel la fonction dbConnect qui est dans la class Database
        $db = Database::dbConnect();

        // preparation de la requête
        $request =$db->prepare("INSERT INTO `player_contest`( `player_id`, `contest_id`) VALUES (?,?)");

        // exécuter la requête
        try {
            $request->execute(array($player,$id_contest));

            // rediriger vers la page login.php
            header("Location: http://localhost/wf3_poo_final_cynthia/views/list_contest.php");
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function findPlayerForMatch($id){

        // on appel la fonction dbConnect qui est dans la class Database
        $db = Database::dbConnect();

        // preparation de la requête
        // $request = $db->prepare("SELECT * FROM `contest` c LEFT JOIN player p ON c.winner_id=p.id_player LEFT JOIN game g ON c.game_id=g.id_game ORDER BY c.start_date DESC");

        $request = $db->prepare("SELECT player.nickname, player.email
        FROM player
        JOIN player_contest ON player.id = player_contest.player_id
        JOIN contest ON player_contest.contest_id = contest.id
        WHERE contest.id = :matchId; ");

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

    

    // // methode pour s'inscrire
    // public static function findPlayerContest($player,$id_contest){

    //     // on appel la fonction dbConnect qui est dans la class Database
    //     $db = Database::dbConnect();

    //     // preparation de la requête
    //     $request =$db->prepare("INSERT INTO `player_contest`( `player_id`, `contest_id`) VALUES (?,?)");

    //     // exécuter la requête
    //     try {
    //         $request->execute(array($player,$id_contest));

    //         // rediriger vers la page login.php
    //         header("Location: http://localhost/wf3_poo_final_cynthia/views/list_contest.php");
            
    //     } catch (PDOException $e) {
    //         echo $e->getMessage();
    //     }
    // }
}