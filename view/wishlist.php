<?php
include './controller/firewall/student-firewall.php';
include './controller/loadWishlists.php';
?>
<!DOCTYPE html>
<head>
    <title>Stage-A2Prix</title>
    <link rel="stylesheet" type="text/css" href="view/style/dashboard.css">
    <link rel="stylesheet" type="text/css" href="view/style/offer.css">
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
load();
?>
    </div>
</body>