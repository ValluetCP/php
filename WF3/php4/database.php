<!-- Se connecter à la base de donnée -->
<!-- Fichier de connexion à la base de données -->

<?php
// try : c'est l'équivalent de if
// catch : c'est l'équivalent de else
// PDO : pour la connexion avec la bdd
// $e : déclarer une variable erreur (dans cette exemple)

function dbConnexion(){
    $connexionDb = null; // variable qui doit stocker notre instance de connexion à la base de données

    try{ // essayer de se connecter à la base de données
        // si tout se passe bien faire...
        $connexionDb = new PDO("mysql:host=localhost;dbname=cours_db","root", "" ); // on récupère l'objet de connexion à la bdd dans la variable $connexionDb

    }catch(PDOException $e){ // si la connexion échoue ...
        $connexionDb = $e; // on récupère notre erreur et stocker dans $connexionDb
    }
    return $connexionDb; //retourne un objet de connexion ou une erreur
}