<?php
// version avec $_SESSION

// 1.Utiliser la session start
// session_start();

// 2.faire la condition
// if(isset($_SESSION['user_role'])){
//     echo "Bienvenue".$_SESSION['user_role'];
// }

// version avec $_COOKIE
if(isset($_COOKIE['user_role'])){
    echo "Bienvenue".$_COOKIE['user_role'];
}


?>