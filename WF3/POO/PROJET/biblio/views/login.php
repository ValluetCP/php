<?php
session_start();
// session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/php/WF3/POO/PROJET/biblio/views/asset/css/style.css">

</head>
<body>
    <form action="traitement/action.php" method="post">
        
        <div>
            <label for="">Email</label>
            <input type="email" name="email" id="">
        </div>
        <div>
            <label for="">Password</label>
            <input type="password" name="password" id="">
        </div>

        <?php if(isset($_SESSION['error_message'])){?>
            <p style="color: red"><?= $_SESSION['error_message']; ?></p>
        <?php unset($_SESSION['error_message']);
    } ?>

        
        <button name="login" >Se connecter</button>
    </form>
</body>
</html>