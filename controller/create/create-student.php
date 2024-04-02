<?php
require './model/Student.php';

if (isset($_REQUEST['id'], $_REQUEST['password'], $_REQUEST['name'], $_REQUEST['surname'], $_REQUEST['center'], $_REQUEST['promotion'])) {

    $user = new Student();

    $user->setName($_REQUEST['name']);
    $user->setSurname($_REQUEST['surname']);
    $user->setLogin($_REQUEST['id']);
    $user->setPassword($_REQUEST['password']);
    $user->setPilote(4);
    $user->setAdmin(1);
    $user->setYear(2024);
    $user->setPromotion($_REQUEST['promotion']);
    $user->setCenter($_REQUEST['center']);

    $user->createStudent();
}
