<?php
require("./model/Pilot.php");

$test = new Pilot();

$test->setName("Test");
$test->setSurname("lol");
$test->setLogin("coutfjdksefds");
$test->setPassword("nword");
// $test->setPilote(4);
$test->setAdmin(1);
$test->setPromotion("nencore");
$test->setCenter("Cesi ARRAS");

$test->createPilot();
