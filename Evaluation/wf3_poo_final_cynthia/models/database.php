<?php

class Database{

    // une méthode static est une méthods qu'on peut exécuter sans intancier la classe dans laquelle est implémentée (déclaré, défini)

    public static function dbConnect(){
        $conn = null;

        try {
            $conn = new PDO("mysql:host=localhost;dbname=wf3_php_final_cynthia","root","");
            // $conn = new PDO("mysql:host=localhost;dbname=id21293028_wf3_php_final_cynthia","id21293028_cynthia","WF3_poo_final");
        } catch (PDOException $e) {
            $conn = $e->getMessage();
        }
        return $conn;

    }
}

// $db = Database::dbConnect();

// mot de passe : WF3_poo_final


?>