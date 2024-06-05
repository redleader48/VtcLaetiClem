<?php
require_once "./model/Vehicule.php";

class VehiculeController
{
    public function ajouter()
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $vehicule  = new Vehicule();

            $vehicule->create($_POST);
        }

        require_once "./view/ajout_Vehicule.html";
    }

    public function afficher()
    {
        $vehicule = new Vehicule();
        return $vehicule->read();
    }
}
