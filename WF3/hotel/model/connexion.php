<?php
session_start();
require_once("../inc/database.php");
if(isset($_POST['submit'])){
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    
    // établir la connexion avec la base de donnée
    $db = dbConnexion();

    // préparer la requête
    $request = $db->prepare("SELECT * FROM users WHERE email = ?");

    //exécute la requête
    try{
        $request->execute(array($email));
        //récupérer le résultat de la requête pour le convertir en tableau : fetch
        // le résultat d'une requête est toujours un objet
        $userInfo = $request->fetch(PDO::FETCH_ASSOC);
        if(empty($userInfo)){
            echo "utilisateur inconnue";
        }else{
            // vérifier si le mot de passe est correct
            if(password_verify($password, $userInfo['password'] )){
                // si l'utilisateur est un admin
                if($userInfo['role'] == "admin"){
                    // définir la variable de session role
                    $_SESSION['role'] = $userInfo["role"];
                    // dans ce cas de figure 'role' vaudra 'admin' donc il sera rediriger vers la page admin
                    header("Location: http://localhost/php/WF3/hotel/admin/admin.php");
                }else{
                    // définir la variable de session role
                    $_SESSION['role'] = $userInfo["role"];
                    $_SESSION['id_user'] = $userInfo["id_user"];

                    // dans ce cas de figure 'role' vaudra 'client' donc il sera rediriger vers la page user.
                    header("Location: ../user_home.php");
                }
            }else{
                echo "mot de passe inconnue";
            }
        }
    }catch(PDOException $e){
        $e->getMessage();
    }
}
?>