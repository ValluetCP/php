<?php

// ----------  CLASS MERE - HUMAIN ---------- //

//  class Humain qui sera la mère de Magicien et Patissier
class Humain{
    // les attributs communs aux classes filles (Magicien et Patissier)
    protected $nom;
    protected $prenom;

    // le constructeur
    public function __construct($nom, $prenom){
        $this->nom = $nom;
        $this->prenom = $prenom;
    }

    // méthodes communes aux filles
    public function dormir(){
        echo "Je fais dodo";
    }
}


// ----------  CLASS FILLE - MAGICIEN ---------- //

// classe magicien qui étend la classe Humain du coup magicien va hériter des propriétés et méthodes de Humain
class Magicien extends Humain{

    public $baguette;

    public function __construct($nom, $prenom, $baguette){
        // Hérite du constructor du parent :
        // $this->nom=$nom;
        // $this->prenom=$prenom;
        // peut être remplacé par la syntaxe suivante :
        parent::__construct($nom, $prenom);
        // suivi de sa propre propriété (variable)
        $this->baguette = $baguette;
    }

    public function faireUnTourDeMagie(){
        echo "Bonjour c'est ". $this->prenom." ". $this->nom." ! <br> Waouh! Voici un petit lapin sorti du chapeau. <br><br>";
    }
}

// instancier un magicien
$magic = new Magicien( "TARRO", "Julien", "baguette de sureau");
$magic->faireUnTourDeMagie();


// ----------  CLASS FILLE - PATISSIERE ---------- //

class Patissier extends Humain{

    public $batteur = "electrique";

    // méthode propre à la patissière
    public function faireDeBonGateau(){
        echo "Bonjour c'est ". $this->prenom." ". $this->nom." ! <br> J'ai un super batteur ". $this->batteur."! <br>Miam! Voici un délicieux gâteau. <br><br>";
    }
}

// instancier une patissière
$patissiere = new Patissier( "CHERIE", "Nawal");
$patissiere->faireDeBonGateau();

?>