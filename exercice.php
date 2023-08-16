<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice PHP</title>
</head>
<body>
    <?php
    // Exo 1:
    // À partir de la chaîne "La maison bleue", extrayez la sous-chaîne "bleue". puis l'afficher
    $chaine = "La maison bleue";

    // Résultat - Exo 1:
    $chaine = "La maison bleue";
    $mot = substr($chaine, 10);
    echo $mot."<br>";


    // Exo 2:
    // Remplacez le mot "mauvais" par "excellent" dans la chaîne suivante.
    $avis = "Ce film était vraiment mauvais.";
    // Effectuez le remplacement.

    // Résultat - Exo 2:
    $avis = "Ce film était vraiment mauvais.";
    $nouvelleAvis = str_replace("mauvais", "excellent", $avis);
    echo $nouvelleAvis."<br>";


    // Exo 3:
    // Vous avez une chaîne de texte et vous souhaitez capitaliser la première lettre de cette chaîne.
    // La chaîne de texte
    $texte = "bienvenue sur notre site web.";
    // Capitalisez la première lettre

    // Résultat - Exo 3:
    $texte = "bienvenue sur notre site web.";
    $premiereMaj = ucfirst($texte);
    echo $premiereMaj."<br>";


    // Exo 4:
    // Vous avez des informations sur un produit : nom, prix et quantité.
    $nomProduit = "Ordinateur portable";
    $prixUnitaire = 899.99;
    $quantite = 3;
    
    // Résultat - Exo 4:
    $tarif = $prixUnitaire*$quantite;
    echo $tarif."<br>";


    // Exo 6:
    // Vous avez un panier d'achats avec plusieurs articles et vous souhaitez calculer le prix total avec une remise.
    
    // Détails des articles
    $article1 = "Livre";
    $prixArticle1 = 12.99;
    $quantiteArticle1 = 2;
    
    $article2 = "DVD";
    $prixArticle2 = 9.99;
    $quantiteArticle2 = 3;
    
    $article3 = "Casque audio";
    $prixArticle3 = 49.99;
    $quantiteArticle3 = 1;
    
    // Calcul du prix total avant remise et affichage
    // Calcul de la remise (10 % du prix total avant remise) et affichage
    // Calcul du prix total après remise et affichage

    // Résultat - Exo 6:
    $prixTotal = ($prixArticle1*$quantiteArticle1)+($prixArticle2*$quantiteArticle2)+$prixArticle3;
    echo $prixTotal."<br>";

    $tarifRemise = $prixTotal*10/100;
    echo $tarifRemise."<br>";

    $prixRemise=$prixTotal*0.9;
    echo $prixRemise."<br>";

    
    // Exo 7:
    // Vous avez un montant en euros que vous souhaitez convertir en dollars américains.
    // Montant en euros
    $montantEuros = 100;
    // Taux de change : 1 euro = 1.18 dollars américains
    $tauxChange = 1.18;
    // Calculez le montant en dollars puis affichez le

    // Résultat - Exo 7:
    $montantEuros*=$tauxChange;
    echo $montantEuros."<br>";
    ?>

</body>
</html>

