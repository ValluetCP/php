<?php
include_once "./inc/header.php";
include_once "./inc/nav.php";
require_once "../models/gameModel.php";
require_once "../models/playerModel.php";
require_once "../models/contestModel.php";
$playerList = Player::findAllPlayer();
$gameList = Game::findAllGame();
$contestList = Contest::findAllContest();
?>

<div class="container">
    <h1 class="m-5">Liste de joueur</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Id player</th>
                <th>email</th>
                <th>nickname</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($playerList as $player){ ?>
                <tr>
                    <td><?= $player['id_player']; ?></td>
                    <td><?= $player['email']; ?></td>
                    <td><?= $player['nickname']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<div class="container">
    <h1 class="m-5">Liste de jeu</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Id Movie</th>
                <th>Title</th>
                <th>Min players</th>
                <th>Max players</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($gameList as $game){ ?>
                <tr>
                    <td><?= $game['id_game']; ?></td>
                    <td><?= $game['title']; ?></td>
                    <td><?= $game['min_players']; ?></td>
                    <td><?= $game['max_players']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<div class="container">
    <h1 class="m-5">Liste de match</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nom du jeu <br> (Game title)</th>
                <th>Nombre de joueurs enregistrés
<br> (Number player)</th>
                <th>Date de démarrage<br> (Start date)</th>
                <th>Pseudonyme du gagnant<br> (Winner nickname)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($contestList as $contest){ ?>
                <?php
                    // Convertir la date de début en un objet DateTime
                    $startDate = $contest['start_date'];
                    // Obtenir la date et l'heure actuelles
                    // $currentDate = new DateTime();
                    $currentDate = date("Y-m-d");

                    // Vérifier si la date de début est dans le futur
                    if (strtotime($startDate) > strtotime($currentDate)) {
                        $rowClass = 'btn-close';
                    } else {
                        
                        $rowClass = ''; // Aucune classe spéciale si le match a déjà commencé
                    }
                ?>
                <tr class="<?= $rowClass; ?>">
                    
                    <td><?= $contest['title']; ?></td>
                    <td><?= $contest['nombre_de_joueurs']; ?></td>
                    <td><?= $contest['start_date']; ?></td>
                    <td><?= $contest['nickname']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php
include_once "./inc/footer.php";
?>