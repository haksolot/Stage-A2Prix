<?php
include './controller/firewall/student-firewall.php';
include './controller/load/loadOffers.php';
include './controller/load/loadPeople.php';
include './controller/search/searchCompany.php';
include './controller/search/searchSector.php';
include './controller/search/searchCity.php';
include './controller/search/searchCenter.php';
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
    <form id="bar" method="POST">
        <button id="wishlist"></button>
        <input id="search" name="search" placeholder="Rechercer..">
        <input id="sector" name="sector" placeholder="Secteur">
        <input id="location" name="location" placeholder="Localité">
        <input id="center" name="center" placeholder="Center">
        <button id="settings" onclick="window.location.href = '/edit/student';"></button>
    </form>
    <div id="scroller">
        <?php
        if(isset($_POST['search'])){
            searchCompany($_POST['search']);
        } else if(isset($_POST['sector'])){
            searchSector($_POST['sector']);
        } else if(isset($_POST['location'])){
            searchCity($_POST['location']);
        } else if(isset($_POST['center'])){
            searchCenter($_POST['center']);
        }
// searchCompany("Trito");
// loadPeople();
loadOffers();
// searchSector("Inf");
// searchCity("Par");
// searchCenter("CESI Ango");
?>
    </div>
</body>