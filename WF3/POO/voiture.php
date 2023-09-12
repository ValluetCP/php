<?php


// ---------------- EXERCICE - Class Voiture ---------------- //


// Créez une classe Voiture avec les attributs suivants:
// couleur, marque, model

class Voiture{
    public $couleur;
    public $marque;
    public $model;

    // Créer les méthodes suivantes :
    // rouler, accélérer, freiner

    // pour la méthode rouler afficher le texte "Je roule"
    public function rouler(){
        echo "<hr><br> Je roule en"." ".$this->marque." ".$this->model." ".$this->couleur." ". "<br><br>";
    }

    // pour la méthode accélérer afficher le texte "J'accélère"
    public function accelerer(){
        echo "J'accélère en"." ".$this->marque." ".$this->model." ".$this->couleur." ". "<br><br>";
    }

    // pour la méthode freiner afficher le texte "Je freine"
    public function freiner(){
        echo "Je freine en"." ".$this->marque." ".$this->model." ".$this->couleur." ". "<br><br>";
    }

}

// Créez une voiture de marque peugeot de model 308 et de couleur noire

// On instancie une classe
$maVoiture = new Voiture();

// On affecte une valeur aux attributs
$maVoiture->couleur = "noire";
$maVoiture->marque = "peugeot";
$maVoiture->model = "308";

// On appel les méthodes : rouler, accélérer, freiner 
$maVoiture->rouler();
$maVoiture->accelerer();
$maVoiture->freiner();






// ----------- EXERCICE - Class Voiture constructeur ----------- //

class VoitureAvecConstructeur{
    // les attributs
    public $marque;
    public $modele;
    public $couleur;

    //constructeur
    public function __construct($brand, $model, $color){
        $this->marque = $brand;
        $this->modele = $model;
        $this->couleur = $color;
    }

        // Créer les méthodes suivantes :
    // rouler, accélérer, freiner

    // pour la méthode rouler afficher le texte "Je roule"
    public function rouler(){
        echo "<hr><br> Je roule en"." ".$this->marque." ".$this->modele." ".$this->couleur." ". "<br><br>";
    }

    // pour la méthode accélérer afficher le texte "J'accélère"
    public function accelerer(){
        echo "J'accélère en"." ".$this->marque." ".$this->modele." ".$this->couleur." ". "<br><br>";
    }

    // pour la méthode freiner afficher le texte "Je freine"
    public function freiner(){
        echo "Je freine en"." ".$this->marque." ".$this->modele." ".$this->couleur." ". "<br><br>";
    }
}

// Créer une voiture
$voiture2 = new VoitureAvecConstructeur("Citrën", "C4", "rouge");
$voiture2->rouler();
$voiture2->accelerer();
$voiture2->freiner();
