<?php include_once "inc/header.php"; ?>

<div class="container">
<form action="./model/inscription.php" method="post">
        <div class="form-group mt-5 mb-5 d-flex justify-content-around">
            <label class="me-xl-5">Gender :</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="male" value="M">
                <label class="form-check-label">Male</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="female" value="F">
                <label class="form-check-label">Female</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="other" value="O">
                <label class="form-check-label">Other</label>
            </div>
        </div>
 
        <div class="form-group  mb-3">
            <label for="firstname" class="m-2">Firstname :</label>
            <input type="text" class="form-control" id="firstname" name="firstname" >
        </div>
 
        <div class="form-group  mb-3">
            <label for="lastname"  class="m-2">Lastname :</label>
            <input type="text" class="form-control" id="lastname" name="lastname" >
        </div>
 
        <div class="form-group  mb-3">
            <label for="email"  class="m-2">Email :</label>
            <input type="email" class="form-control" id="email" name="email" >
        </div>
 
        <div class="form-group  mb-3">
            <label for="password"  class="m-2">Password :</label>
            <input type="password" class="form-control" id="password" name="password" >
        </div>

        <div class="form-group  mb-3">
            <label  class="m-2">Address :</label>
            <input type="text" class="form-control" name="address" >
        </div>
        
        <div class="form-group  mb-3">
            <label  class="m-2">Phone number :</label>
            <input type="text" class="form-control" name="phone" >
        </div>

        <div class="form-group  mb-3">
            <label  class="m-2">Birthday:</label>
            <input type="date" class="form-control" name="birthday" >
        </div>
    
        <button type="submit" id="bouton" class="btn btn-primary mt-5 mb-5" name="submit" value="submit">Submit</button>
    </form>
</div>

<?php include_once "inc/footer.php"; ?>