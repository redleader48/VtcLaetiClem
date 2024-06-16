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
            $valeurs .= ($valeurs ? "," : "") . "'$valeur'";
        }

        $sql = $db->prepare("INSERT INTO association_vehicule_conducteur ($champs)  VALUES ($valeurs)");
        if ($sql->execute()) {
            //REDIRECTION SUR LA MM PAGE
            header('Location:' . $_SERVER['PHP_SELF']);
        }
    }
    public function read()
    {
        $db = Connection::getConnect();
        // L’instruction SQL SELECT
        $select = "SELECT conducteur.id_conducteur,conducteur.prenom, conducteur.nom, 
        vehicules.id_vehicule , vehicules.marque, vehicules.modele, 
        association_vehicule_conducteur.id_association 
        FROM association_vehicule_conducteur 
        INNER JOIN vehicules ON vehicules.id_vehicule=association_vehicule_conducteur.vehicule 
        INNER JOIN conducteur ON conducteur.id_conducteur=association_vehicule_conducteur.conducteur";
        // Compilation du SELECT
        $detail = $db->query($select);
        return $detail->fetchAll();
    }
    function readOne($id)
    {
        $db = Connection::getConnect();

        $req = $db->query(
            " SELECT conducteur.id_conducteur,conducteur.prenom, conducteur.nom, 
        vehicules.id_vehicule , vehicules.marque, vehicules.modele, 
        association_vehicule_conducteur.id_association 
        FROM association_vehicule_conducteur 
        INNER JOIN vehicules ON vehicules.id_vehicule=association_vehicule_conducteur.vehicule 
        INNER JOIN conducteur ON conducteur.id_conducteur=association_vehicule_conducteur.conducteur 
        WHERE id_association = " . $id
        );
        return $req->fetch();
    }
    public function update(array $donnees, $id)
    {

        $db = Connection::getConnect();

        $champs = "";
        $valeurs = "";
        $t = [];

        foreach ($donnees as $indice => $valeur) {
            $champs .= ($champs ? "," : "") . "$indice=:$indice";
            $valeurs .= ($valeurs ? "," : "") . "$valeur";
            $t[$indice] = $valeur;
        }
        $sql = $db->prepare("UPDATE association_vehicule_conducteur SET $champs 
        WHERE association_vehicule_conducteur.id_association=$id");
        // $sql->bindValue($champs, $valeurs);
        if ($sql->execute($t)) {
            //REDIRECTION SUR LA MM PAGE
            header('Location: /VTC/vu_association.php');
        }
    }
    public function delete($id)
    {
        $db = Connection::getConnect();
        $sql = $db->prepare("DELETE FROM association_vehicule_conducteur WHERE association_vehicule_conducteur.id_association=$id");
        if ($sql->execute()) {
            //REDIRECTION 
            header('Location: /VTC/vu_association.php');
        }
        return $sql->execute();
    }
}
