<?php

// CONSIGNES

// Creer une classe abstraite FormeGeometrique
// avec les attribut suivants:
//  1) Surface
//  2) perimetre

abstract class FormeGeometrique{
    // utilisé le mot clé 'protected' pour déclarer les attributs d'une class mère. 
    protected $surface;
    protected $perimetre;

    public function __construct($surface, $perimetre){
        $this->surface = $surface;
        $this->perimetre = $perimetre;  
    }
}


// Creer la classe Rectangle fille de FormeGeometrique avec les attributs suivant:
// 1) longueur
// 2) largeur
// et les methodes calculerSurface et calculerPerimetre
class Rectangle extends FormeGeometrique{
    // utilisé le mot clé 'private' pour déclarer les attributs d'une class fille (qui ne donnera pas d'enfant à son tour).
    private $longueur;
    private $largeur;

    public function __construct($surface,$perimetre,$longueur,$largeur){
        // $this->surface = $surface;
        // $this->perimetre = $perimetre;
        parent::__construct($surface,$perimetre); // attention à l'ordre des paramètres
        $this->longueur = $longueur;
        $this->largeur = $largeur;
    }

    public function calculerSurface(){
        return $this->surface = $this->longueur*$this->largeur;
        // return $this->surface;   // autre syntaxe
    }

    public function calculerPerimetre(){
        return $this->surface = ($this->longueur+$this->largeur)*2;
    }
}

$rectangle = new Rectangle(0,0,5,8);
echo "La surface du rectangle est de : ".$rectangle->calculerSurface()."<br><br>";
echo "Le perimetre du rectangle est de : ".$rectangle->calculerPerimetre()."<br><br>";



// Creer la classe Cercle fille de FormeGeometrique avec les proprietes suivantes:
// 1) rayon
// 2) et les methodes calculerSurface et calculerPerimetre

class Cercle extends FormeGeometrique{
    // utilisé le mot clé 'private' pour déclarer les attributs d'une class fille (qui ne donnera pas d'enfant à son tour).
    private $rayon;

    public function __construct($surface,$perimetre,$rayon){
        $this->surface = $surface;
        $this->perimetre = $perimetre;
        $this->rayon = $rayon;  
    }

    public function calculerSurface(){
        return $this->surface = round(M_PI * ($this->rayon * $this->rayon),2);
        // return $this->surface = round(pi() * pow($this->rayon,2),2);
        // Autre syntaxe
        // pow : pour la fonction au carré ou puissance, le deuxième paramètre est le chiffre carré ou puissance.
        // M_PI et pi() : appel la fonction pie
        
    }

    public function calculerPerimetre(){
        return $this->perimetre = round((2 * M_PI * $this->rayon),2);
    }
}

$cercle = new Cercle(0,0,5);
echo "La surface du cercle est de : ".$cercle->calculerSurface()."<br><br>";
echo "Le perimetre du cercle est de : ".$cercle->calculerPerimetre()."<br><br>";