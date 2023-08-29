
<?php
session_start(); // à mettre avant le html pour démarrer une session
// echo $_COOKIE['id_user'];
require_once 'fonction.php';

if(!isset($_COOKIE['id_user'])){ // vérifie si la session est active
    header("Location: connexion.php"); // redirection vers la page connexion (le formulaire de connexion)
    
    // cette page doit être accessible uniquement si l'utilisateur est connecté
}
$listPost = getPost(); // récupérer la list des posts
//  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>Espace membre - Accueil</title>
</head>
<body>
    <?php include_once "nav.php"; ?>

    <!-- Afficher les posts sur la page d'accueil -->
    <div class="containerPost">
        <?php foreach($listPost as $post){ ?>
            <div class="post">
                <div class="postimg"><img src="image/<?= $post['photo'];?>" alt="image"></div>
            </div>
            <p><?= $post['text']; ?></p>
            <div class="likeZone">
                <span><?= $post['likes']; ?></span>
                <p class="txtLike">likes</p>
                <a href="traitement_2.php?idpost=<?= $post['id_post'];?>"><i class="fa-solid fa-heart"></i></a>
            </div>
        <?php } ?>
    </div>

</body>
</html>