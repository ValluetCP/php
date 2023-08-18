<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
    <title>Formulaire PHP</title>
</head>
<body>
    <h1>Formulaire PHP</h1>
    <div class="container">
        <form action="" method="">
            <label for="firstname">First name</label><br>
            <input type="text" name="firstname" id="firstname" placeholder=" Enter your firstname" required><br>
    
            <label for="lastname">Last name</label><br>
            <input type="text" name="lastname" id="lastname" placeholder=" Enter your lastname" required><br>
    
            <label for="email">Email</label><br>
            <input type="email" name="email" id="email" placeholder=" Enter your email" required><br>
    
            <input type="submit" name="submit" id="submit" value="Submit">
        </form>
    </div>
</body>
</html>