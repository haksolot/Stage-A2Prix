<?php
require './model/Pilot.php';

if (isset($_REQUEST['id'], $_REQUEST['password'], $_REQUEST['name'], $_REQUEST['surname'], $_REQUEST['center'], $_REQUEST['promotion'])) {

    $user = new Pilot();

    $user->setName($_REQUEST['name']);
    $user->setSurname($_REQUEST['surname']);
    $user->setLogin($_REQUEST['id']);
    $user->setPassword($_REQUEST['password']);
    $user->setAdmin(1);
    $user->setPromotion($_REQUEST['promotion']);
    $user->setCenter($_REQUEST['center']);
    
    $user->createPilot();
}
