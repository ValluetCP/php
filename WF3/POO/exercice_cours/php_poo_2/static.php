

<?php
class CompteBancaire{
    // declarer les proprietes normales
    private $numero;
    private $nom;
    private $solde;

    // declarer une propriete statique
    public static $nombreDeCompte = 0;

    // static : appartient à la classe
    // self : uniquement pour les propriétés et methodes static

    // le constructeur
    public function __construct($solde, $nom){
        // pour manipuler une propriete statique dans la classe on utilise le mot cle self suivi des "::"
        self::$nombreDeCompte++;
        $this->numero = "FR 76 00".self::$nombreDeCompte;
        $this->solde = $solde;
        $this->nom = $nom;
    }

    // creer un geter qui permet de recuperer le numero de compte
    public function getNumero(){
        return $this->numero;
    }
    
    public function getSolde(){
        return $this->solde;
        // echo "<hr><br> Je roule en ".$this->nom."possède : ".$this->solde."<br><br>";
    }

    // de creer une methode deposer qui prend 1 parametre : montant a deposer pour ajouter la somme dans le compte concerne
    public function deposer($montant){
        $this->solde = $this->solde+ $montant;
        return $this->solde;
    }

    // une methode retirer qui prend 1 parametre: le montant a retirer elle permet de retirer le montant du compte concerne
    public function retirer($montant){
        $this->solde = $this->solde - $montant;
        return $this->solde;
    }

    // // une methode transferer qui prend 2 parametres le numero de compte destinataire, le montant elle permet de transferer un montant d'un compte a un autre
    // public function transferer(){
    //     $this->solde = $this->solde - $this->retire;
    //     return $this->solde;
    // }

    // ------ CHAT GPT ------ //

    // une methode transferer qui prend 2 parametres : le numero de compte destinataire et le montant
    public function transferer($compteDestinataire, $montant) {
        // Vérifier si le solde est suffisant pour effectuer le transfert
        if ($this->solde >= $montant) {
            // Retirer le montant du compte source
            $this->solde -= $montant;
            
            // Déposer le montant sur le compte destinataire
            $compteDestinataire->deposer($montant);
            
            // Retourner true pour indiquer que le transfert a réussi
            return true;
        } else {

            // Retourner false si le solde est insuffisant pour le transfert
            return false;
        }

    }
}
// chaque compte bancaire est prefixe par cette chaine de caractere "FR 76 00"
// creer un compte 
$compte1 = new CompteBancaire(10, "Alin Mansita");
echo $compte1->getNumero()."<br><br>";

$compte2 = new CompteBancaire(2020, "Anna Kov");
echo $compte2->getNumero()."<br><br>";

// $compte1->deposer(455);

// COMPTE 1
echo "solde initiale : ".$compte1->getSolde()."<br><br>";
echo "solde après dépose : ".$compte1->deposer(40)."<br><br>";
echo "solde après retrait : ".$compte1->retirer(10)."<br><br><hr>";

// COMPTE 2
echo "solde initiale : ".$compte2->getSolde()."<br><br>";
echo "solde après dépose : ".$compte2->deposer(20)."<br><br>";
echo "solde après retrait : ".$compte2->retirer(5)."<br><br><hr>";

// Transfert de 5 du compte1 au compte2
if ($compte1->transferer($compte2, 5)) {
    echo "Transfert réussi. Solde de compte1 : " . $compte1->getSolde() . "<br><br>";
    echo "Solde de compte2 : " . $compte2->getSolde() . "<br>";
} else {
    echo "Transfert échoué. Solde insuffisant sur le compte1.";
}

