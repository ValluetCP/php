<?php
    require_once('./inc/function.php');
    require_once('./inc/header.php');
?>

<div class="container">
    <h1>Register form</h1>
    <form action="./model/db_register.php" method="post">

        <div class="form-group mt-5 mb-5">
            <label>Civility :</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="civility" id="man" value="man">
                <label class="form-check-label" for="man">Man</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="civility" id="Woman" value="Woman">
                <label class="form-check-label" for="Woman">Woman</label>
            </div>
        </div>

        <div class="form-group">
            <label for="firstname">Firstname :</label>
            <input type="text" class="form-control" id="firstname" name="firstname" >
        </div>

        <div class="form-group">
            <label for="lastname">Lastname :</label>
            <input type="text" class="form-control" id="lastname" name="lastname" >
        </div>

        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" class="form-control" id="email" name="email" >
        </div>

        <div class="form-group">
            <label for="password">Password :</label>
            <input type="password" class="form-control" id="password" name="password" >
        </div>
        
        <div class="form-check mt-5 mb-5">
            <label class="form-check-label" for="birthday">Birthday</label>
            <input class="form-check-input" type="date" id="birthday" name="birthday">
        </div>

        <div class="form-check">
            <label class="form-check-label" for="phone">Phone</label>
            <input class="form-check-input" type="number" id="phone" name="phone">
        </div>
        
        <div class="form-group mb-5 mt-5">
            <label for="country">Country :</label>
            <select class="form-control" id="country" name="country">
                <option value="france">France</option>
                <option value="canada">Canada</option>
                <option value="usa">USA</option>
                <option value="autre">Other</option>
            </select>
        </div>

        <div class="form-group">
            <label for="message">Message :</label>
            <textarea class="form-control" id="message" name="message" rows="4" ></textarea>
        </div>

        <div class="form-check">
            <label class="form-check-label" for="conditions">Subscribe to the newsletter</label>
            <input class="form-check-input" type="checkbox" id="conditions" name="conditions" value="oui">
        </div>

        <button type="submit" id="bouton" class="btn btn-primary mt-5 mb-5" name="submit" value="submit">Submit</button>
    </form>
</div>

<?php
    require_once('./inc/footer.php');
?>