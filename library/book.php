<?php
    require_once('./inc/function.php');
    require_once('./inc/header.php');
?>

<div class="container">
    <h1>Recording of books</h1>
    <form action="./model/db_book.php" method="post">

        <div class="form-group">
            <label for="author">Author :</label>
            <input type="text" class="form-control" id="author" name="author" required>
        </div>

        <div class="form-group">
            <label for="title">Title :</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="form-check mt-5 mb-5">
            <label class="form-check-label" for="publication">Publication</label>
            <input class="form-check-input" type="date" id="publication" name="publication">
        </div>


        <div class="form-check">
            <label class="form-check-label" for="stock">Stock :</label>
            <input class="form-check-input" type="number" id="stock" name="stock">
        </div>

        <button type="submit" id="bouton" class="btn btn-primary mt-5 mb-5">Submit</button>
    </form>
</div>

<?php
    require_once('./inc/footer.php');
?>