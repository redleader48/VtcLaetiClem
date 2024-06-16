<?php

require_once "iCRUD.php";
require_once "Connection.php";

class Vehicules extends Connection implements iCRUD
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
    public function setMarque($marque)
    {
        return $this->marque = $marque;
    }

    public function setModele($modele)
    {
        return $this->modele = $modele;
    }
    public function getCouleur()
    {
        return $this->couleur;
    }

    public function getImmatriculation()
    {
        return $this->immatriculation;
    }
    public function setCouleur($couleur)
    {
        return $this->couleur = $couleur;
    }

    public function setImmatriculation($immatriculation)
    {
        return $this->immatriculation = $immatriculation;
    }
    // fonction création vehicule
    public function create($donnees)
    {
        $db = Connection::getConnect();

        $champs = "";
        $valeurs = "";

        foreach ($donnees as $indice => $valeur) {
            $champs .= ($champs ? "," : "") . $indice;
            $valeurs .= ($valeurs ? "," : "") . "'$valeur'";
        }

        $sql = $db->prepare("INSERT INTO vehicules ($champs)  VALUES ($valeurs)");
        if ($sql->execute()) {
            //REDIRECTION SUR LA MM PAGE
            header('Location:' . $_SERVER['PHP_SELF']);
        }
    }
    // fonction lecture BD vehicule
    public function read()
    {
        $db = Connection::getConnect();
        // L’instruction SQL SELECT
        $select = "SELECT * FROM vehicules ORDER BY vehicules.id_vehicule";
        // Compilation du SELECT
        $detail = $db->query($select);
        return $detail->fetchAll();
    }
    function readOne($id)
    {
        $db = Connection::getConnect();
        $table = get_class();

        $req = $db->query(" SELECT id_vehicule, marque, modele, couleur, immatriculation 
        FROM $table WHERE id_vehicule = " . $id);
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
        $sql = $db->prepare("UPDATE vehicules SET $champs 
        WHERE vehicules.id_vehicule=$id");
        // $sql->bindValue($champs, $valeurs);
        if ($sql->execute($t)) {
            //REDIRECTION SUR LA MM PAGE
            header('Location: /VTC/vu_vehicule_ajouter.php');
        }
    }
    public function delete($id)
    {
        $db = Connection::getConnect();
        $table = get_class();
        $sql = $db->prepare("DELETE FROM $table WHERE $table.id_vehicule=$id");
        if ($sql->execute()) {
            //REDIRECTION 
            header('Location: /VTC/vu_vehicule.php');
        }
        return $sql->execute();
    }
    public function readSansConducteur()
    {
        $db = Connection::getConnect();
        $table = get_class();

        $req = $db->query(" SELECT id_vehicule,marque,modele,couleur,immatriculation 
        FROM vehicules
        LEFT JOIN association_vehicule_conducteur 
        ON vehicules.id_vehicule=association_vehicule_conducteur.vehicule
        WHERE association_vehicule_conducteur.vehicule IS NULL");
        return $req->fetchAll();
    }
}
