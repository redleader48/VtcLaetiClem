<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/VTC/view/header.html";
require_once "../controller/VehiculeController.php";
$vehicule = new VehiculesController();
$infoVehicule = $vehicule->showOne();
// var_dump($infoVehicule);
?>

<div class="container">
	<form method="post">
		<div class="mb-3">
			<input type="hidden" value="<?php echo $infoVehicule['id_vehicule']; ?>" id="vehicule" name="id_vehicule" />
			<label for="vehicule" class="form-label">Marque</label>
			<input type="text" placeholder="marque" class="form-control" id="vehicule" name="marque" value="<?php echo $infoVehicule['marque']; ?>" />
		</div>
		<div class="mb-3">
			<label for="vehicule" class="form-label">Modele</label>
			<input type="text" placeholder="modele" class="form-control" id="vehicule" name="modele" value="<?php echo $infoVehicule['modele']; ?>" />
		</div>
		<div class="mb-3">
			<label for="vehicule" class="form-label">Couleur</label>
			<input type="text" placeholder="couleur" class="form-control" id="vehicule" name="couleur" value="<?php echo $infoVehicule['couleur']; ?>" />
		</div>
		<div class="mb-3">
			<label for="vehicule" class="form-label">Immatriculation</label>
			<input type="text" placeholder="immatriculation" class="form-control" id="vehicule" name="immatriculation" value="<?php echo $infoVehicule['immatriculation']; ?>" />
		</div>

		<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
			Modifier ce vehicule
		</button>

		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="exampleModalLabel">Alerte !</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						Voulez-vous vraiment modifier ce vehicule ?
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
						<button type="submit" class="btn btn-primary">Modifier</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>


<?php

// Formulaire d'ajout conducteur
$vehicule->Edit();

?>