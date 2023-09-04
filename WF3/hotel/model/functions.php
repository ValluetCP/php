<?php
require_once("http://localhost/php/WF3/hotel/inc/database.php");


function hotelList(){
    
    // se connecter à la db (data base) ou bd (base de donnée)
    $db = dbConnexion();

    // préparer une requête de lecture
    $request = $db->prepare("SELECT * from hotels");
}

?>