<?php
require_once "../../models/userModel.php";

if(isset($_POST['inscription'])){
    echo "test";
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


?>