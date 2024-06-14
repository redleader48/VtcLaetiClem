<?php
require_once "../controller/VehiculeController.php";
$vehicule = new VehiculesController();


// supression d'un conducteur

$vehicule->deleteFromId();
