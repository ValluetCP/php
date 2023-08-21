<?php

//isset permet de verifier si la variable existe et est différent de vide
if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm'])) {

    echo 'Bonjour'. ' '.$_POST['firstname'].$_POST['lastname'];

}else {
    // echo $_POST['firstname'].'<br>';
    // echo $_POST['lastname'].'<br>';
    // echo $_POST['email'].'<br>';
    // echo $_POST['password'].'<br>';
    // echo $_POST['confirm'].'<br>';
    if(($_POST['password']) == ($_POST['confirm'])){
        echo 'le mot de passe ne concorde pas, veuillez réessayer';

    }else{
        echo  "Vous devez remplir tous les champs.";
    } 

 } ?>