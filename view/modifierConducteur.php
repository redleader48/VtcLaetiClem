<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/VTC/view/header.html";
require_once $_SERVER['DOCUMENT_ROOT'] . "/VTC/controller/ConducteurController.php";

$conducteur = new ConducteurController();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id_conducteur'])) {
    $id_conducteur = intval($_GET['id_conducteur']);
    $conducteurs = $conducteur->obtenir($id_conducteur);

    echo "<h5>Modifier le Conducteur " . $conducteurs['prenom'] . ' ' . $conducteurs['nom'] . "</h5>
        
    <form method='post' action='modifierConducteur.php'>
        <input type='hidden' name='id_conducteur' value='" . htmlspecialchars($conducteurs['id_conducteur']) . "'>
            <label for='prenom'>Prénom </label>
            <input type='text' id='prenom' name='prenom' value='" . htmlspecialchars($conducteurs['prenom']) . "'>
            <label for='nom'>Nom </label>
            <input type='text' id='nom' name='nom' value='" . htmlspecialchars($conducteurs['nom']) . "'>
        <button type='submit' name='submit'>Modifier</button>
        </form>";
}  

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $id_conducteur = intval($_POST['id_conducteur']);
    $donnees = $conducteur->obtenir($id_conducteur);
    

    if ($conducteur->modifier($id_conducteur, $donnees)) {
        echo "Le conducteur a été modifié.";
        header("Location: index.php");
        exit;
    } else {
        echo "Erreur lors de la modification du conducteur.";
    }
}
