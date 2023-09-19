<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/php/WF3/POO/PROJET/biblio/models/database.php";

// METHODE pour lister, retourner un livre

class Book{

    // method pour enregistrer un livre
    public static function addBook($title, $author, $publication){

        // on appel la fonction dbConnect qui est dans la class Database
        $db = Database::dbConnect();

        // preparation de la requête
        $request = $db->prepare("INSERT INTO books (title, author,publication) VALUES (?,?,?)");

        // exécuter la requête
        try {
            $request->execute(array($title, $author, $publication));

            // rediriger vers la page login.php
            header("Location: http://localhost/php/WF3/POO/PROJET/biblio/views/list_book");
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    // method pour récupérer la liste des livres
    public static function listBook(){
        
        // on appel la fonction dbConnect qui est dans la class Database
        $db = Database::dbConnect();

        // preparation de la requête
        $request = $db->prepare("SELECT * FROM books");

        // exécuter la requête
        try {
            $request->execute(array());

            // récupérer le résultat de la requête dans un tableau listBook
            $lisBook = $request->fetchAll();

            // on récupère la liste des livres
            return $lisBook;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    // method pour emprunter un livre
    public static function borrowBook($user, $book){
        
        // on appel la fonction dbConnect qui est dans la class Database
        $db = Database::dbConnect();

        // preparation de la requête
        $request = $db->prepare("INSERT INTO borrows (`start_date`, `user_id`, `book_id`) VALUES (NOW(),?,?)");

        // exécuter la requête
        try {
            $request->execute(array($user, $book));

            // requête pour mettre le statut du livre à unavailable
            $request = $db->prepare("UPDATE books SET state = ? WHERE id_book = ?");

            // exécuter la requête
            try {
                $request->execute(array("unavailable", $book));
                header("Location: http://localhost/php/WF3/POO/PROJET/biblio/views/logs");
            } catch (PDOException $e){
                echo $e->getMessage();
            }
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    // method pour emprunter un livre
    public static function returnBook($borrow, $bookId){
        
        // on appel la fonction dbConnect qui est dans la class Database
        $db = Database::dbConnect();

        // preparation de la requête, mettre à jour la date de l'emprunt dans la table borrow
        $request = $db->prepare("UPDATE borrows SET end_date = NOW() WHERE id_borrow = ?");

        // exécuter la requête
        try {
            $request->execute(array($borrow));

            // requête pour mettre à jour le livre a available
            $request = $db->prepare("UPDATE books SET state = ? WHERE id_book = ?");

            // exécuter la requête
            try {
                $request->execute(array("available", $bookId));
                header("Location: http://localhost/php/WF3/POO/PROJET/biblio/views/logs");
            } catch (PDOException $e){
                echo $e->getMessage();
            }
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}