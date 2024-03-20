<?php

include('class.php');

$user = new User;

$user->setName('lol');
$user->setLogin('mdr');

print_r($user->getUser());
