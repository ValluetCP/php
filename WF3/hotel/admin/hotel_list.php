<?php include_once "../inc/header.php"; ?>
<?php require_once "../model/functions.php"; 
$listHotel = hotelList();
?>

<div class="container">
    <table class="table">
        <thead class="table-light">
            <tr>
                <th>Id Hotel</th>
                <th>Hotel Name</th>
                <th>Location</th>
                <th>Capacity</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach($listHotel as $hotel){ ?>
                <tr>
                    <td><?= $hotel['id_hotel']; ?></td>
                    <td><?= $hotel['hotel_name']; ?></td>
                    <td><?= $hotel['location']; ?></td>
                    <td><?= $hotel['capacity']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


<?php include_once "../inc/footer.php"; ?>