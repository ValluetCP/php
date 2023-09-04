<?php
require_once("../inc/database.php");


function hotelList(){
    
    // se connecter à la db (data base) ou bd (base de donnée)
    $db = dbConnexion();

    // préparer une requête de lecture (récupérer la liste des hôtels)
    $request = $db->prepare("SELECT * from hotels");

    // exécuter la requête
    $listHotel = null;

    try{
    
        $request->execute();
    
        // récupère le résultat dans un tableau
        $listHotel = $request->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
    echo $e->getMessage();
    }
    return $listHotel;
}

?>