<?php
require_once "../controller/AssociationController.php";
$association = new AssociationController();


// supression d'un association

$association->deleteFromId();
