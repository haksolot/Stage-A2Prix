<?php

include './controller/firewall/pilot-firewall.php';
include './controller/load/loadPilotOffers.php';
include './controller/load/loadOffers.php';
include './controller/load/loadPeople.php';
include './controller/search/searchCompany.php';
include './controller/search/searchSector.php';
include './controller/search/searchCity.php';
include './controller/search/searchCenter.php';
// echo($_SESSION['ID_Entreprise']);
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
        <button onclick="window.location.href = '/create/student';" id="create-student" class="choice">Étudiant</button>
        <button onclick="window.location.href = '/create/offer';" id="create-offer" class="choice">Offre</button>

    </div>  
    <div id="create-choices">
        <button onclick="window.location.href = '/edit/pilote';" id="edit-pilote" class="choices">Compte</button>
        <button onclick="window.location.href = '/list/students';" id="list-students" class="choices">Etudiants</button>
    </div>  

    <div id="to-blur">
        <div id="bar">
            <button id="wishlist"></button>
            <input id="search" placeholder="Rechercer..">
            <button id="create-button">Créer</button>
            <button id="settings" ></button>
        </div>
        <div id="scroller">
         <?php loadPilotOffers()?>
        </div>
    </div>
</body>
</html>
