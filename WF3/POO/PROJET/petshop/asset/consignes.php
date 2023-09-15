<?php
// A partir de la class AnimalRepository implanter la méthode suivante:
// public function findAll(){
//     // Créer une instance DbConnect
//     $db = new dbConnect();
    
//     // se connecter à la bd
//     $connexionDb = $db->dbConnexion(); // methode 1
//     // $db = $dbConnect->connexioDataBase; // methode 2
    
//     //préparation de la requête
//     $request = $connexionDb->prepare("SELECT * FROM animal");

//     //exécution de la requete
//     try{ // essayer d'enregister les infos dans la table utilisateur
//         $request->execute();
//         $animaux = $request->fetchAll(PDO::FETCH_ASSOC);
//         debugDie($animaux);
//     }catch(PDOException $e){
//         echo $e->getMessage(); // afficher l'erreur sql généré
//     }return $animaux;

// }
?>