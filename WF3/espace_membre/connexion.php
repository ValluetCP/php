<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Espace membre - Connexion</title>
</head>
<body>
<?php include_once "nav.php"; ?>

    <div class="flexbox haut">
        <h2>Page Connexion</h2>
        <input type="submit" class="connect submit" name="connect" value="Connexion">
    </div>

    <form method="POST" action="traitement_2.php" enctype="multipart/form-data">

        <input type="text" name="pseudo" placeholder=" Votre pseudo"><br><br>
        
        <input type="password" name="mdp" placeholder=" Mot de Passe"><br><br>

        <div class="flexy">
            <input type="submit" class="inscription submit" name="connect" value=" Connexion">
        </div>
        
    </form>
</body>
</html>