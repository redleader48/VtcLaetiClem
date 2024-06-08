<?php

require_once "iCRUD.php";
require_once "Connection.php";

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
    // fonction création conducteur
    public function create($donnees)
    {
        $db = Connection::getConnect();

        $champs = "";
        $valeurs = "";

        foreach ($donnees as $indice => $valeur) {
            $champs .= ($champs ? "," : "") . $indice;
            $valeurs .= ($valeurs ? "," : "") . "'$valeur'";
        }

        $sql = $db->prepare("INSERT INTO conducteur ($champs)  VALUES ($valeurs)");
        if ($sql->execute()) {
            //REDIRECTION SUR LA MM PAGE
            header('Location:' . $_SERVER['PHP_SELF']);
        }
    }
    // fonction lecture BD conducteur
    public function read()
    {
        $db = Connection::getConnect();
        $table = get_class();
        // L’instruction SQL SELECT
        $select = "SELECT * FROM $table ORDER BY conducteur.id_conducteur";
        // Compilation du SELECT
        $detail = $db->query($select);
        return $detail->fetchAll();
    }
    // fonction lecture BD 1 conducteur
    function readOne($id)
    {
        $db = Connection::getConnect();
        $table = get_class();

        $req = $db->query(" SELECT id_conducteur, nom, prenom FROM $table WHERE id_conducteur = " . $id);
        return $req->fetch();
    }
    // fonction update conducteur
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
        $sql = $db->prepare("UPDATE conducteur SET $champs 
        WHERE conducteur.id_conducteur=$id");
        // $sql->bindValue($champs, $valeurs);
        if ($sql->execute($t)) {
            //REDIRECTION SUR LA MM PAGE
            header('Location: /VTC/index.php');
        }
    }
}
