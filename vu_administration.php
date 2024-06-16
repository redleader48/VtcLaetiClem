<?php
require_once "view/header.html";
require_once "controller/VehiculeController.php";
require_once "controller/ConducteurController.php";
require_once "controller/AssociationController.php";
$conducteur = new ConducteurController();
$vehicule = new VehiculesController();
$association = new AssociationController();

// affichage des conducteurs de la BDD 
$listConducteur = $conducteur->showAll();
$nbrConducteur = 0;
foreach ($listConducteur as $value) {
    $nbrConducteur++;
}

// affichage des conducteurs de la BDD 
$listVehicule = $vehicule->showAll();
$nbrVehicule = 0;
foreach ($listVehicule as $value) {
    $nbrVehicule++;
}
// affichage des association de la BDD 
$listAssociation = $association->showAll();
$nbrAssociation = 0;
foreach ($listAssociation as $value) {
    $nbrAssociation++;
}
// affichage conducteur sans Vehicule
$listConducteurSansVehicule = $conducteur->showSansVehicule();
$ConducteurSansVehicule = 0;
foreach ($listConducteurSansVehicule as $value) {
    $ConducteurSansVehicule++;
}
// affichage vehicule sans conducteur
$listVehiculeSansConducteur = $vehicule->showSansConducteur();
$VehiculeSansConducteur = 0;
foreach ($listVehiculeSansConducteur as $value) {
    $VehiculeSansConducteur++;
}
?>


<h3>Nombre de conducteur disponnible : <?php echo $nbrConducteur ?></h3>
<h3>Nombre de vehicule disponnible : <?php echo $nbrVehicule ?></h3>
<h3>Nombre d'association vehicule/conduteur : <?php echo $nbrAssociation ?></h3>
<hr>
<h3>Nombre de conducteur sans vehicule attribuer : <?php echo $ConducteurSansVehicule ?></h3>
<!-- tableau des conducteurs sans vehicule -->
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Prenom</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($listConducteurSansVehicule as $valueSansVehicule) {
            ?>
                <tr>
                    <th scope="row"><?php echo $valueSansVehicule['id_conducteur']; ?></th>
                    <td><?php echo $valueSansVehicule['prenom']; ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
<hr>
<h3>Nombre de vehicule sans conduteur atrribuer : <?php echo $VehiculeSansConducteur ?></h3>
<!-- tableau des vehicule sans conducteur -->
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Marque</th>
                <th scope="col">Modele</th>
                <th scope="col">Couleur</th>
                <th scope="col">Immatriculation</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($listVehiculeSansConducteur as $valueSansConducteur) {
            ?>
                <tr>
                    <th scope="row"><?php echo $valueSansConducteur['id_vehicule']; ?></th>
                    <td><?php echo $valueSansConducteur['marque']; ?></td>
                    <td><?php echo $valueSansConducteur['modele']; ?></td>
                    <td><?php echo $valueSansConducteur['couleur']; ?></td>
                    <td><?php echo $valueSansConducteur['immatriculation']; ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>