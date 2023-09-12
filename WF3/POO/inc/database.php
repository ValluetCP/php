<!-- 
    CONSIGNES
    // creer la classe DbConnect permettant de se connecter a la base de donnees
 -->


<?php

class dbConnect{
    public function dbConnexion(){ 
    
        $connexionDb = null;
    
        try{ 
            $connexionDb = new PDO("mysql:host=localhost;dbname=cours_db","root", "" ); 
    
        }catch(PDOException $e){ // si la connexion échoue ...
            $connexionDb = $e->getMessage(); 
        }
        return $connexionDb; //retourne un objet de connexion ou une erreur
    }
}