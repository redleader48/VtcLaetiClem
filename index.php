<?php

require_once "view/header.html";
require_once "controller/ConducteurController.php";
$conducteur = new ConducteurController();
?>

<!-- tableau des conducteurs -->
<div class="container">
    <form action="" method="post">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Modifier</th>
                    <th scope="col">Supprimer</th>
                </tr>
            </thead>
            <tbody>

                <?php
                // affichage des conducteurs de la BDD 
                $list = $conducteur->showAll();
                foreach ($list as $value) {
                ?>

                    <tr>
                        <th scope="row"><?php echo $value['id_conducteur']; ?></th>
                        <td><?php echo $value['prenom']; ?></td>
                        <td><?php echo $value['nom']; ?></td>
                        <td><a href="./view/modif_conducteur.php?&id=<?php echo $value['id_conducteur']; ?>">M</a></td>
                        <td><a href="./view/delete_conducteur.php?&id=<?php echo $value['id_conducteur']; ?>">X</href=>
                        </td>
                    </tr>

                <?php
                }
                ?>

            </tbody>
        </table>

    </form>
</div>

<?php

// Formulaire d'ajout conducteur
$conducteur->ajouter();


?>