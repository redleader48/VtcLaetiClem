<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/VTC/model/iCRUD.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/VTC/model/Connection.php";

class Vehicule extends Connection implements iCRUD
{
    private $marque;
    private $modele;
    private $couleur;
    private $immatriculation;


    public function getMarque()
    {
        return $this->marque;
    }

    public function getModele()
    {
        return $this->modele;
    }
    public function getCouleur()
    {
        return $this->couleur;
    }
    public function getImmatriculation()
    {
        return $this->immatriculation;
    }

    public function setMarque($marque)
    {
        return $this->marque = $marque;
    }

    public function setModele($modele)
    {
        return $this->modele = $modele;
    }
    public function setCouleur($couleur)
    {
        return $this->couleur = $couleur;
    }
    public function setImmatriculation($immatriculation)
    {
        return $this->immatriculation = $immatriculation;
    }

    public function create($donnees)
    {
        $db = Connection::getConnect();

        $champs = "";
        $valeurs = "";

        foreach ($donnees as $indice => $valeur) {
            $champs .= ($champs ? "," : "") . $indice;
            $valeurs .= ($valeurs ? "," : "") . "'$valeur'";
        }

        $sql = $db->prepare("INSERT INTO vehicule ($champs)  VALUES ($valeurs)");
        if ($sql->execute()) {
            header('Location:' . $_SERVER['PHP_SELF']);
        }
    }

    public function read()
    {
        $db = Connection::getConnect();

        $sql = $db->prepare("SELECT *  FROM vehicule");

        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($id_vehicule)
    {
        $db = Connection::getConnect();
        if (isset($_GET['id_vehicule'])) {
            $id_vehicule = intval($_GET['id_vehicule']);
            $sql = $db->prepare("DELETE FROM vehicule WHERE id_vehicule = $id_vehicule");
           
            if ($sql->execute()) {
                header('Location:' . $_SERVER['PHP_SELF']);
           
            } 
        }
    }
}
