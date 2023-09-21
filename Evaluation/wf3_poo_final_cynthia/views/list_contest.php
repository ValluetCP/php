<?php
include_once "./inc/header.php";
include_once "./inc/nav.php";
require_once "../models/contestModel.php";
$contestList = Contest::findAllContest();

?>


<div class="container">
    <h1 class="m-5">Liste de match</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nom du jeu <br> (Game title)</th>
                <th>Nombre de joueurs enregistrés
<br> (Number player)</th>
                <th>Date de démarrage<br> (Start date)</th>
                <th>Pseudonyme du gagnant<br> (Winner nickname)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($contestList as $contest){ ?>
                <?php
                    // Convertir la date de début en un objet DateTime
                    $startDate = $contest['start_date'];
                    // Obtenir la date et l'heure actuelles
                    // $currentDate = new DateTime();
                    $currentDate = date("Y-m-d");
                    

                    // Vérifier si la date de début est dans le futur
                    if (strtotime($startDate) > strtotime($currentDate)) {
                        $rowClass = 'btn-close';
                    } else {
                        
                        $rowClass = ''; // Aucune classe spéciale si le match a déjà commencé
                    }
                ?>
                <tr class="<?= $rowClass; ?>">
                    
                    <td><?= $contest['title']; ?></td>
                    <td><?= $contest['nombre_de_joueurs']; ?></td>
                    <td><?= $contest['start_date']; ?></td>
                    <td><?= $contest['nickname']; ?></td>
                    <td><a class="btn btn-warning" href="./match.php?id_match=<?= $contest['id_contest']; ?>">Détail match</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


<?php
include_once "./inc/footer.php";
?>