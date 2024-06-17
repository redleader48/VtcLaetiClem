<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/VTC/view/header.html";
require_once $_SERVER['DOCUMENT_ROOT'] . "/VTC/controller/VehiculeController.php";

ob_start();

$vehicule = new VehiculeController();


/****** Pour suppression *****/
if (isset($_GET['id_vehicule'])) {
  $id = intval($_GET['id_vehicule']);
  $vehicule->supprimer($id);
  header('Location: index_VL.php');
}
?>

<h1>Liste des Véhicules</h1>
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
    </tr>

    <?php
    $nbLigne = 0;
    foreach ($vehicule->afficher() as $value) {
      $id = htmlspecialchars($value['id_vehicule']);
    ?>

      <tr>
        <td> <?php echo $id; ?></td>
        <td> <?php echo  htmlspecialchars($value['marque']) ?></td>
        <td> <?php echo htmlspecialchars($value['modele']) ?></td>
        <td> <?php echo htmlspecialchars($value['couleur']) ?></td>
        <td> <?php echo htmlspecialchars($value['immatriculation']) ?></td>
        <td> <a href=''>
            <img src='images/crayon.png' title='icône crayon' width=20></td>

        <!-- Button trigger modal -->
        <td>
          <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#<?php echo $id; ?>'>Supprimer</button>

          <!-- Modal -->
          <div class='modal fade' id='<?php echo $id; ?>' tabindex='-1' aria-labelledby='<?php echo $id; ?>' aria-hidden='true'>
            <div class='modal-dialog'>
              <div class='modal-content'>
                <div class='modal-header'>
                  <h2 class='modal-title fs-5' id='<?php echo $id; ?>'>Etes-vous sûr(e) de vouloir supprimer ce véhicule</h2>
                  <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>
                  Toute suppression est définitive
                </div>
                <div class='modal-footer'>
                  <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Annuler</button>
                  <a href="index_VL.php?&id_vehicule= <?php echo $id; ?> " class='btn btn-primary'>Supprimer</a>

                </div>
              </div>
            </div>
          </div>
        </td>
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
$vehicule->ajouter();

ob_end_flush();
