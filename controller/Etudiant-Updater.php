<?php
require("./model/Student.php");

$idCurrentStudent = 10;
if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['center']) && isset($_POST['promotion'])) {
    $Student = new Student();
    $Student->setName($_POST['name']);
    $Student->setSurname($_POST['surname']);
    $Student->setCenter($_POST['center']);
    $Student->setPromotion($_POST['promotion']);

    $Student->updateStudent($idCurrentStudent);
}







