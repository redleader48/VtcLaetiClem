<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/VTC/view/header.html";
require_once "../controller/VehiculeController.php";
require_once "../controller/ConducteurController.php";
require_once "../controller/AssociationController.php";
$conducteur = new ConducteurController();
$vehicule = new VehiculesController();
$association = new AssociationController();
$infoAssociation = $association->showOne();
// var_dump($infoAssociation);
?>

<div class="container">
	<div class="infosEnCoursAssociation">
		<div class="infosAssociation">
			<h1>Association sélectionner</h1>
			<p>
				<strong>Conducteur : </strong><?php echo $infoAssociation['prenom'] . ' ' . $infoAssociation['nom']; ?>
			</p>
			<p>
				<strong>Vehicule : </strong><?php echo $infoAssociation['marque'] . ' ' . $infoAssociation['modele']; ?>
			</p>
		</div>
	</div>
</div>
<form method="post">
	<div class="container mb-3">
		<input type="hidden" value="<?php echo $infoAssociation['id_association']; ?>" id="association" name="id_association" />
		<select class="form-select" aria-label="Default select example" name="conducteur">
			<option selected>Choisir le conducteur a associer</option>
			<?php
			// liste conducteur BD
			$list = $conducteur->showAll();
			foreach ($list as $value) {
			?>
				<option value="<?php echo $value['id_conducteur']; ?>"><?php echo $value['prenom'] . ' ' . $value['nom']; ?></option>
			<?php
			}
			?>
		</select>

		<select class="form-select" aria-label="Default select example" name="vehicule">
			<option selected>Choisir la voiture a associer</option>
			<?php
			// liste vehicule BD
			$list = $vehicule->showAll();
			foreach ($list as $value) {
			?>
				<option value="<?php echo $value['id_vehicule']; ?>"><?php echo $value['marque'] . ' ' . $value['modele']; ?> </option>
			<?php
			}
			?>
		</select>
	</div>

	<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
		Modifier ce conducteur
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
					Voulez-vous vraiment modifier ce conducteur ?
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
$association->Edit();

?>