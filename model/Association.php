<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/VTC/model/iCRUD.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/VTC/model/Connection.php";

class Association extends Connection implements iCRUD
{
    private $conducteur;
    private $vehicule;

    public function getConducteur()
    {
        return $this->conducteur;
    }

    public function getVehicule()
    {
        return $this->vehicule;
    }
    public function setConducteur($conducteur)
    {
        return $this->conducteur = $conducteur;
    }

    public function setVehicule($vehicule)
    {
        return $this->vehicule = $vehicule;
    }

    public function create($donnees)
    {
        $db = Connection::getConnect();

        $champs = "";
        $valeurs = "";

        foreach ($donnees as $indice => $valeur) {
            $champs .= ($champs ? "," : "") . $indice;
            $valeurs .= ($valeurs ? "," : "") . $valeur;
        }
        $sql = $db->prepare("INSERT INTO association_vehicule_conducteur ($champs)  VALUES ($valeurs)");

        if ($sql->execute()) {
            header('Location:' . $_SERVER['PHP_SELF']);
        }
    }
    public function read()
    {
        $db = Connection::getConnect();

        $sql = $db->prepare("SELECT * FROM association_vehicule_conducteur  JOIN conducteur ON  conducteur.id_conducteur = association_vehicule_conducteur .id_conducteur INNER JOIN vehicule ON vehicule.id_vehicule = association_vehicule_conducteur .id_vehicule");

        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function delete($id_association)
    {
        $db = Connection::getConnect();
        if (isset($_GET['id_association'])) {
            $id_association = intval($_GET['id_association']);
            $sql = $db->prepare("DELETE FROM association_vehicule_conducteur WHERE id_association = $id_association");


            if ($sql->execute()) {
                header('Location:' . $_SERVER['PHP_SELF']);
            }
        }
    }
}
