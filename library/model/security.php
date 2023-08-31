<?php
require_once ("../inc/db_connection.php");
require_once ("../inc/function.php");


if(isset($_POST['submit'])){
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $mdpHash = password_hash($password, PASSWORD_DEFAULT);

    // Connection à la base de donnée
    $connectDb = dbConnexion();

    // Préparation de la requête
    $request = $connectDb->prepare('SELECT * FROM user ')

}


?>