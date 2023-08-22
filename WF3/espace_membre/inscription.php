<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace membre - inscription</title>
</head>
<body>
<form method="POST" action="traitement.php" enctype="multipart/form-data">
 
 <div>
    <input type="submit" class="connect" name="connect" value="Connexion"><br><br>
     <div>
         <input type="email" name="email" placeholder="Votre email"><br><br>
     </div>
     <div>
         <input type="text" name="pseudo" placeholder="Votre pseudo"><br><br>
     </div>
     <div>
         <input type="password" name="mdp" placeholder="Mot de Passe"><br><br>
     </div>
     <div>
         <input type="password" name="confirm" placeholder="Confirmation du mot de Passe"><br><br>
     </div>
     <div>
         <input type="file" name="file"><br><br>
     </div>
     <input type="submit" class="inscription" name="inscription" value="inscription">
 </div>
</form>
</body>
</html>