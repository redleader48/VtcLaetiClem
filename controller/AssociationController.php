<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/VTC/model/Association.php";

class AssociationController
{

    public function ajouter()
    {

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
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
    public function showOne()
    {
        $vehicule = new Association();
        return $vehicule->readOne($_GET['id']);
    }
    public function Edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $association  = new Association();
            $association->setConducteur($_POST['conducteur']);
            $association->setVehicule($_POST['vehicule']);
            $association->update($_POST, $_POST['id_association']);
        }

        require_once $_SERVER['DOCUMENT_ROOT'] .  "/VTC/view/modif_association.php";
    }
}
