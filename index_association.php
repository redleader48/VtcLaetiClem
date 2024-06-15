<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/VTC/view/header.html";
require_once $_SERVER['DOCUMENT_ROOT'] . "/VTC/controller/AssociationController.php";

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

$nbLigne = 0;
foreach ($association->afficher() as $value) {
    echo "
    <tr>
    <td>" . htmlspecialchars($value['id_association']) . "</td> 
    <td>" . htmlspecialchars($value['prenom']) . " " . htmlspecialchars($value['nom']) . '<br>' . htmlspecialchars($value['id_conducteur']) . "</td>
    <td>" . htmlspecialchars($value['marque']) . " " . htmlspecialchars($value['modele']) . '<br>' . htmlspecialchars($value['id_vehicule']) . "</td>
    <td><a href='view/modifierAssociation.php?id_association=" . htmlspecialchars($value['id_association']) . "'>
    <img src='images/crayon.png' title='icône crayon' width=20></td>
    <td><a href='index_association.php?id_association=" . htmlspecialchars($value['id_association']) . "'>
    <img src='images/cross.png' title='icône croix' width=20></a>
    </td> 
    </tr>";
    $nbLigne++;
}

echo "<tr>";
if ($nbLigne != 0) {
  echo "<th id='dispo' colspan='5'>Il y a " . $nbLigne . " association(s) en cours</th>";
} else {
  echo "<th id='Nodispo'colspan='5'>Il n'y a aucune association en cours</th>
  </tr>";
}

echo "</table>
</div>";

$association->ajouter();

if (isset($_GET['id_association'])) {
    $id_association = intval($_GET['id_association']); 
    if ($association->supprimer()) {
        echo "L'association a été supprimée.";
        header("Location: index_association.php");
        } else {
        echo "Erreur lors de la suppression du conducteur.";
    }
}


