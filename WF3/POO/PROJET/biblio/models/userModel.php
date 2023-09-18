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
    public static function connexion($email,$password){

        // on appel la fonction dbConnect qui est dans la class Database
        $db = Database::dbConnect();

        // preparation de la requête
        $request =$db->prepare("SELECT * FROM `users` WHERE email = ?");

        // exécuter la requête
        try {
            $request->execute(array($email));

            // récupérer le résultat de la requête dans un tableau
            $user = $request->fetch();

            // vérifier si l'email existe dans la base de donnée
            if(empty($user)){
                $_SESSION['error_message'] = "Cet email n'existe pas";
                // rediriger vers la page précédente
                header("location:". $_SERVER['HTTP_REFERER']);
    
            // vérifier si le mot de passe est correct
            }else if(password_verify($password, $user['password'])){

                // il a taper le bon mail et le bon mot de passe
                // version avec $_COOKIE
                setcookie("id_user", $user['id_user'],time() + 86400,"/","http://localhost/php/WF3/POO/PROJET/biblio", false, true);

                // version avec $_SESSION
                // $_SESSION["id_user"] = $user["id_user"];

                // version avec $_COOKIE
                setcookie("user_role", $user['user_role'],time() + 86400,"/","http://localhost/php/WF3/POO/PROJET/biblio", false, true);

                // version avec $_SESSION
                // $_SESSION["user_role"] = $user["user_role"];

                // rediriger vers la page list_book.php
                header("Location: http://localhost/php/WF3/POO/PROJET/biblio/views/list_book");

            }else{
                $_SESSION['error_message'] = "Mot de passe incorrect";
                 // rediriger vers la page précédente
                 header("location:". $_SERVER['HTTP_REFERER']);
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
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