<?php
function dbConnexion(){

    $connexion = null;

    $host='localhost';
    $dbname='library';
    $identify='root';
    $passeword = '';


    try{
        $connexion = new PDO("mysql:host=$host;dbname=$dbname", $identify, $passeword);
    }catch(PDOException $e){
        $connexion = $e->getMessage();
    }
    return $connexion;
}
