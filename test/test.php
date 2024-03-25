<?php

include('other.php');

$student = new Student;

$student->setName('lol');
$student->setLogin('mdr');

print_r($student->test());
