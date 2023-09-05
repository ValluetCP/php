<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"]."/php/WF3/hotel/inc/database.php";

// vérifier que la chambre que j'ai choisi est dispo aux dates que j'ai choisi

if(isset($_POST['book'])){

    // récupérer les infos
    $idRoom = htmlspecialchars($_POST['id_room']);
    $startDate = htmlspecialchars($_POST['start_date']);
    $endDate = htmlspecialchars($_POST['end_date']);
    $price = htmlspecialchars($_POST['price']);

    // chaine de caractère converti en date
    $startDate = strtotime($startDate);
    $endDate = strtotime($endDate);

    $duration = $endDate - $startDate;

    // echo $duration;

    $nbDays = $duration / 86400;

    echo "le nombre de jours est : $nbDays";
    die;
    
    //  se connecter à la bdd
    $db = dbConnexion();

    //préparer la requête pour vérifier si la chambre est dispo entre la date de départ et la date de fin
    $request = $db->prepare('SELECT * FROM bookings WHERE room_id = ? AND 	booking_start_date < ? AND booking_end_date > ?');

    try{
        //executer la requete
        $request->execute(array($idRoom,$startDate,$endDate));
        // récupére le résultat
        $books = $request->fetch();
        
        if(empty($books)){
            if($startDate < $endDate){
                // préparer la requête pour réserver la chambre
                $request = $db->prepare("INSERT INTO `bookings`(`booking_start_date`, `booking_end_date`, `user_id`, `room_id`, `booking_price`, `booking_state`) VALUES (?,?,?,?,?,?)");

                $request->execute(array($startDate,$endDate,));
            }
        }
        
    }catch(PDOException $e){
        echo $e->getMessage();
    }

    
}