<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/VTC/model/iCRUD.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/VTC/model/Connection.php";

class Conducteur extends Connection implements iCRUD
{
    private $prenom;
    private $nom;

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getNom()
    {
        return $this->nom;
    }
    public function setPrenom($prenom)
    {
        return $this->prenom = $prenom;
    }

    public function setNom($nom)
    {
        return $this->nom = $nom;
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

        $sql = $db->prepare("INSERT INTO conducteur ($champs) VALUES ($valeurs)");
        $sql->execute();
    }

    public function read()
    {
        $db = Connection::getConnect();
        $sql = $db->prepare("SELECT *  FROM conducteur");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($idCond)
    {
        $db = Connection::getConnect();
        $sql = $db->prepare("DELETE conducteur
            FROM conducteur
            WHERE conducteur.id_conducteur = $idCond");
        $sql->execute();
    }

    public function selectConducteurLibre()
    {
        $db = Connection::getConnect();
        $sql = $db->prepare("SELECT * FROM conducteur c 
    WHERE NOT EXISTS (SELECT 1  /* vérifie l'existence de lignes sans retourner des données spécifiques */
                        FROM association_vehicule_conducteur avc
                        WHERE c.id_conducteur = avc.id_conducteur)");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
