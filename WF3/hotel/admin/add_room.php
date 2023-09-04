<?php include_once "../inc/header.php"; ?>

<div class="container">
    <form action="../model/db_hotel.php" method="post">     
 
        <div class="form-group mb-3">
            <label class="m-2">Hotel :</label>
            <select name="hotel">
                
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
            <select name="category">
                <option value="">Choose category</option>
                <option value="classic">Classic</option>
                <option value="vip">VIP</option>
            </select>
        </div>

        <button type="submit" id="bouton" class="btn btn-primary mt-5 mb-5" name="add_hotel" value="submit">Add hotel</button>
    </form>
</div>

<?php include_once "../inc/footer.php"; ?>