<?php

// ------- EXERCICE - Class Cat constructeur les attributs PRIVATE (geter et seter)------- //

class Cat{
    // les attributs PRIVATE
    private $nom;
    private $couleur;
    private $race;
    private $age;

    // constructeur de la classe
    public function __construct($nom, $couleur, $race, $age){
        $this->nom = $nom;
        $this->couleur = $couleur;
        $this->race = $race;
        $this->age = $age;
    }
    
    
    // Créer le geter et le seter de la propriété age
    
    public function getAge(){
        // le geter, son rôle c'est de récupérer la valeur de la propriété déclare avec le mot clé private
        return$this->age;
        // retourne la valeur de $age
    }
    
    public function setAge($newAge){
        // le seter, son rôle est de mettre à jour(modifier) la propriété en question déclare avec le mot clé private
        $this->age = $newAge;
    }
    
}

// créer un chat
$chat1 = new Cat("cynthia", "beige", "siamois", 3);
// $chat1->age=4;
echo $chat1->getAge().'<br>';
$chat1->setAge(4);
echo $chat1->getAge();
?>