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
    }

    public function afficher()
    {
        $conducteur = new Conducteur();

        return $conducteur->read();
    }

    public function supprimer()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
           $conducteur  = new Conducteur();
                        
         $conducteur->delete($_POST);
      }
       require_once $_SERVER['DOCUMENT_ROOT'] . "/VTC/index.php";
  }
}
