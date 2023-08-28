<?php

if(isset($_SESSION['id'])){?>

<nav class="flexbox end haut">
    <div class="profil">
        <img src="image/<?= $_SESSION["img"]; ?>"alt="profil">
    </div>
    <button class="connect deconnexion">Déconnexion</button>
</nav>

<?php } else { ?>
    <nav>
        <button><a href="connexion.php">Connexion</a></button>
    </nav>

<?php } ?>