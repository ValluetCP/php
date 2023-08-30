<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Espace membre - inscription</title>
</head>
<body>
    <?php include_once "nav.php"; ?>


    <div class="flexbox haut">
        <h2>Page d'inscription</h2>
        <input type="submit" class="connect submit" name="connect" value="Connexion">
    </div>

    <form method="POST" action="traitement_2.php" enctype="multipart/form-data">

        <input type="email" name="email" placeholder=" Votre email" require><br><br>

        <input type="text" name="pseudo" placeholder=" Votre pseudo" require><br><br>
        
        <input type="password" name="mdp" placeholder=" Mot de Passe" require><br><br>

        <input type="password" name="confirm" placeholder=" Confirmation du mot de Passe" require><br><br>

        <input type="file" name="image" class="file"  require><br><br>

        <div class="flexy">
            <input type="submit" class="inscription submit" name="inscription" value=" inscription">
        </div>
        
    </form>
</body>
</html>