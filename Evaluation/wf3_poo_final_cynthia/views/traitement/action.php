
<?php
require_once "../../models/playerModel.php";
require_once "../../models/gameModel.php";
require_once "../../models/contestModel.php";
require_once "../../models/playerContestModel.php";


// TABLE PLAYER //

if(isset($_POST['add_player'])){
    $email = htmlspecialchars($_POST['email']);
    $nickname = htmlspecialchars($_POST['nickname']);

    // apeler la methode inscription de la classe User
    Player::addPlayer($email,$nickname);
    // cette syntaxe uniquement pour appeler les méthodes static.
    // la méthode inscription étant static donc on utilise le nom de la classe suivi de "::" ensuite le nom de la méthode qui est inscriptions.

}


// TABLE GAME //

if(isset($_POST['add_game'])){
    $title = htmlspecialchars($_POST['title']);
    $min_players = htmlspecialchars($_POST['min_players']);
    $max_players = htmlspecialchars($_POST['max_players']);

    // apeler la methode inscription de la classe User
    Game::addGame($title,$min_players,$max_players);
    // cette syntaxe uniquement pour appeler les méthodes static.
    // la méthode inscription étant static donc on utilise le nom de la classe suivi de "::" ensuite le nom de la méthode qui est inscriptions.

}



// TABLE CONTEST //


if(isset($_POST['add_contest'])){
    $game = htmlspecialchars($_POST['game']);
    $start_date = htmlspecialchars($_POST['start_date']);

    // apeler la methode inscription de la classe User
    Contest::addContest($game,$start_date);
    // cette syntaxe uniquement pour appeler les méthodes static.
    // la méthode inscription étant static donc on utilise le nom de la classe suivi de "::" ensuite le nom de la méthode qui est inscriptions.

}

// ZONE PLAYER CONTEST //


if(isset($_POST['add_player_contest'])){
    $player = htmlspecialchars($_POST['player']);
    $id_contest = htmlspecialchars($_POST['id_contest']);

    // apeler la methode inscription de la classe User
    PlayerContest::addPlayerContest($player,$id_contest);
    // cette syntaxe uniquement pour appeler les méthodes static.
    // la méthode inscription étant static donc on utilise le nom de la classe suivi de "::" ensuite le nom de la méthode qui est inscriptions.

}

if(isset($_POST['add_player_contest'])){
    $player = htmlspecialchars($_POST['player']);
    $id_contest = htmlspecialchars($_POST['id_contest']);

    // apeler la methode inscription de la classe User
    PlayerContest::addPlayerContest($player,$id_contest);
    // cette syntaxe uniquement pour appeler les méthodes static.
    // la méthode inscription étant static donc on utilise le nom de la classe suivi de "::" ensuite le nom de la méthode qui est inscriptions.

}


// METHOD GET

// $matchId = $_GET['id'];


// if (isset($_GET['id_match'])) {
//     // identifiant de l'emprunt
//     $matchId = $_GET['id_match'];
//     // appel de la methode returnBook
//     $matchDetails = Contest::findAllContest();
// }
