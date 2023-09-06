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
    $dateStart = strtotime($startDate);
    $dateEnd = strtotime($endDate);

    $duration = $dateEnd - $dateStart;

    // echo $duration;

    $nbDays = $duration / 86400;

    $today = date('Ymd'); // la date d'aujourd'hui

    // si $today est supérieur à la date de début de réservation ou $today est supérieur à la date de fin de réservation.
    if(strtotime($today) > strtotime($startDate) || strtotime($today) > strtotime($endDate)){
        echo'<script>alert("votre date de début ou de fin de réservation ne peut pas être pas être inférieur à la date d\'aujourd\'hui")</script>';
        echo '<script>window.location.href = "https://unhelped-drawer.000webhostapp.com/booking.php?room='.$idRoom.'&price='.$price.'";</script>';

    }else{
        //  se connecter à la bdd
        $db = dbConnexion();
    
        //préparer la requête pour vérifier si la chambre est dispo entre la date de départ et la date de fin
        $request = $db->prepare("SELECT * FROM bookings WHERE room_id = ? AND ((booking_start_date <= ? AND booking_end_date >= ?) OR (booking_start_date <= ? AND booking_end_date >= ?))");
    
        try{
            //executer la requete
            $request->execute(array($idRoom, $startDate, $startDate, $endDate, $endDate));
            // récupére le résultat
            $books = $request->fetch();
            
            if(empty($books)){
                if($startDate < $endDate){
                    // préparer la requête pour réserver la chambre
                    $request = $db->prepare("INSERT INTO `bookings`(`booking_start_date`, `booking_end_date`, `user_id`, `room_id`, `booking_price`, `booking_state`) VALUES (?,?,?,?,?,?)");
    
                    try{
                        $request->execute(array($startDate,$endDate,$_SESSION['id_user'],$idRoom,$price*$nbDays,"in progress"));
                        // rediriger vers user_home.php
                        header("Location: https://unhelped-drawer.000webhostapp.com/user_home.php");
    
                    }catch(PDOException $e){
                        echo $e->getMessage();
                    }
                }else{
                    // Dates invalides
                    echo "Les dates de réservation ne sont pas valides.";
                }
            }else {
                // La chambre n'est pas disponible pour ces dates
                echo "La chambre n'est pas disponible pour les dates sélectionnées.";
            }
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }

    }
    
}

if(isset($_GET['id_book'])){
   //  se connecter à la bdd
   $db = dbConnexion();
   $request = $db->prepare("UPDATE bookings SET booking_state = ? WHERE id_booking = ?");

   try{
    $request->execute(array("cancel", $_GET['id_book']));
    // redirection vers user_home.php
    header("Location: https://unhelped-drawer.000webhostapp.com/user_home.php" );
   }catch(PDOException $e){
    echo $e->getMessage();
   }
}