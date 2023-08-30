<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include_once "nav.php"; ?>
    <form method="POST" action="traitement.php" >
 
        <div>
            <div>
                <input type="text" name="pseudo" placeholder="Votre pseudo"><br>
            </div>
            <div>
                <input type="password" name="mdp" placeholder="Votre pseudo"><br>
            </div>
            <div>
                <input type="password" name="mdp" placeholder="Votre pseudo"><br>
            </div>
            
            <input type="submit" class="envoi" name="envoi">
        </div>
    </form>
</body>
</html>