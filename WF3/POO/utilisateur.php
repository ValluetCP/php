<?php
require_once "inc/database.php";
// Créer la classe utilisateur avec les proprietes:
class Utilisateur{

    // nom, prenom, email, mot de passe
    private $nom;
    private $prenom;
    private $email;
    private $motDePasse;

    public function __construct($nom,$prenom,$email,$motDePasse){
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->motDePasse = $motDePasse;
    }
    
    public function inscrire(){
        // Créer une instance DbConnect
        $db = new dbConnect();

        // se connecter à la bd
        $connexionDb = $db->dbConnexion();

        //préparation de la requête
        $request = $connexionDb->prepare("INSERT INTO utilisateur (nom, prenom, email, mdp) VALUES (?, ?, ?, ?) ");


        // ----------  EXECUTION D'UNE REQUETE ---------- //

        //exécution de la requete

        try{ // essayer d'enregister les infos dans la table utilisateur
            $request->execute(array($this->nom, $this->prenom, $this->email, $this->motDePasse));
            
        }catch(PDOException $e){
            echo $e->getMessage(); // afficher l'erreur sql généré
        }
    }

    // Les méthodes : s'inscrire, se connecter, se deconnecter
    
}





?>