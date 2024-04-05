<?php
    include('./controller/firewall/admin-firewall.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Stage-A2Prix</title>
    <link rel="stylesheet" type="text/css" href="view/style/dashboard.css">
    <link rel="stylesheet" type="text/css" href="view/style/offer.css">
    <script src="view/script/offer-interactions.js"></script>
    <script src="view/script/admin-dashboard-interactions.js"></script>
</head>
<body>
    <div id="create-choice">
        <button id="create-student" class="choice">Étudiant</button>
        <button id="create-pilot" class="choice" onclick ="GoToCreatePilot()">Pilote</button>
        <button id="create-offer" class="choice">Offre</button>
    </div>  
    <div id="to-blur">
        <div id="bar">
            <button id="wishlist"></button>
            <input id="search" placeholder="Rechercer..">
            <button id="create-button">Créer</button>
            <button id="settings"></button>
        </div>
        <div id="scroller">
            <div>Yes</div>
        </div>
    </div>
</body>
</html>
