<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/VTC/view/header.html";
require_once $_SERVER['DOCUMENT_ROOT'] . "/VTC/controller/VehiculeController.php";

$vehicule = new VehiculeController();

echo "<h1>Liste des Véhicules</h1>
<div class='tabVL'>
<table>
<tr>
<th>id_vehicule</th>
<th>Marque</th>
<th>Mod&egravele</th>
<th>Couleur</th>
<th>Immatriculation</th>
<th>Modification</th>
<th>Suppression</th>
</tr>";

$nbLigne = 0;
foreach ($vehicule->afficher() as $value) {
    echo "
    <tr>
    <td>" . htmlspecialchars($value['id_vehicule']) . "</td>
    <td>" . htmlspecialchars($value['marque']) . "</td>
    <td>" . htmlspecialchars($value['modele']) . "</td>
    <td>" . htmlspecialchars($value['couleur']) . "</td>
    <td>" . htmlspecialchars($value['immatriculation']) . "</td>
    <td><a href='view/modifierVL.php?id_vehicule=" . htmlspecialchars($value['id_vehicule']) . "'>
    <img src='images/crayon.png' title='icône crayon' width=20></td>
    <td><a href='index_VL.php?id_vehicule=" . htmlspecialchars($value['id_vehicule']) . "'>
    <img src='images/cross.png' title='icône croix' width=20></a></td>
    </tr>";
    $nbLigne++;
}

if ($nbLigne != 0) {
    echo "<th id='dispo' colspan='7'>Il y a " . $nbLigne . " vehicule(s) disponible(s)</th>";
} else {
    echo "<th id='Nodispo'colspan='7'>Il n'y a aucun vehicule disponible</th>
        </tr>";
}

echo "</table>
</div>";

$vehicule->ajouter();

if (isset($_GET['id_vehicule'])) {
    $id_vehicule = $_GET['id_vehicule'];
    if ($vehicule->supprimer()) {

        echo "Le vehicule a été supprimé.";

        header("Location: index_VL.php");
    } else {
        echo "Erreur lors de la suppression du vehicule.";
    }
}
