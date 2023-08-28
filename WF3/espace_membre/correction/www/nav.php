<?php

if(isset($_SESSION['id'])){?>

<nav>
    <img src="img/<?= $_SESSION["img"]; ?>"alt="profil">
    <button>Déconnexion</button>
</nav>

<?php } else { ?>
    <nav>
        <button><a href="connexion.php">Connexion</a></button>
    </nav>

<?php } ?>



