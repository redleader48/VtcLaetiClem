<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/VTC/model/Vehicule.php";

class VehiculeController
{
    public function ajouter()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $vehicule  = new Vehicule();
            $vehicule->create($_POST);
        }
        require_once "./view/ajout_vehicule.html";
    }

    public function afficher()
    {
        $vehicule = new Vehicule();
        return $vehicule->read();
    }


    public function supprimer($id)
    {
        $vehicule  = new Vehicule();
        return $vehicule->delete($id);
    }

    public function afficherVLlibre()
    {
        $vehicule = new Vehicule();
        return $vehicule->selectVehiculeLibre();
    }
}
