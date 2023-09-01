<?php   
    session_start(); 
    require_once('./inc/function.php');
    require_once('./inc/header.php'); 
?>

<div class="container">
    <h1>Bonjour <?= $_SESSION["firstname"]; ?> </h1>
    
</div>