<?php
    
    session_start(); 
    require_once('./inc/function.php');
    require_once('./inc/header.php');

    
?>

<div class="container">
    <h1>Contact form</h1>
    <form action="./model/security.php" method="post">

        <?php if(isset($_SESSION['error'])){?>
            <p><?= $_SESSION['error']; ?></p>
        <?php } unset($_SESSION['error']); ?>

        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" class="form-control" id="email" name="email" >
        </div>

        <div class="form-group">
            <label for="password">Password :</label>
            <input type="password" class="form-control" id="password" name="password" >
        </div>
        
        <button type="submit" id="bouton" class="btn btn-primary mt-5 mb-5" name="submit" value="submit">Submit</button>
    </form>
</div>

<?php
    require_once('./inc/footer.php');
?>

