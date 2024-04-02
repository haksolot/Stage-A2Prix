<?php
// require("./model/Pilot.php");

// $test = new Pilot();

// $test->setName("Test");
// $test->setSurname("lol");
// $test->setLogin("ggjdflkgdfj");
// $test->setPassword("nword");
// // $test->setPilote(4);
// $test->setAdmin(1);
// $test->setPromotion("nencore");
// $test->setCenter("Cesi ARRAS");

// $test->createPilot();

require("./model/Student.php");

$test = new Student();

$test->setName("Test");
$test->setSurname("lol");
$test->setLogin("patricksway");
$test->setPassword("nword");
$test->setYear(2014);
$test->setPilote(4);
$test->setAdmin(1);
$test->setPromotion("nencore");
$test->setCenter("Cesi ARRAS");

$test->createStudent();

// require("./model/Company.php");

// $test = new Company();

// $test->setCompany("Diplle", "again", "jfdkljgklds", "Pau, 2 rue de chepa", 65467854, "SARS", 78947893472389, "AWS");

// $test->createCompany();

// echo date("Y-m-d");

// require("./model/Offer.php");

// $test = new Offer();

// $test->setCompanyId(3);

// $test->setOffer("Niig", "fgdjkgdsfk", 12, 345, 2, 0, "12-11-2012", 2);

// $test->checkCompany();
// $test->createOffer();

