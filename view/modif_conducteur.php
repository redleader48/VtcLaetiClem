<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/VTC/view/header.html";
require_once "../controller/ConducteurController.php";
$conducteur = new ConducteurController();
$infoConducteur = $conducteur->showOne();
var_dump($infoConducteur);
?>

<div class="container">
	<form method="post">
		<div class="mb-3">
			<input type="hidden" value="<?php echo $infoConducteur['id_conducteur']; ?>" id="conducteur" name="id_conducteur" />
			<label for="conducteur" class="form-label">Prenom</label>
			<input type="text" placeholder="prenom" class="form-control" id="conducteur" name="prenom" value="<?php echo $infoConducteur['prenom']; ?>" />
		</div>
		<div class="mb-3">
			<label for="conducteur" class="form-label">Nom</label>
			<input type="text" placeholder="nom" class="form-control" id="conducteur" name="nom" value="<?php echo $infoConducteur['nom']; ?>" />
		</div>

		<button type="submit" class="btn btn-light">
			Modifier ce conducteur
		</button>
	</form>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
	Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				AAAHHHHHH
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>

<?php

// Formulaire d'ajout conducteur
$conducteur->Edit();

?>