<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/inc/database.php";

// LIST HOTEL

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


// LIST ROOM

function roomList(){
    // se connecter à la db (data base) ou bd (base de donnée)
    $db = dbConnexion();

    // préparer une requête de lecture (récupérer la liste des hôtels)
    $request = $db->prepare("SELECT * from rooms");

    // exécuter la requête
    $listRoom = null;

    try{
    
        $request->execute();
    
        // récupère le résultat dans un tableau
        $listRoom = $request->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    return $listRoom;
}


function userBookList($idUser){
    // se connecter à la db (data base) ou bd (base de donnée)
    $db = dbConnexion();

    // préparer une requête de lecture (récupérer la liste des hôtels)
    $request = $db->prepare("SELECT * from bookings WHERE user_id = ? AND booking_state = ?");
   

    // exécuter la requête
    $userBookList = null;

    try{
    
        $request->execute(array($idUser,'in progress'));
    
        // récupère le résultat dans un tableau
        $userBookList = $request->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    return $userBookList;
}


// // LIST BOOK

// function bookList(){
//     // se connecter à la db (data base) ou bd (base de donnée)
//     $db = dbConnexion();

//     // préparer une requête de lecture (récupérer la liste des hôtels)
//     $request = $db->prepare("SELECT * from books");

//     // exécuter la requête
//     $listBook = null;

//     try{
    
//         $request->execute();
    
//         // récupère le résultat dans un tableau
//         $listBook = $request->fetchAll(PDO::FETCH_ASSOC);
//     }catch(PDOException $e){
//         echo $e->getMessage();
//     }
//     return $listBook;
// }

?>