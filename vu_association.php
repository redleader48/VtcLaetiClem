<?php
require_once "view/header.html";
require_once "controller/VehiculeController.php";
require_once "controller/ConducteurController.php";
require_once "controller/AssociationController.php";
$conducteur = new ConducteurController();
$vehicule = new VehiculesController();
$association = new AssociationController();
?>

<!-- tableau des association -->
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Conducteur</th>
                <th scope="col">Vehicule</th>
                <th scope="col">Modifier</th>
                <th scope="col">Supprimer</th>
            </tr>
        </thead>
        <tbody>

            <?php
            // affichage des association de la BDD 
            $list = $association->showAll();
            foreach ($list as $value) {
            ?>
                <tr>
                    <th scope="row"><?php echo $value['id_association']; ?></th>
                    <td>
                        <?php echo $value['prenom'] .
                            " " . $value['nom'] . "<br>" . "ID : " . $value['id_conducteur']; ?></td>
                    <td>
                        <?php echo $value['modele'] .
                            " " . $value['marque'] . "<br>" . "ID : " . $value['id_vehicule']; ?></td>
                    <td><a href="./view/modif_association.php?&id=<?php echo $value['id_association']; ?>">M</a></td>
                    <td><a href="">X</a></td>
                </tr>
            <?php
            }
            ?>

        </tbody>
    </table>
</div>

<?php
// Formulaire d'ajout association

$association->ajouter();
