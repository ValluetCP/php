<?php
function dbConnexion(){
    $connexion = null;
    try{
        $connexion = new PDO("mysql:host=db.cours.com;dbname=cours_db", "admin", "admin");
    }catch(PDOException $e){
        $connexion = $e->getMessage();
    }
    return $connexion;
}