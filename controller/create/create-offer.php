<?php
require "./model/Offer.php";

if (isset($_REQUEST['company-name'], $_REQUEST['title'], $_REQUEST['adress'], $_REQUEST['description'], $_REQUEST['sector'], $_REQUEST['money'], $_REQUEST['duration'], $_REQUEST['places'])) {

    $offer = new Offer();

    $offer->setCompanyId(3);

    $offer->setTitle($_REQUEST['title']);
    $offer->setDescription($_REQUEST['description']);
    $offer->setDuration($_REQUEST['duration']);
    $offer->setMoney($_REQUEST['money']);
    $offer->setOpenings($_REQUEST['places']);

    $offer->createOffer();
}
