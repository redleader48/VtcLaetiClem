<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/VTC/model/Vehicule.php";

class VehiculesController
{

    public function ajouter()
    {

        if ($_SERVER['REQUEST_METHOD'] == "POST" and array_key_exists("submitAjoutVehicule", $_POST)) {
            $vehicule  = new Vehicules();
            $vehicule->setMarque($_POST['marque']);
            $vehicule->setModele($_POST['modele']);
            $vehicule->setCouleur($_POST['couleur']);
            $vehicule->setImmatriculation($_POST['immatriculation']);

            var_dump($vehicule->create($_POST));
            die;
        }

        require_once "view/ajout_vehicule.html";
    }
    public function showAll()
    {
        $vehicule = new Vehicules();
        return $vehicule->read();
    }
}
