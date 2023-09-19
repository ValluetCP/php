<?php
require_once "../models/userModel.php";

// on récupère la liste des livres
$borrowlist = User::borrowLog($_COOKIE['id_user']);
?>

<!-- Page historique - Liste des livres empruntés -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/php/WF3/POO/PROJET/biblio/views/asset/css/style.css">
    <title>List Borrow</title>
</head>
<body>
    <?php require_once "./inc/nav.php";?>
    <h1>List Borrow</h1>
    <div class="container">
       <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Title</th>
                <th>Rendre le livre</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($borrowlist as $borrow){ ?>
            <tr>
            <!-- pour rendre un livre -->
                <td class="center"><?= $borrow['id_borrow']; ?></td>
                <td class="center"><?= $borrow['start_date']; ?></td>
                <td class="center"><?= $borrow['end_date']; ?></td>
                <td class="espace"><?= $borrow['title']; ?></td>
                <?php if($borrow['end_date'] == NULL){ ?>
                    <td class="center"><a href="traitement/action.php?borrow=<?= $borrow['id_borrow']; ?>&bookId=<?= $borrow['book_id']; ?>">rendre le livre</a></td>
                <?php } ?>
            </tr>
        <?php } ?>

        </tbody>
       </table>
    </div>
    
</body>
</html>