<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/VTC/view/header.html";
require_once $_SERVER['DOCUMENT_ROOT'] . "/VTC/controller/ConducteurController.php";


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
    <td>" . htmlspecialchars($value['id_conducteur']) . "</td>
    <td>" . htmlspecialchars($value['prenom']) . "</td>
    <td>" . htmlspecialchars($value['nom']) . "</td>
    <td><img src='images/crayon.png' title='icône crayon' width=20></td>
    <td><a href='index.php?id_conducteur=" . htmlspecialchars($value['id_conducteur']) . "'>
    <img src='images/cross.png' title='icône croix' width=20></a></td>
    </tr>";
    //<input type='hidden' name='id_conducteur' value='" . htmlspecialchars($value['id_conducteur']) . "'>
}

echo "</table>
</div>";
$conducteur->ajouter();

  if (isset($_GET['id_conducteur'])) {
      $id_conducteur = intval($_GET['id_conducteur']);
      if ($conducteur->supprimer()) {
          echo "Le conducteur a été supprimé.";
          header("Location: index.php");
          exit;
      } else {
          echo "Erreur lors de la suppression du conducteur.";
      }
  }

