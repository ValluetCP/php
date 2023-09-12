<!-- 
CONSIGNES
// inclure le fichier utilisateur.php
// recuperer les information du formulaire
// creer un instance de la classe Utilisateur
// appeler la methode inscription pour enregistrer les donnees dans bd 

-->

<?php

require_once("../utilisateur.php");

if(isset($_POST['inscription'])){
    // récupération des données saisies par l'utilisateur
    $nom=htmlspecialchars($_POST['nom']);
    $prenom=htmlspecialchars($_POST['prenom']);
    $email=htmlspecialchars($_POST['email']);
    $mdp=htmlspecialchars($_POST['mdp']);

    // on appel le constructeur
    $utilisateur = new Utilisateur($nom,$prenom,$email,$mdp);
    $utilisateur->inscrire();

    
}

?>