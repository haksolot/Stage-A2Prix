<?php
include './controller/firewall/student-firewall.php';
include './controller/load/loadOffers.php';
include './controller/load/loadPeople.php';
include './controller/search/searchCompany.php';
?>
<!DOCTYPE html>
<head>
    <title>Stage-A2Prix</title>
    <link rel="stylesheet" type="text/css" href="view/style/dashboard.css">
    <link rel="stylesheet" type="text/css" href="view/style/offer.css">
    <link rel="stylesheet" type="text/css" href="view/style/person.css">
    <script src="view/script/offer-interactions.js"></script>
</head>
<body>
    <div id="bar">
        <button id="wishlist"></button>
        <input id="search" placeholder="Rechercer..">
        <input id="sector" placeholder="Secteur">
        <input id="location" placeholder="Localité">
        <input id="center" placeholder="Center">
        <button id="settings"></button>
    </div>
    <div id="scroller">
        <?php 
        searchCompany("Trito");
        // loadPeople();
        // loadOffers();
        ?>
    </div>
</body>