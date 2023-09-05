<?php include_once "../inc/header.php"; ?>
<?php require_once "../model/functions.php"; 
$listBook = bookList();
?>

<div class="container">
    <table class="table">
        <thead class="table-light">
            <tr>
                <th>Id Book</th>
                <th>Hotel Name</th>
                <th>Location</th>
                <th>Capacity</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach($listBook as $book){ ?>
                <tr>
                    <td><?= $book['id_book']; ?></td>
                    <td><?= $book['book_name']; ?></td>
                    <td><?= $book['location']; ?></td>
                    <td><?= $book['capacity']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include_once "../inc/footer.php"; ?>