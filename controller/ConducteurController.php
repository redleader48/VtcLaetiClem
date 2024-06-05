<?php

require_once "./model/Conducteur.php";

class ConducteurController
{
    public function ajouter()
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $conducteur  = new Conducteur();

            $conducteur->create($_POST);
        }

        require_once "./view/ajout_conducteur.html";
        require_once "./view/ajout_association.php";
    }

    public function afficher()
    {
        $conducteur = new Conducteur();

        return $conducteur->read();
    }
}
