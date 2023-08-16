<?php?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
</head>
<body>
    <?php echo "<h1>Hello world</h1>"; ?>
    <!-- ajouter “echo” pour rendre visible le code php dans la balise php -->
    <?php 

    // page 20
    $nom = "Heng";
    $prenom = "Mic";
    $nomcomplet = $prenom." ".$nom;
    echo "<p> Bonjour je suis ".$prenom. " ".$nom."</p>";
    echo "<p> Bonjour je suis ".$nomcomplet."</p>";
    echo $majuscules = strtoupper($nomcomplet)."<br>";
    // concaténation sur php c’est un point et non un plus comme js


    // Extraction de sous-chaînes (extraire des caractères)

    $phrase = "La programmation est amusante";
    $mot = substr($phrase, 3, 13); // Résultat : "programmation"
    // à partir du 3ème caractère, prendre les 13 caractères suivant
    echo $mot."<br>";

    $texte = "Bonjour tout le monde";
    $position = strpos($texte, "tout");
    echo $position."<br>";


    $texte = "Les chats sont adorables";
    echo $texte."<br>";
    $nouveauTexte = str_replace("chats", "chiens", $texte);
    echo $nouveauTexte."<br>";

    $texte = "Hello";
    echo $texte."<br>";

    // page 22
    $liste = "pomme,orange,banane";
    $tableau = explode(",", $liste); // Résultat : ["pomme", "orange", "banane"]
    print_r($tableau);
    // print_r : pour afficher un tableau

    





    
    ?>
</body>
</html>