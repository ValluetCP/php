<?php
include_once "./inc/header.php";
include_once "./inc/functions.php";
include_once "./inc/nav.php";
require_once "../models/contestModel.php";
require_once "../models/playerModel.php";
require_once "../models/playerContestModel.php";

$playerList = Player::findAllPlayer();
// $PlayerContest = Player::findAllPlayerContest();


// debugDie($contestList);
if (isset($_GET['id_match'])) {
    // identifiant de l'emprunt
    $id = $_GET['id_match'];
    // appel de la methode returnBook
    $matchDetails = Contest::findContestById($id);
}
?>

<h1 class="m-5">Détail Match</h1>



<div class="container">
<h2>Info du match</h2>
<table>
    <tr>
        <th>Game title</th>
        <th>Number player</th>
        <th>Start date</th>
        <th>Winner nickname</th>
    </tr>
    <tr>
        <td><?= $matchDetails['title']; ?></td>
        <td><?= $matchDetails['nombre_de_joueurs']; ?></td>
        <td><?= $matchDetails['max_players']; ?></td>
        <td><?= $matchDetails['start_date']; ?></td>
        <td><?= $matchDetails['nickname']; ?></td>
    </tr>
</table>
</div>


<div class="container">
    <h1 class="m-5">Ajouter un joueur</h1>
    <form action="./traitement/action.php" method="post">
        
        <div class="form-group mb-3">
            <label class="m-2">Game :</label>
            <select name="player" class="form-control">
                <option value="">Choose player</option>
                <?php foreach($playerList as $player){ ?>
                    <option value="<?= $player['id_player']; ?>"><?= $player['nickname']; ?></option>
                <?php } ?>
            </select>
        </div>
        
        <div class="form-group  mb-3">
            <input type="hidden" class="form-control"  name="id_contest"  value="<?= $id; ?>" >
        </div>
 
        <button type="submit" class="btn btn-primary mt-5 mb-5" name="add_player_contest" value="add_contest">Ajouter un joueur</button>
    </form>
</div>


<div class="container">
    <h1 class="m-5">Liste de joueur du match</h1>
    <table>
    <tr>
        <th>Pseudonyme</th>
        <th>Email</th>
    </tr>
    <?php foreach($playerList as $player) { ?>
        <tr>
            <td><?= $player['pseudonyme']; ?></td>
            <td><?= $player['email']; ?></td>
        </tr>
    <?php } ?>
</table>
</div>

<?php
include_once "./inc/footer.php";
?>