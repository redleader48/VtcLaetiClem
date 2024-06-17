<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/VTC/model/Association.php";

class AssociationController
{
    public function ajouter()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $association  = new Association();
            $association->create($_POST);
        }
        require_once "./view/ajout_association.php";
    }

    public function afficher()
    {
        $association = new Association();
        return $association->read();
    }

    
    public function supprimer($idAsso)
    {
            $association  = new Association();
            return $association->delete($idAsso);
    }
}
