<?php
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
                    header("Location: admin/admin.php");
                }else{
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