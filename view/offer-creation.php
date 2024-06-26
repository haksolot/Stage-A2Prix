<?php
    include('./controller/firewall/pilot-firewall.php');
    include('./controller/create/create-offer.php');
?>
<!DOCTYPE html>
<head>
    <title>Stage-A2Prix</title>
    <link rel="stylesheet" type="text/css" href="../view/style/offer-creation.css">
</head>
<body>
    <div id="container">
        <form id="fields" action="" method="post">
            <div id="company-name">
                <h1>Nom de l'entreprise</h1>
                <input name="company-name" id="company-name-input" placeholder="nom de l'entreprise..">
            </div>
            <div id="post">
                <h1>Poste</h1>
                <input name="title" id="post-input" placeholder="poste..">
            </div>
            <div id="adress">
                <h1>Adresse</h1>
                <input name="adress" id="adress-input" placeholder="addresse..">
            </div>
            <div id="description">
                <h1>Description</h1>
                <input name="description" id="description-input" placeholder="description de l'entreprise..">
            </div>
            <div id="sector">
                <h1>Secteur</h1>
                <input name="sector" id="sector-input" placeholder="secteur d'activité du poste..">
            </div>
            <div id="money">
                <h1>Rémunération</h1>
                <input name="money" id="money-input" placeholder="Rémunération pour le poste..">
            </div> 
            <div id="duration">
                <h1>Durée</h1>
                <input name="duration" id="duration-input" placeholder="Durée du poste..">
            </div>
            <div id="places">
                <h1>Places</h1>
                <input name="places" id="places-input" placeholder="Places à pourvoir..">
            </div>
            <div id="buttons">
                <button id="create">Créer</button>
            </div>
        </form>
    </div>
</body>