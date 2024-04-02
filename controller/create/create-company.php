<?php
require './model/Company.php';

if (isset($_REQUEST['company-name'], $_REQUEST['sector'], $_REQUEST['adress'], $_REQUEST['description'], $_REQUEST['siret'], $_REQUEST['society'], $_REQUEST['capital'], $_REQUEST['capital'])) {
    
    $comp = new Company();

    $comp->setCompany($_REQUEST['company-name'], $_REQUEST['sector'], $_REQUEST['description'], $_REQUEST['adress'], $_REQUEST['siret'], $_REQUEST['society'], $_REQUEST['capital'], $_REQUEST['host']);

    $comp->createCompany();
}
