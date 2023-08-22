<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Exercice 1 - ennoncé-->
    <?php
        // Ajout et suppression d'éléments
        // Créez un tableau vide.
        // Ajoutez les nombres de 1 à 5 à ce tableau.
        // Supprimez le troisième élément.
        // Affichez le contenu final du tableau.


        // <!-- Exercice 1 -->

        $tab=[];
        for($i=1; $i<=5; $i++){
             $tab[] = $i;
        }

        unset($tab[2]);
        echo "<pre>";
        print_r ($tab);
        echo "</pre>";



        /* Exercice 2 - ennoncé */

        // Recherche et modification
        // Créez un tableau contenant plusieurs noms de pays.
        // Vérifiez si "France" est présent dans le tableau.
        // Si oui, remplacez "France" par "Espagne".
        // Affichez le tableau modifié.

        /* Exercice 2 */

        $pays=["France", "Portugal", "Bresil"];
        echo "<pre>";
        print_r ($pays);
        echo "</pre>";
        
        
        echo array_search ("France", $pays);

        // if (array_search == "true"){
        //     echo ("france");
        // }

        $replacement = array(0 => "Espagne", 3 => "Egypte");
        $changement = array_replace($pays, $replacement);
        echo "<pre>";
        print_r($changement);
        echo "</pre>";

        // Test
        $base = array("orange", "banana", "apple", "raspberry");
        $replacements = array(0 => "pineapple", 4 => "cherry");
        $replacements2 = array(0 => "grape");

        $basket = array_replace($base, $replacements, $replacements2);
        print_r($basket);


        /* Exercice 3 - ennoncé */
    
        # Tirage du loto :
        /*
        - on veut 5 n° au hasard
        - on des n° différents
        - numéros de 1 à 49
        - comment savoir si le n° est déjà sorti ?
        - Trier les n° pour l'affichage final
        - les numeros doivent etre séparé par des tirets (-) dans l'affichage final
        - exemple : 5-7-12-49-34
        - utilisez la fonction rand pour générer un nombre aléatoire
        - exemple : $nombreAleatoire = rand(1, 49);
        */

        $tableau=[];
        while(count ($tableau) <= 5){
            $nombreAleatoire = rand(1, 49);
            if(!in_array($nombreAleatoire, $tableau)){
                $tableau[] = $nombreAleatoire;
            }
        }

        
        sort($tableau);
        $tableau = implode(" - ", $tableau);
        // implode converti un tableau en chaîne de caractère
        echo ("<p>".$tableau."</p>");



        /* Exercice 4 - ennoncé */

        # Tirage EuroMillions
        /*
        - Pour jouer à EuroMillions , il vous sfaut cocher 7 numéros : 
        - 5 numéros sur une grille de 50 numéros 
        - et 2 étoiles sur une grille de 12 numéros. 
        - Vous remportez le jackpot si vous avez 5 numéros gagnants et les 2 étoiles.

        

        - ecrire une fonction tirage qui prends un deux parametres
        - le premier parametres correspond au nombre de numeros a tiré
        - le second correspond au nombre maximum que les numeros ne doivent pas dépasser
        */


       
        function tirage($nbrtire,$max){

            $tab2=[];
            
            while(count ($tab2) < $nbrtire){
                $nombreAleatoire2 = rand(1, $max);
                if(!in_array($nombreAleatoire2, $tab2)){
                    $tab2[] = $nombreAleatoire2;
                }
            }
            sort($tab2);
            return $tab2;
        }
        $numeros = tirage(5,50);
        $etoiles = tirage(2,12);
        echo implode(' - ', $numeros). " "."<p>".implode(' - ', $etoiles)."</p>";
    ?>
</body>
</html>