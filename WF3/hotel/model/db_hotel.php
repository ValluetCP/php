<?php
require_once "../inc/database.php";

if(isset($_POST['add_hotel'])){
    // récupération des infos
    $hotelName = htmlspecialchars($_POST['name_hotel']);
    $location = htmlspecialchars($_POST['location_hotel']);
    $capacityHotel = htmlspecialchars($_POST['capacity_hotel']);

    // se connecter à la bdd
    $db = dbConnexion();
    
    // préparer la requête
    $request = $db->prepare("INSERT INTO hotels (location, capacity, hotel_name) VALUES (?,?,?)");
    
    // exécuter la requête
    try{
        $request->execute(array($location, $capacityHotel, $hotelName));
        echo '<script>window.location.href = "https://unhelped-drawer.000webhostapp.com/admin/hotel_list.php";</script>';
    }catch(PDOException $e){
        $e->getMessage();
    }


}
