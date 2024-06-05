<?php
require_once "view/header.html";
require_once "./controller/ConducteurController.php";
require_once "./controller/VehiculeController.php";

$conducteur = new ConducteurController();
$vehicule = new VehiculeController();

?>

<div class="container">
  <form method="post">

    <div class="mb-3">
      <label for="selectConducteur" class="form-label">Conducteur</label>
      <select name="id_conducteur" id="conducteur">
        <option value="choix1">Choisir le conducteur</option>
        <?php foreach (($conducteur->afficher()) as $value) :  ?>
          <option value="<?php echo $value['id_conducteur']; ?>">
          <?php echo $value['prenom'] . " " . $value['nom'];
        endforeach; ?>
          < </option>
      </select>
    </div>

    <div class="mb-3">
      <label for="selectVehicule" class="form-label">V&eacute;hicule</label>
      <select name="id_vehicule" id="vehicule">
        <option value="choix2">Choisir le V&eacute;hicule</option>
        <?php foreach (($vehicule->afficher()) as $value) : ?>
          <option value="<?php echo $value['id_vehicule']; ?>">
          <?php echo $value['marque'] . " " . $value['modele'];
        endforeach; ?>
          </option>
      </select>
    </div>

    <button type="submit" class="btn btn-light">Ajouter cette association</button>
  </form>
</div>