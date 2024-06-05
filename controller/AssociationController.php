<?php
require_once "./model/Association.php";

class AssociationController
{

    public function ajouter()
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $association  = new Association();
            $association->setConducteur($_POST['conducteur']);
            $association->setVehicule($_POST['vehicule']);

            var_dump($association->create($_POST));
            die;
        }

        require_once "view/ajout_association.php";
    }
    public function showAll()
    {
        $association = new Association();
        return $association->read();
    }
}
