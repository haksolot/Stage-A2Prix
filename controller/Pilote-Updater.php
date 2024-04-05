<?php
require("./model/Pilot.php");

$idCurrentPilote = 2;
if (isset($_POST['name']) && isset($_POST['surname'])) {
    echo '!';
    $Pilote = new Pilot();
    $Pilote->setName($_POST['name']);
    $Pilote->setSurname($_POST['surname']);

    $Pilote->updatePilote($idCurrentPilote);

}







