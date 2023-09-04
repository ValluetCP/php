<?php include_once "../inc/header.php"; ?>
<?php require_once "../model/functions.php"; 
$listHotel = hotelList();
?>


<div class="container">
    <form action="../model/db_room.php" method="post" enctype="multipart/form-data">     
 
        <div class="form-group mb-3">
            <label class="m-2">Hotel :</label>
            <select name="hotel" class="form-control">
                <option value="">Choose hotel</option>
                <?php foreach($listHotel as $hotel){ ?>
                    <option value="<?= $hotel['id_hotel']; ?>"><?= $hotel['hotel_name']; ?></option>
                <?php } ?>
            </select>
        </div>
        
        <div class="form-group mb-3">
            <label class="m-2">Room Number :</label>
            <input type="text" class="form-control" name="room_number">
        </div>
 
        <div class="form-group mb-3">
            <label class="m-2">Room Price :</label>
            <input type="text" class="form-control" name="room_price" >
        </div>
 
        <div class="form-group mb-3">
            <label class="m-2">Persons :</label>
            <input type="number" class="form-control" name="person" >
        </div>
 
        <div class="form-group mb-3">
            <label class="m-2">Category :</label>
            <select name="category" class="form-control">
                <option value="">Choose category</option>
                <option value="classic">Classic</option>
                <option value="vip">VIP</option>
            </select>
        </div>
        
        <div class="form-group mb-3">
            <label class="m-2">Photo :</label>
            <input type="file" class="form-control" name="image" >
        </div>

        <button type="submit" id="bouton" class="btn btn-primary mt-5 mb-5" name="add_room" value="submit">Add hotel</button>
    </form>
</div>

<?php include_once "../inc/footer.php"; ?>