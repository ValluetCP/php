<?php
    require_once('./inc/function.php');
    require_once('./inc/header.php');
?>

    <div class="container">
        <form action="traitement.php" method="post" enctype="multipart/form-data">
            <div>
                <input type="text" name="firstname" placeholder="Your firstname">
            </div>
            <div>
                <input type="text" name="lastname" placeholder="Your lastname">
            </div>
            <div>
                <input type="email" name="email" placeholder="Your email">
            </div>
            <div>
                <input type="password" name="password" placeholder="Votre password">
            </div>
            <div>
                <input type="date" name="birthday" placeholder="Your birthday">
            </div>

            <div>
                <input type="number" name="phone" placeholder="Votre mot de passe">
            </div>

            <div>
                <input type="password" name="confirm_mdp" placeholder="Confirmer le mot de passe">
            </div>

            <div>
                <input type="file" name="photo">
            </div>

            <div>
                <button name="valider">Inscription</button>
            </div>
        </form>
    </div>

<?php
    require_once('./inc/footer.php');
?>