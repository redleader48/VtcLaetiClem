<?php
require_once "../controller/ConducteurController.php";
$conducteur = new ConducteurController();


// supression d'un conducteur

$conducteur->deleteFromId();
