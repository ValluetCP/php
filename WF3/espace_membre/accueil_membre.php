
<?php
session_start(); // à mettre avant le html pour démarrer une session
if(!isset($_SESSION['id'])){ // vérifie si la session est active
    header("Location: connexion.php"); // redirection vers la page connexion (le formulaire)
    
    // cette page doit être accessible uniquement si l'utilisateur est connecté
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Espace membre - Accueil</title>
</head>
<body>
    <?php include_once "nav.php"; ?>


</body>
</html>