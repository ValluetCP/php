<?php
require_once ("../inc/db_connection.php");
require_once ("../inc/function.php");

echo "<pre>";
var_dump($_POST); // affiche le contenu saisi par l'utilisateur dans le formulaire. Retourne un tableau associatif dont la clé la valeur de l'attribut name dans le formulaire.
echo "<pre>";

// debug($_GET, $_POST, $_FILES, $_SERVEUR);

// die; // pour qu'il n'exécute pas le reste du code

if(isset($_POST['submit'])){ // c'est pour l'inscription
    $civility = $_POST['civility']; // on récupère la valeur de civility grâce à $_POST
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $passwordCrypt = password_hash($password, PASSWORD_DEFAULT);
    $birthday = $_POST['birthday'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $country = $_POST['country'];
    $conditions = $_POST['conditions'];

    // se connecter a la db
    $conn = dbConnexion();

    // preparer la requete
    $request = $conn->prepare("INSERT INTO user (civility,firstname,lastname,email,password,birthday,phone,message,country,conditions) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // executer la requete
    try{
        $request->execute(array($civility,$firstname,$lastname,$email,$passwordCrypt,$birthday,$phone,$message,$country,$conditions));
        // redirection vers une page de notre choix
        header("Location: ../connection.php");
        
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}else{
    echo "il n'y a pas d'enregistrement dans la bdd";
}



// if(isset($_POST['valider'])){ // c'est pour l'inscription
//     $email = $_POST['email'];
//     $pseudo = $_POST['pseudo'];
//     $mdp = $_POST['mdp'];

//     $mdpCrypt = password_hash($mdp, PASSWORD_DEFAULT);

//     $imgName = $_FILES['photo']['name'];
//     $tmp = $_FILES['photo']['tmp_name'];
//     $destination = $_SERVER['DOCUMENT_ROOT'].'/img/'.$imgName;
//     move_uploaded_file($tmp, $destination);
//     // se connecter a la db
//     $conn = dbConnexion();
//     // preparer la requete
//     $request = $conn->prepare("INSERT INTO membres (email, pseudo, mdp, profil_img) VALUES (?, ?, ?, ?)");
//     // executer la requete
//     try{
//         $request->execute(array($email, $pseudo, $mdpCrypt, $imgName));
//         // redirection vers une page de notre choix
//     }catch(PDOException $e){
//         echo $e->getMessage();
//     }
// }