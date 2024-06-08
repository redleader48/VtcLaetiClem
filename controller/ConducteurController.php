<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/VTC/model/Conducteur.php";

class ConducteurController
{

    public function ajouter()
    {

        if ($_SERVER['REQUEST_METHOD'] == "POST" and array_key_exists("submitAjoutConducteur", $_POST)) {
            $conducteur  = new Conducteur();
            $conducteur->setPrenom($_POST['prenom']);
            $conducteur->setNom($_POST['nom']);
            $conducteur->create($_POST);
            // die;
        }

        require_once $_SERVER['DOCUMENT_ROOT'] . "/VTC/view/ajout_conducteur.html";
    }
    public function showAll()
    {
        $conducteur = new Conducteur();
        return $conducteur->read();
    }
    public function Edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $conducteur  = new Conducteur();
            $conducteur->setPrenom($_POST['prenom']);
            $conducteur->setNom($_POST['nom']);
            $conducteur->update($_POST, $_POST['id_conducteur']);
        }

        require_once $_SERVER['DOCUMENT_ROOT'] .  "/VTC/view/modif_conducteur.php";
    }
    public function showOne()
    {
        $conducteur = new Conducteur();
        return $conducteur->readOne($_GET['id']);
    }
}
