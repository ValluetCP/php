<?php
require_once "../inc/database.php";
// Interaction avec la base de donnée

class AnimalRepository{
    private $id_animal;
    private $name;
    private $type;
    private $breed;

    public function __construct($name,$type,$breed){
        $this->name = $name;
        $this->type = $type;
        $this->breed = $breed;
    }

    public function insert(){
        // Créer une instance DbConnect
        $db = new dbConnect();
        
        
        // se connecter à la bd
        $connexionDb = $db->dbConnexion(); // methode 1
        // $db = $dbConnect->connexioDataBase; // methode 2

        //debugDie($connexionDb);

        //préparation de la requête
        $request = $connexionDb->prepare("INSERT INTO animal (name, type, breed) VALUES (?, ?, ?) ");

        //exécution de la requete
        try{ // essayer d'enregister les infos dans la table utilisateur
            $request->execute(array($this->name, $this->type, $this->breed));
            
        }catch(PDOException $e){
            echo $e->getMessage(); // afficher l'erreur sql généré
        }

    }
    
    public function findAll(){
        // Créer une instance DbConnect
        $db = new dbConnect();
        
        // se connecter à la bd
        $connexionDb = $db->dbConnexion(); // methode 1
        // $db = $dbConnect->connexioDataBase; // methode 2
        
        //préparation de la requête
        $request = $connexionDb->prepare("SELECT * FROM animal");

        //exécution de la requete
        try{ // essayer d'enregister les infos dans la table utilisateur
            $request->execute();
            $animaux = $request->fetchAll(PDO::FETCH_ASSOC);
            debugDie($animaux);
        }catch(PDOException $e){
            echo $e->getMessage(); // afficher l'erreur sql généré
        }return $animaux;

    }

    public function findById(){
        // Créer une instance DbConnect
        $db = new dbConnect();
        
        // se connecter à la bd
        $connexionDb = $db->dbConnexion(); // methode 1
        // $db = $dbConnect->connexioDataBase; // methode 2
        
        //préparation de la requête
        $request = $connexionDb->prepare("INSERT INTO animal (name, type, breed) VALUES (?, ?, ?) ");

        //exécution de la requete
        try{ // essayer d'enregister les infos dans la table utilisateur
            $request->execute(array($this->name, $this->type, $this->breed));
            
        }catch(PDOException $e){
            echo $e->getMessage(); // afficher l'erreur sql généré
        }

    }
}