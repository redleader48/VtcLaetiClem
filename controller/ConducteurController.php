<?php

require_once "./model/Conducteur.php";

class ConducteurController
{

    public function ajouter()
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $conducteur  = new Conducteur();
            $conducteur->setPrenom($_POST['prenom']);
            $conducteur->setNom($_POST['nom']);

            var_dump($conducteur->create($_POST));
            die;
        }

        require_once "view/ajout_conducteur.html";
    }
    public function showAll()
    {
        $conducteur = new Conducteur();
        return $conducteur->read();
    }
    public function Edit()
    {
        $conducteur = new Conducteur();
        return $conducteur->update($_POST);
    }
}
