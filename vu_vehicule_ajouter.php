<?php
require_once "view/header.html";
require_once "controller/VehiculeController.php";
$vehicule = new VehiculesController();
// vision des voiture disponible
// $vehicule->showAll();
?>
<!-- tableau des conducteurs -->
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Marque</th>
                <th scope="col">Modele</th>
                <th scope="col">Couleur</th>
                <th scope="col">Immatriculation</th>
                <th scope="col">Modifier</th>
                <th scope="col">Supprimer</th>
            </tr>
        </thead>
        <tbody>

            <?php
            // affichage des conducteurs de la BDD 
            $list = $vehicule->showAll();
            foreach ($list as $value) {
            ?>
                <tr>
                    <th scope="row"><?php echo $value['id_vehicule']; ?></th>
                    <td><?php echo $value['marque']; ?></td>
                    <td><?php echo $value['modele']; ?></td>
                    <td><?php echo $value['couleur']; ?></td>
                    <td><?php echo $value['immatriculation']; ?></td>
                    <td><a href="./view/modif_vehicule.php?&id=<?php echo $value['id_vehicule']; ?>">M</a></td>
                    <td><a href="">X</a></td>
                </tr>
            <?php
            }
            ?>

        </tbody>
    </table>
</div>

<?php
// Formulaire d'ajout conducteur
$vehicule->ajouter();
