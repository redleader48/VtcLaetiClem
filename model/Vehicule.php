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
        $sql->execute();
    }

    public function read()
    {
        $db = Connection::getConnect();
        $sql = $db->prepare("SELECT * FROM vehicule");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($id)
    {
        $db = Connection::getConnect();
        $sql = $db->prepare("DELETE vehicule
        FROM vehicule
        WHERE vehicule.id_vehicule = $id");
        $sql->execute();
    }

    public function selectVehiculeLibre() {
        $db = Connection::getConnect();
        $sql = $db->prepare("SELECT * FROM vehicule v 
        WHERE NOT EXISTS (SELECT 1  /* vérifie l'existence de lignes sans retourner des données spécifiques */
                            FROM association_vehicule_conducteur avc
                            WHERE v.id_vehicule = avc.id_vehicule)");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
