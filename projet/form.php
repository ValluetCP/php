<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
    <title>Formulaire PHP</title>
</head>
<body>
    <h1>Formulaire PHP</h1>
    <div class="container">
        <form action="./traitement/actionForm.php" method="POST">
            <h2>Informations</h2>
            <label for="civility">Civilité</label><br>
            <Select name="civility">
                <option value="monsieur">monsieur</option>
                <option value="madame">madame</option>
            </Select><br>

            <label for="firstname">First name</label><br>
            <input class="champs" type="text" name="firstname" id="firstname" placeholder=" Enter your firstname" required><br>
    
            <label for="lastname">Last name</label><br>
            <input class="champs" type="text" name="lastname" id="lastname" placeholder=" Enter your lastname" required><br>
    
            <label for="email">Email</label><br>
            <input class="champs" type="email" name="email" id="email" placeholder=" Enter your email" required><br>

            <label for="password">Mot de passe</label><br>
            <input class="champs" type="password" name="password" id="password" placeholder=" Enter your password" required><br>

            <div class="flexy numb">
                <div>
                    <label for="birthday">Date d'anniversaire</label><br>
                    <input class="champs2" type="birthday" name="birthday" id="birthday" placeholder=" JJ/MM/AAAA" required><br>
                </div>
                <div>
                    <label class="number" for="phone">Numéro de téléphone</label><br>
                    <input class="champs2" type="phone" name="phone" id="phone" placeholder=" +33 "required><br>
                </div>
            </div>

            <h2>Destination</h2>
            <fieldset class="radio">
                <p>Veuillez sélectionner un pays</p>
                <input type="radio" id="france" name="country" value="france">
                <label for="html">France</label><br>

                <input type="radio" id="espagne" name="country" value="espagne">
                <label for="espagne">Espagne</label><br>

                <input type="radio" id="allemagne" name="country" value="allemagne">
                <label for="allemagne">Allemagne</label>
            </fieldset>

            <p class="com">Laisser un commentaire</p>
            <textarea name="message" id="message" cols="30" rows="10" style="width: 635px; height: 194px;">Commentaire</textarea><br>

            <input type="checkbox" class="checkbox" name="conditions">
            <label for="conditions" class="condition">conditions générales de ventes</label><br>

            <input class="champs" type="submit" name="submit" id="submit" value="Envoyer">
        </form>
    </div>
    <!-- C'est PHP qui sert d'intermédiaire pour communiquer et interagir avec la base de donnée -->
    <!-- PHP est intermédiaire
    SGBD : serveur de bdd

    Les 6 éléments pour interagir avec la bdd
        1-le client (navigateur)
        2- HTML
        3- APACHE (serveur pour interpréter le langage PHP)
        4- PHP
        5-SGBD (serveur bdd)
        6- requête (langage mySQL)
-->
</body>
</html>