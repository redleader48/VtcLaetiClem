<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/VTC/view/header.html";
require_once $_SERVER['DOCUMENT_ROOT'] . "/VTC/controller/AssociationController.php";

ob_start();

$association = new AssociationController();


/****** Pour suppression ******/
if (isset($_GET['id_association'])) {
  $idAsso = intval($_GET['id_association']);
  $association->supprimer($idAsso);
  header('Location: index_association.php');
}
?>

<h1>Liste des Associations</h1>
<div class='tabAsso'>
  <table>
    <tr>
      <th>id_association</th>
      <th>Conducteur</th>
      <th>Vehicule</th>
      <th>Modification</th>
      <th>Suppression</th>
    </tr>

    <?php
    $nbLigneAsso = 0;
    foreach ($association->afficher() as $value) {
      $idAsso = htmlspecialchars($value['id_association']);
    ?>

      <tr>
        <td> <?php echo $idAsso; ?> </td>
        <td> <?php echo htmlspecialchars($value['prenom']) . " " . htmlspecialchars($value['nom']) . '<br>' . htmlspecialchars($value['id_conducteur']) ?> </td>
        <td> <?php echo htmlspecialchars($value['marque']) . " " . htmlspecialchars($value['modele']) . '<br>' . htmlspecialchars($value['id_vehicule']) ?> </td>
        <td><a href=''>
            <img src='images/crayon.png' title='icône crayon' width=20></td>

        <!-- Button trigger modal -->
        <td>
          <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#<?php echo $idAsso; ?>'>Supprimer</button>

          <!-- Modal -->
          <div class='modal fade' id='<?php echo $idAsso; ?>' tabindex='-1' aria-labelledby='<?php echo $idAsso; ?>' aria-hidden='true'>
            <div class='modal-dialog'>
              <div class='modal-content'>
                <div class='modal-header'>
                  <h2 class='modal-title fs-5' id='<?php echo $idAsso; ?>'>Etes-vous sûr(e) de vouloir supprimer ce véhicule</h2>
                  <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>
                  Toute suppression est définitive
                </div>
                <div class='modal-footer'>
                  <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Annuler</button>
                  <a href="index_association.php?&id_association= <?php echo $idAsso; ?> " class='btn btn-primary'>Supprimer</a>

                </div>
              </div>
            </div>
          </div>
        </td>
      </tr>

    <?php
      $nbLigneAsso++;
    }
    ?>

    <tr>
      <?php
      if ($nbLigneAsso != 0) {
        echo "<th id='dispo' colspan='5'>Il y a " . $nbLigneAsso . " association(s) en cours</th>";
      } else {
        echo "<th id='Nodispo'colspan='5'>Il n'y a aucune association en cours</th>
      </tr>";
      }

      ?>
  </table>
</div>

<?php
$association->ajouter();

ob_end_flush();
