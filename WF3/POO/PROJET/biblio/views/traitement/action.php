<?php
session_start();
require_once "../../models/userModel.php";
require_once "../../models/bookModel.php";

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


if(isset($_POST['add'])){
    $title = htmlspecialchars($_POST['title']);
    $author = htmlspecialchars($_POST['author']);
    $publication = htmlspecialchars($_POST['publication']);

   // apeler la methode addBook de la classe Book 
   Book::addBook($title, $author, $publication);
}

// pour l'emprunt d'un livre

if(isset($_GET['book'])){

    // identifiant du livre a emprunter
    $book = htmlspecialchars($_GET['book']);

    //on récupère l'identifiant de l'utilisateur connecté
    $id_user = $_COOKIE['id_user'];

   // apeler la methode borrowBook de la classe Book 
   Book::borrowBook($id_user, $book);
}


// pour rendre un livre

if(isset($_GET['borrow'])){

    // identifiant de l'emprunter
    $borrow = htmlspecialchars($_GET['borrow']);
    $bookId = htmlspecialchars($_GET['bookId']);

   // apeler la methode returnBook de la classe Book 
   Book::returnBook($borrow, $bookId);
}



?>