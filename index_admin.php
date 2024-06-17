<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/VTC/view/header.html";
require_once $_SERVER['DOCUMENT_ROOT'] . "/VTC/controller/ConducteurController.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/VTC/controller/VehiculeController.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/VTC/controller/AssociationController.php";

ob_start();

/* <!-- Nombre d'associations en cours--> */
$association = new AssociationController();
$nbLigneAsso = 0;
foreach ($association->afficher() as $value) {
    $idAsso = htmlspecialchars($value['id_association']);
    $nbLigneAsso++;
}
if ($nbLigneAsso != 0) {
    echo "<h4 id='dispo' colspan='5'>Il y a " . $nbLigneAsso . " association(s) en cours</h4><hr>";
  } else {
    echo "<h4 id='Nodispo'colspan='5'>Il n'y a aucune association en cours</h4>
  </tr>";
  }


/* <!-- Affichage des véhicules disponibles --> */

$conducteur = new ConducteurController();
?>
<h4>Liste des conducteurs disponibles</h4>
<div class='tabConducteur'>
    <table>
        <tr>
            <th>id_conducteur</th>
            <th>Pr&eacute;nom</th>
            <th>Nom</th>
        </tr>

        <?php
        $nbLigne = 0;

        foreach ($conducteur->afficherLibre() as $value) {
            $idCond = htmlspecialchars($value['id_conducteur']);
        ?>
            <tr>
                <td><?php echo $idCond; ?></td>
                <td><?php echo htmlspecialchars($value['prenom']) ?></td>
                <td><?php echo htmlspecialchars($value['nom']) ?></td>
            </tr>

        <?php
            $nbLigne++;
        }
        ?>

        <tr>
            <?php
            if ($nbLigne != 0) {
                echo "<th id='dispo' colspan='5'>Il y a " . $nbLigne . " conducteur(s) disponible(s)</th>";
            } else {
                echo "<th id='Nodispo'colspan='5'>Il n'y a aucun conducteur disponible</th>
  </tr>";
 
            }
            ?>
    </table>
</div>
 <hr>

<!-- Affichage des véhicules disponibles --> 

<?php
$vehicule = new VehiculeController();
?>
<h4>Liste des véhicules disponibles</h4>
<div class='tabVL'>
    <table>
        <tr>
            <th>id_vehicule</th>
            <th>Marque</th>
            <th>Mod&egravele</th>
            <th>Couleur</th>
            <th>Immatriculation</th>
        </tr>

        <?php
        $nbLigne = 0;
        foreach ($vehicule->afficherVLlibre() as $value) {
            $id = htmlspecialchars($value['id_vehicule']);
        ?>

            <tr>
                <td> <?php echo $id; ?></td>
                <td> <?php echo  htmlspecialchars($value['marque']) ?></td>
                <td> <?php echo htmlspecialchars($value['modele']) ?></td>
                <td> <?php echo htmlspecialchars($value['couleur']) ?></td>
                <td> <?php echo htmlspecialchars($value['immatriculation']) ?></td>
            </tr>

        <?php
            $nbLigne++;
        }
        ?>

        <tr>
            <?php
            if ($nbLigne != 0) {
                echo "<th id='dispo' colspan='7'>Il y a " . $nbLigne . " vehicule(s) disponible(s)</th>";
            } else {
                echo "<th id='Nodispo'colspan='7'>Il n'y a aucun vehicule disponible</th>
        </tr>";
            }

            ?>
    </table>
</div>

<?php
ob_end_flush();
