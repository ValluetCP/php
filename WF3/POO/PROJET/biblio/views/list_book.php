<?php
require_once "../models/bookModel.php";

// on récupère la liste des livres
$listBook = Book::listBook();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/php/WF3/POO/PROJET/biblio/views/asset/css/style.css">
    <title>List Book</title>
</head>
<body>
    <?php require_once "./inc/nav.php";?>
    <h1>List book</h1>
    <div class="container">
        <?php foreach($listBook as $book){ ?>
            <div class="book">
                <h2><?= $book['title']; ?></h2>
                <h3><?= $book['author']; ?></h3>
                <p><?= $book['publication']; ?></p>
                <!-- Si le livre est dispo faire apparaître le bouton, fait un bouton pour qu'on puisse emprunter le livre -->
                <?php if($book['state'] == "available"){ ?>
                    <a class="lien" href="./traitement/action.php?book=<?= $book['id_book']; ?>">Borrow This book</a>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
    
</body>
</html>