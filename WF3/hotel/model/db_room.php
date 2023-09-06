<?php
require_once "../inc/database.php";

if(isset($_POST['add_room'])){
    $hotel = htmlspecialchars($_POST['hotel']);
    $roomNumber = htmlspecialchars($_POST['room_number']);
    $roomPrice = htmlspecialchars($_POST['room_price']);
    $person = htmlspecialchars($_POST['person']);
    $category = htmlspecialchars($_POST['category']);
    
    // traitement de l'image
    $imgName = $_FILES['image']['name'];
    $tmpName = $_FILES['image']['tmp_name'];

    $destination = $_SERVER["DOCUMENT_ROOT"].'/asset/img/'.$imgName;

    // Toujours mettre move_uploaded_file dans un if
    if(move_uploaded_file($tmpName, $destination)){

        // se connecter à la bd
        $db = dbConnexion();

        // préparer la requête
        $request = $db->prepare("INSERT INTO `rooms`(`room_number`, `hotel_id`, `price`, `room_imgs`, `persons`, `category`) VALUES (?,?,?,?,?,?)");

        // executer la requête
        try{
            $request->execute(array($roomNumber,$hotel,$roomPrice,$imgName,$person,$category));
            // redirection vers list_room.php
            echo '<script>window.location.href = "https://unhelped-drawer.000webhostapp.com/admin/room_list.php";</script>';
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

}