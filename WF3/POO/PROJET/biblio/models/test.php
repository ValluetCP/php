<?php

require_once $_SERVER["DOCUMENT_ROOT"]."/php/WF3/POO/PROJET/biblio/views/asset/css/style.css";

// --------------------------------------------- //
// PAGE LIST_BOOK


// version avec $_SESSION

// 1.Utiliser la session start
// session_start();

// 2.faire la condition
// if(isset($_SESSION['user_role'])){
//     echo "Bienvenue".$_SESSION['user_role'];
// }

// version avec $_COOKIE
if(isset($_COOKIE['user_role'])){ 
    echo "Bienvenue ".$_COOKIE['user_role'];?>
    <h1><?= "Bienvenue ".$_COOKIE['user_name']."!"; ?></h1>
<?php }

// --------------------------------------------- //