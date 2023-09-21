<?php
include_once "./inc/header.php";
include_once "./inc/nav.php";
require_once "../models/playerModel.php";
$playerList = Player::findAllPlayer();
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


<?php
include_once "./inc/footer.php";
?>