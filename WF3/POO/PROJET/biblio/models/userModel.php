<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/php/WF3/POO/PROJET/biblio/models/database.php";


class User{

    // pour la méthode static, pas besoin de déclarer une variable à l'inverse des contructeurs

    // methode pour s'inscrire
    public static function inscription($name, $email, $password){
  
        // on appel la fonction dbConnect qui est dans la class Database
        $db = Database::dbConnect();

        // preparation de la requête
        $request =$db->prepare("INSERT INTO `users`( `name`, `email`, `password`) VALUES(?,?,?)");

        // exécuter la requête
        try {
            $request->execute(array($name, $email, $password));
            // rediriger vers la page login.php
            header("Location: http://localhost/php/WF3/POO/PROJET/biblio/views/login");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    // methode pour se connecter
    public static function connexion(){

    }

    // methode pour se déconnecter
    public static function logout(){

    }

    // methode pour emprunter un livre
    public static function borrow(){

    }

    // methode pour se désinscrire
    public static function deleteAccount(){

    }

}

?>