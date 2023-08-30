<?php

if(isset($_SESSION['id'])){?>

<nav class="flexbox end haut">
    <a href="post.php">publier</a>
    <div class="profil">
        <img src="image/<?= $_SESSION["img"]; ?>"alt="profil">
    </div>
    <form method="post">
        <button class="logout connect deconnexion" name="logout">Déconnexion</button>
    </form>
</nav>

<?php } else { ?>
    <nav>
        <button><a href="connexion.php">Connexion</a></button>
    </nav>
<?php } ?>

<!-- Quand on se déconnecte, on détruit tout -->
<?php if(isset($_POST['logout'])){
    session_destroy(); // détruit toutes les variables de sessions du site. Permet de vider toutes les valeurs de $_SESSION. Retourne donc un tableau vide
    header("Location: connexion.php");
    // autre syntaxe : 
    // echo"<script>location.href='connexion.php'</script>";
} ?>