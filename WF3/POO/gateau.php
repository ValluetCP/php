<?php

// ---- EXEMPLE - Class Moule (application du cours) ---- //

class Moule{
 // attributs du gateau
 public $gout;
 public $texture;
 
 // les methodes du gateau
 public function nourrir(){
 echo "je suis un gateau au ".$this->gout." ".$this->texture." je vous regale <br><br>";
 }
}
// creer un gateau au chocolat fondant
$gateauAuChocolat = new Moule(); // instancier un objet
$gateauAuChocolat->gout = "chocolat";
$gateauAuChocolat->texture = "fondant";
$gateauAuChocolat->nourrir();
 
$gateauAuCitron = new Moule(); // instancier un objet
$gateauAuCitron->gout = "citron";
$gateauAuCitron->texture = "fondant";
$gateauAuCitron->nourrir();



