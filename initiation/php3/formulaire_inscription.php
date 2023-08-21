<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- # Exercice : Formulaire d'Inscription
/*
Dans cet exercice, vous allez créer un formulaire d'inscription en HTML et traiter les données soumises en utilisant PHP. Le formulaire d'inscription demandera aux utilisateurs de saisir leur nom, leur adresse e-mail, un mot de passe et de confirmer le mot de passe.

 

Créez un fichier HTML nommé formulaire_inscription.html contenant un formulaire d'inscription avec les champs suivants :
Nom complet (input de type texte)
Adresse e-mail (input de type email)
Mot de passe (input de type password)
Confirmer le mot de passe (input de type password)
Créez un fichier PHP nommé traitement_inscription.php pour traiter les données du formulaire d'inscription. Dans ce fichier :

 

Utilisez la méthode POST pour récupérer les données soumises du formulaire ($_POST).
Vérifiez si les champs nom, adresse e-mail, mot de passe et confirmation du mot de passe ne sont pas vides.
Vérifiez si le mot de passe et la confirmation du mot de passe correspondent.
Si tous les champs sont remplis et les mots de passe correspondent, affichez un message de confirmation.
Si au moins un champ est vide ou les mots de passe ne correspondent pas, affichez un message d'erreur et indiquez les champs manquants ou incohérents.
Dans le fichier HTML, assurez-vous que le formulaire envoie les données soumises à la page de traitement PHP (traitement_inscription.php) en utilisant la méthode POST. -->
    
    <form action="traitement_inscription.php" method="post">

            <label for="firstname">First name</label><br><br>
            <input class="champs" type="text" name="firstname" id="firstname" placeholder=" Enter your firstname" required><br><br>
    
            <label for="lastname">Last name</label><br><br>
            <input class="champs" type="text" name="lastname" id="lastname" placeholder=" Enter your lastname" required><br><br>
    
            <label for="email">Email</label><br><br>
            <input class="champs" type="email" name="email" id="email" placeholder=" Enter your email" required><br><br>

            <label for="password">Mot de passe</label><br><br>
            <input class="champs" type="password" name="password" id="password" placeholder=" Enter your password" required><br><br>

            <label for="confirm">Confirmer le Mot de passe</label><br><br>
            <input class="champs" type="password" name="confirm" id="confirm" placeholder=" Confirm your password" required><br><br>

            <input class="champs" type="submit" name="submit" id="submit" value="submit">

    </form>
</body>
</html>