<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/VTC/model/Vehicule.php";

class VehiculesController
{

    public function ajouter()
    {

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $vehicule  = new Vehicules();
            $vehicule->setMarque($_POST['marque']);
            $vehicule->setModele($_POST['modele']);
            $vehicule->setCouleur($_POST['couleur']);
            $vehicule->setImmatriculation($_POST['immatriculation']);
            $vehicule->create($_POST);
        }

        require_once "view/ajout_vehicule.html";
    }
    public function showAll()
    {
        $vehicule = new Vehicules();
        return $vehicule->read();
    }
    public function showOne()
    {
        $vehicule = new Vehicules();
        return $vehicule->readOne($_GET['id']);
    }
    public function Edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $vehicule  = new Vehicules();
            $vehicule->setMarque($_POST['marque']);
            $vehicule->setModele($_POST['modele']);
            $vehicule->setCouleur($_POST['couleur']);
            $vehicule->setImmatriculation($_POST['immatriculation']);
            $vehicule->update($_POST, $_POST['id_vehicule']);
        }

        require_once $_SERVER['DOCUMENT_ROOT'] .  "/VTC/view/modif_vehicule.php";
    }
    public function deleteFromId()
    {
        $vehicule = new Vehicules();
        return $vehicule->delete($_GET['id']);
    }
    public function showSansConducteur()
    {
        $conducteur = new Vehicules();
        return $conducteur->readSansConducteur();
    }
}
