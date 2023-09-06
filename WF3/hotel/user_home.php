<?php 
session_start();
require_once "model/functions.php";
include_once "inc/header.php" ;
$userBookList = userBookList($_SESSION['id_user']);
$price = 0;
?>

<div class="container">
    <table class="table">
        <thead class="table-light">
            <tr>
                <th>Id Reservation</th>
                <th>State Date</th>
                <th>End Date</th>
                <th>State</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach($userBookList as $book){ 
                $price+=$book['booking_price'];?>
                <tr>
                    <td><?= $book['id_booking']; ?></td>
                    <td><?= $book['booking_start_date']; ?></td>
                    <td><?= $book['booking_end_date']; ?></td>
                    <td><?= $book['booking_state']; ?></td>
                    <td><?= $book['booking_price']; ?></td>
                    <td><a class="btn btn-warning" href="./model/db_booking.php?id_book=<?= $book['id_booking']; ?>">Cancel</a></td>
                </tr>
            <?php } ?>
        </tbody>
        <tfoot class="table-light">
            <tr class="table-active">
                <td colspan="4" >Total de vos réservation : </td>
                <td colspan="2" ><?= $price; ?></td>
            </tr>
        </tfoot>
    </table>
</div>

<?php include_once "inc/footer.php"; ?>

