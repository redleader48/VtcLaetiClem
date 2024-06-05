<?php

require_once "view/header.html";
require_once "controller/AssociationController.php";

$association = new AssociationController();

echo "<h1>Liste des Associations</h1>
<div class='tabAsso'>
<table>
<tr>
<th>id_association</th>
<th>Conducteur</th>
<th>Vehicule</th>
<th>Modification</th>
<th>Suppression</th>
</tr>";

foreach ($association->afficher() as $value) {
    echo "
    <tr>
    <td>" . $value['id_association'] . "</td>
    <td>" . $value['prenom'] . " " . $value['nom'] . '<br>' . $value['id_conducteur'] . "</td>
    <td>" . $value['marque'] . " " . $value['modele'] . '<br>' . $value['id_vehicule'] . "</td>
    <td><img src='images/crayon.png' title='icône crayon' width=20></td>
    <td>
    <form action='controller/AssociationController.php' 'method='POST'>
        <input type='hidden' name='id_association' value=" . $value['id_association'] . ">
       <button type='submit' name='btSubmit'><img src='images/cross.png' title='icône croix' class='btSubmit' width=20></button>
    </td>
    </form>
    </tr>";
}
echo "</table>
</div>";

$association->ajouter();

if (isset($_GET["btSubmit"])) {
    return $association->supprimer();
}
