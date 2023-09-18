<?php
session_start();
require_once "../../models/userModel.php";

if(isset($_POST['inscription'])){
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // hasher le pot de passe
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // apeler la methode inscription de la classe User
    User::inscription($name,$email,$passwordHash);
    // cette syntaxe uniquement pour appeler les méthodes static.
    // la méthode inscription étant static donc on utilise le nom de la classe suivi de "::" ensuite le nom de la méthode qui est inscriptions.
}


if(isset($_POST['login'])){
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

   // apeler la methode connexion de la classe User 
   User::connexion($email,$password);
}

?>