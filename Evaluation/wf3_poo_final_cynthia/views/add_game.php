<?php
include_once "./inc/header.php";
include_once "./inc/nav.php";
?>

<div class="container">
    <h1 class="m-5">Ajouter un jeu</h1>
    <form action="./traitement/action.php" method="post">
        
        <div class="form-group  mb-3">
            <label class="m-2">Title</label>
            <input type="text" class="form-control "  name="title" >
        </div>
        
        <div class="form-group  mb-3">
            <label class="m-2">Minimum de joueur</label>
            <input type="number" class="form-control "  name="min_players" >
        </div>
        
        <div class="form-group  mb-3">
            <label class="m-2">Max de joueur</label>
            <input type="number" class="form-control "  name="max_players" >
        </div>
 
        <button type="submit" class="btn btn-primary mt-5 mb-5" name="add_game" value="add_game">Ajouter un jeu</button>
    </form>
</div>

<?php
include_once "./inc/footer.php";
?>