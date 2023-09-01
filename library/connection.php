<?php   
    session_start(); 
    require_once('./inc/function.php');
    require_once('./inc/header.php');   
?>

<div class="container">
    <h1>Connection</h1>
    <form action="./model/security.php" method="post">

        <?php if(isset($_SESSION['error'])){?>
            <div class="alert alert-warning" role="alert"><?= $_SESSION['error']; ?></div>
        <?php } unset($_SESSION['error']); ?>
        
        <?php if(isset($_SESSION['errorUser'])){?>
            <div class="alert alert-danger" role="alert"><?= $_SESSION['errorUser']; ?></div>
        <?php } unset($_SESSION['errorUser']); ?>

        <div class="form-group">
            <label for="firstname">Firstname :</label>
            <input type="firstname" class="form-control" id="firstname" name="firstname" >
        </div>

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

