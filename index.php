<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/VTC/view/header.html";
require_once $_SERVER['DOCUMENT_ROOT'] . "/VTC/controller/ConducteurController.php";

ob_start();

$conducteur = new ConducteurController();

/****** Pour suppression *****/
if (isset($_GET['id_conducteur'])) {
  $idCond = intval($_GET['id_conducteur']);
  $conducteur->supprimer($idCond);
  header('Location: index.php');
}
?>

<h1>Liste des Conducteurs</h1>
<div class='tabConducteur'>
  <table>
    <tr>
      <th>id_conducteur</th>
      <th>Pr&eacute;nom</th>
      <th>Nom</th>
      <th>Modification</th>
      <th>Suppression</th>
    </tr>

    <?php
    $nbLigne = 0;
    foreach ($conducteur->afficher() as $value) {
      $idCond = htmlspecialchars($value['id_conducteur']);
    ?>
      <tr>
        <td><?php echo $idCond; ?></td>
        <td><?php echo htmlspecialchars($value['prenom']) ?></td>
        <td><?php echo htmlspecialchars($value['nom']) ?></td>
        <td><a href=''>
            <img src='images/crayon.png' title='icône crayon' width=20></td></a>

        <!-- Button trigger modal -->
        <td>
          <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#<?php echo $idCond; ?>'>Supprimer</button>

          <!-- Modal -->
          <div class='modal fade' id='<?php echo $idCond; ?>' tabindex='-1' aria-labelledby='<?php echo $idCond; ?>' aria-hidden='true'>
            <div class='modal-dialog'>
              <div class='modal-content'>
                <div class='modal-header'>
                  <h2 class='modal-title fs-5' id='<?php echo $idCond; ?>'>Etes-vous sûr(e) de vouloir supprimer ce conducteur</h2>
                  <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>
                  Toute suppression est définitive
                </div>
                <div class='modal-footer'>
                  <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Annuler</button>
                  <a href="index.php?&id_conducteur= <?php echo $idCond; ?> " class='btn btn-primary'>Supprimer</a>

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
        echo "<th id='dispo' colspan='5'>Il y a " . $nbLigne . " conducteur(s) disponible(s)</th>";
      } else {
        echo "<th id='Nodispo'colspan='5'>Il n'y a aucun conducteur disponible</th>
  </tr>";
      }
      ?>
  </table>
</div>

<?php
$conducteur->ajouter();

ob_end_flush();
