<?php

//isset permet de verifier si la variable existe 

if (isset($_POST['submit'])){
    //récupération des données
    $firstname = htmlspecialchars ($_POST['firstname']);
    $lastname = htmlspecialchars ($_POST['lastname']);
    $email = htmlspecialchars ($_POST['email']);
    $password = htmlspecialchars ($_POST['password']);
    $confirm = htmlspecialchars ($_POST['confirm']);


    //empty est différent de vide
    if (empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['confirm'])) {

        echo  "Vous devez remplir tous les champs.";

    }else if(($_POST['password']) !== ($_POST['confirm'])){
        echo 'le mot de passe ne concorde pas, veuillez réessayer';
        
    }else {
        // echo $_POST['firstname'].'<br>';
        // echo $_POST['lastname'].'<br>';
        // echo $_POST['email'].'<br>';
        // echo $_POST['password'].'<br>';
        // echo $_POST['confirm'].'<br>';

        echo 'Bonjour'. ' '.$_POST['firstname']. " ".$_POST['lastname'];
    }
} 

?>