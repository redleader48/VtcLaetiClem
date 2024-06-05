<?php

require_once "view/header.html";
require_once "controller/ConducteurController.php";

$conducteur = new ConducteurController();

echo "<h1>Liste des Conducteurs</h1>
<div class='tabConducteur'>
<table>
<tr>
<th>id_conducteur</th>
<th>Pr&eacute;nom</th>
<th>Nom</th>
<th>Modification</th>
<th>Suppression</th>
</tr>";


foreach ($conducteur->afficher() as $value) {

    echo "
    <tr>
    <td>" . $value['id_conducteur'] . "</td>
    <td>" . $value['prenom'] . "</td>
    <td>" . $value['nom'] . "</td>
    <td><img src='images/crayon.png' title='icône crayon' width=20></td>
    <td><img src='images/cross.png' title='icône croix' width=20></td>
    </tr>";
}

echo "</table>
</div>";

$conducteur->ajouter();