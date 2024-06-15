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
        if ($sql->execute()) {
            header('Location:' . $_SERVER['PHP_SELF']);
        }
    }
    public function read()
    {
        $db = Connection::getConnect();
        $sql = $db->prepare("SELECT *  FROM conducteur");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function selectToUpDate($id_conducteur)
    {
        $db = Connection::getConnect();
        $sql = $db->prepare("SELECT * FROM conducteur WHERE id_conducteur = $id_conducteur");
        $sql->execute();
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id_conducteur, $donnees)
    {   
        $db = Connection::getConnect();
        //$donnees=[];
        $champs = "";
        $valeurs = "";
        
        foreach ($donnees as $indice => $valeur) {
            $champs .= ($champs ? "," : "") . $indice;
            $valeurs .= ($valeurs ? "," : "") . "'$valeur'";

            $sql = $db->prepare("UPDATE conducteur ($champs)
        INNER JOIN association_vehicule_conducteur AS avc ON conducteur.id_conducteur = avc.id_conducteur
        SET VALUES ($valeurs) WHERE conducteur.id_conducteur = $id_conducteur AND avc.id_conducteur = $id_conducteur");

            if ($sql->execute()) {
                header('Location:' . $_SERVER['PHP_SELF']);
                exit;
            }
        }
    }

    public function delete($id_conducteur)
    {
        $db = Connection::getConnect();

        if (isset($_GET['id_conducteur'])) {
            $id_conducteur = intval($_GET['id_conducteur']);
            $sql = $db->prepare("DELETE conducteur
            FROM conducteur
            INNER JOIN association_vehicule_conducteur AS avc ON conducteur.id_conducteur = avc.id_conducteur
            WHERE conducteur.id_conducteur = $id_conducteur");

            if ($sql->execute()) {
                header('Location:' . $_SERVER['PHP_SELF']);
            }
        }
    }
}
