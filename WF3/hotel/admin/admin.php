<?php include_once "../inc/header.php"; ?>

<div class="container d-flex justify-content-around">
    <div class="card" style="width: 18rem;">
        <i class="fa-solid fa-plus text-center mt-3"></i>
        <div class="card-body">
            <h5 class="card-title">Ajout hôtel</h5>
            <p class="card-text">Cliquez ici pour ajouter un hôtel.</p>
            <a href="add_hotel.php" class="btn btn-primary mt-4">Ajouter un hôtel</a>
        </div>
    </div>
    
    <div class="card" style="width: 18rem;">
        <i class="fa-solid fa-plus text-center mt-3"></i>
        <div class="card-body">
            <h5 class="card-title">Ajout chambre</h5>
            <p class="card-text">Cliquez ici pour ajouter une chambre.</p>
            <a href="add_room.php" class="btn btn-primary">Ajouter une chambre</a>
        </div>
    </div>
    
    <div class="card" style="width: 18rem;">
        <i class="fa-solid fa-list text-center mt-3"></i>
        <div class="card-body">
            <h5 class="card-title">Liste réservation</h5>
            <p class="card-text">Cliquez ici pour la liste des réservations.</p>
            <a href="#" class="btn btn-primary">Liste de réservation</a>
        </div>
    </div>
</div>

<?php include_once "../inc/footer.php"; ?>