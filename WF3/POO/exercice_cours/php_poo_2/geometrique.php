<?php

// CONSIGNES

// Creer une classe abstraite FormeGeometrique
// avec les attribut suivants:
//  1) Surface
//  2) perimetre

abstract class FormeGeometrique{
    public $surface;
    public $perimetre;

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
    public $longueur;
    public $largeur;

    public function __construct($surface,$perimetre,$longueur,$largeur){
        $this->surface = $surface;
        $this->perimetre = $perimetre;
        $this->longueur = $longueur;
        $this->largeur = $largeur;
    }

    public function calculerSurface(){
        return $this->surface = $this->longueur*$this->largeur;   
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
    public $rayon;

    public function __construct($surface,$perimetre,$rayon){
        $this->surface = $surface;
        $this->perimetre = $perimetre;
        $this->rayon = $rayon;  
    }

    public function calculerSurface(){
        return $this->surface = round(M_PI * ($this->rayon * $this->rayon),2);
        
    }

    public function calculerPerimetre(){
        return $this->perimetre = round((2 * M_PI * $this->rayon),2);
    }
}

$cercle = new Cercle(0,0,5);
echo "La surface du cercle est de : ".$cercle->calculerSurface()."<br><br>";
echo "Le perimetre du cercle est de : ".$cercle->calculerPerimetre()."<br><br>";