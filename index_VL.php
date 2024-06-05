<?php

require_once "view/header.html";
require_once "controller/VehiculeController.php";

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

foreach ($vehicule->afficher() as $value) {
    echo "
    <tr>
    <td>" . $value['id_vehicule'] . "</td>
    <td>" . $value['marque'] . "</td>
    <td>" . $value['modele'] . "</td>
    <td>" . $value['couleur'] . "</td>
    <td>" . $value['immatriculation'] . "</td>
    <td><img src='images/crayon.png' title='icône crayon' width=20></td>
    <td><img src='images/cross.png' title='icône croix' width=20></td>
    </tr>";
}
echo "</table>
</div>";

$vehicule->ajouter();
