<?php
include_once "./inc/header.php";
include_once "./inc/nav.php";
?>

<div class="container">
    <h1 class="m-5">Ajouter un joueur</h1>
    <form action="./traitement/action.php" method="post">
        
        <div class="form-group  mb-3">
            <label class="m-2">Email</label>
            <input type="email" class="form-control text-uppercase"  name="email" >
        </div>
        
        <div class="form-group  mb-3">
            <label class="m-2">Nickname</label>
            <input type="text" class="form-control text-uppercase"  name="nickname" >
        </div>
 
        <button type="submit" class="btn btn-primary mt-5 mb-5" name="add_player" value="add_player">Ajouter un joueur</button>
    </form>
</div>

<?php
include_once "./inc/footer.php";
?>