<?php
include('./model/Student.php');

session_start();
$Student = new Student();

$maxUsers = $Student->studentNumber();

$donnees = array();

for ($i = 1; $i <= $maxUsers; $i++) {
    $userName = $Student->getUserNameByIndex($i);
    $donnees[] = array("prenom" => $userName, "nom" => "");
}


if (isset($_POST['textbox'])) {

    $currentStudent = new Student();
    $currentStudent->setId($currentStudent->findUserId($_POST['textbox']));
    $_SESSION['userId'] = $currentStudent->getId();
    
}

