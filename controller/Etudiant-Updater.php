<?php
require("controller/tempUdpater.php");
$currentStudent = new Student();

if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['center']) && isset($_POST['promotion'])) {
    $currentId = $_SESSION['userId'];
    $currentStudent->setName($_POST['name']);
    $currentStudent->setSurname($_POST['surname']);
    $currentStudent->setCenter($_POST['center']);
    $currentStudent->setPromotion($_POST['promotion']);
    $currentStudent->updateStudent($currentId);
}

if (isset($_POST['delete'])) {

    $currentId = $_SESSION['userId'];
    $currentStudent->deleteStudent($currentId);
}







