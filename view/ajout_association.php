<?php
require_once "controller/VehiculeController.php";
require_once "controller/ConducteurController.php";
require_once "controller/AssociationController.php";
$conducteur = new ConducteurController();
$vehicule = new VehiculesController();
$association = new AssociationController();
?>

<form action="" method="POST">
    <div class="container mb-3">
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
    <div class="container">
        <input type="submit" class="btn btn-secondary" value="Valider">
    </div>
</form>