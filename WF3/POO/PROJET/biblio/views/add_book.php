<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/php/WF3/POO/PROJET/biblio/views/asset/css/style.css">

</head>
<body>
    <?php require_once "./inc/nav.php";?>
    <h1>Add book</h1>
    <form action="traitement/action.php" method="post">
        <div>
            <label for="">Title</label>
            <input type="text" name="title" id="">
        </div>
        <div>
            <label for="">Author</label>
            <input type="text" name="author" id="">
        </div>
        <div>
            <label for="">Publication</label>
            <input type="date" name="publication" id="">
        </div>
        
        <button name="add" >Add</button>
    </form>
</body>
</html>