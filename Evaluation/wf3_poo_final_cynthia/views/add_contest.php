<?php
include_once "./inc/header.php";
include_once "./inc/nav.php";
require_once "../models/gameModel.php";
$gameList = Game::findAllGame();
?>

<div class="container">
    <h1 class="m-5">Ajouter un match</h1>
    <form action="./traitement/action.php" method="post">
        
        
        <div class="form-group mb-3">
            <label class="m-2">Game :</label>
            <select name="game" class="form-control">
                <option value="">Choose Game</option>
                <?php foreach($gameList as $game){ ?>
                    <option value="<?= $game['id_game']; ?>"><?= $game['title']; ?></option>
                <?php } ?>
            </select>
        </div>
        
        <div class="form-group  mb-3">
            <label class="m-2">Start date</label>
            <input type="date" class="form-control text-uppercase"  name="start_date" >
        </div>
 
        <button type="submit" class="btn btn-primary mt-5 mb-5" name="add_contest" value="add_contest">Ajouter un match</button>
    </form>
</div>

<?php
include_once "./inc/footer.php";
?>