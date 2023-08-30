<?php
require_once 'database.php';
// établir la connexion avec la base de données
$db = dbConnexion(); // on appel la fonction 
// preparation de la requete
$request = $db->prepare("SELECT * FROM utilisateur");
// exécuter la requete
try{
    $request->execute();
    $users = $request->fetchAll(PDO::FETCH_ASSOC);
    // pour avoir uniquement un tableau associatif dans le fetchAll mettre PDO: :FETCH_ASSOC 
}catch(PDOException $e){
    $e->egetMessage();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $u){ ?>
                <tr>
                    <td><?= $u['nom']; ?></td>
                    <td><?= $u['prenom']; ?></td>
                    <td><?= $u['email']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>