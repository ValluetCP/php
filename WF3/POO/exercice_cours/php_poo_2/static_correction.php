<?php
class CompteBancaire{
    // declarer les proprietes normales
    private $numero;
    private $nom;
    private $solde;
    // declarer une propriete statique
    public static $nombreDeCompte = 0;
    public static $listCompte = [];
    // le constructeur
    public function __construct($solde, $nom){
        // pour manipuler une propriete statique dans la classe on utilise le mot cle self suivi des "::"
        self::$nombreDeCompte++;
        $this->numero = "FR 76 00".self::$nombreDeCompte;
        $this->solde = $solde;
        $this->nom = $nom;
        array_push(self::$listCompte, $this);
    }

    // creer un geter qui permet de recuperer le numero de compte
    public function getNumero(){
        return $this->numero;
    }
    // 
    public function deposer($montant){
        $this->solde+=$montant;
    }
    // 
    public function retirer($montant){
        $this->solde-=$montant;
    }
    // 
    public function transferer($numero, $montant){
        foreach(self::$listCompte as $compte){
            if($compte->numero == $numero){
                $compte->solde+=$montant;
                $this->solde-=$montant;
                return;
            }
        }
    }

    public function getSolde(){
        return $this->solde;
    }


}
// chaque compte bancaire est prefixe par cette chaine de caractere "FR 76 00"
// creer un compte 
$compte1 = new CompteBancaire(10, "Alin Mansita");
// echo $compte1->getNumero()."<br>";
$compte2 = new CompteBancaire(100, "Wassila Boukedroun");
// echo $compte2->getNumero();
$compte2->transferer($compte1->getNumero(), 50);
echo $compte1->getSolde();
