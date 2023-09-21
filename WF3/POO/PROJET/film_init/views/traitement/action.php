
<?php
require_once "../../models/actorModel.php";
require_once "../../models/filmModel.php";

if(isset($_POST['add_film'])){
    $title = htmlspecialchars($_POST['title']);
    $numberMainActors = htmlspecialchars($_POST['number_main_actors']);
    $numberTotalActors = htmlspecialchars($_POST['number_total_actors']);

    // apeler la methode inscription de la classe User
    Film::addFilm($title, $numberMainActors,$numberTotalActors);
    // cette syntaxe uniquement pour appeler les méthodes static.
    // la méthode inscription étant static donc on utilise le nom de la classe suivi de "::" ensuite le nom de la méthode qui est inscriptions.

}

if(isset($_POST['add_actor'])){
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);

    // apeler la methode inscription de la classe User
    Actor::addActor($name, $email);
    // cette syntaxe uniquement pour appeler les méthodes static.
    // la méthode inscription étant static donc on utilise le nom de la classe suivi de "::" ensuite le nom de la méthode qui est inscriptions.

}

if(isset($_POST['modif_actor'])){
    $id = htmlspecialchars($_POST['id']);
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);

    // apeler la methode inscription de la classe User
    Actor::updateActorById($id, $name, $email);
    // cette syntaxe uniquement pour appeler les méthodes static.
    // la méthode inscription étant static donc on utilise le nom de la classe suivi de "::" ensuite le nom de la méthode qui est inscriptions.

}


if(isset($_GET['idActor'])){

    // identifiant de l'emprunter
    $idActor = htmlspecialchars($_GET['idActor']);

   // apeler la methode returnBook de la classe Book 
   Actor::deleteActorById($idActor);
}
