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
        require_once $_SERVER['DOCUMENT_ROOT'] . "/VTC/view/ajout_association.php";
    }

    public function afficher()
    {
        $association = new Association();
        return $association->read();
    }

    public function modifier()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $association  = new Association();
            $association->update($_POST);
        }
    }

    public function supprimer()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $association  = new Association();

            $association->delete($_POST);
        }
        require_once $_SERVER['DOCUMENT_ROOT'] . "/VTC/index_association.php";
    }

}
