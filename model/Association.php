<?php

require_once "iCRUD.php";
require_once "Connection.php";

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
        $sql = $db->prepare("INSERT INTO association ($champs)  VALUES ($valeurs)");

        if ($sql->execute()) {
            header('Location:' . $_SERVER['PHP_SELF']);
        }
    }
    public function read()
    {
        $db = Connection::getConnect();

        $sql = $db->prepare("SELECT * FROM association JOIN conducteur ON  conducteur.id_conducteur = association.id_conducteur INNER JOIN vehicule ON vehicule.id_vehicule = association.id_vehicule");

        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function delete()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $db = Connection::getConnect();

            $sql = $db->prepare("DELETE FROM association WHERE $_POST[id_association] = id_association");

            if ($sql->execute()) {
                header('Location:' . $_SERVER['PHP_SELF']);
            }
        }
    }
}
