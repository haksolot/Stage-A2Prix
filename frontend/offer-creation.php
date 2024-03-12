<?php
    function linkResource($rel, $href) {
        echo "<link rel='{$rel}' href='{$href}'>";
    }
    function linkScript($src) {
        echo "<script src='{$src}'></script>";
    }
?>
<!DOCTYPE html>
<head>
    <title>Stage-A2Prix</title>
    <!-- <link rel="stylesheet" href="style/offer-creation.css"> -->
    <?php 
    linkResource("stylesheet", "/frontend/style/offer-creation.css"); 
    // linkScript("frontend/script/createPiloteConfirm.js");
    ?>
</head>
<body>
    <div id="container">
        <div id="fields">
            <div id="company-name">
                <h1>Nom de l'entreprise</h1>
                <input id="company-name-input" placeholder="nom de l'entreprise..">
            </div>
            <div id="post">
                <h1>Poste</h1>
                <input id="post-input" placeholder="poste..">
            </div>
            <div id="adress">
                <h1>Adresse</h1>
                <input id="adress-input" placeholder="addresse..">
            </div>
            <div id="description">
                <h1>Description</h1>
                <input id="description-input" placeholder="description de l'entreprise..">
            </div>
            <div id="sector">
                <h1>Secteur</h1>
                <input id="sector-input" placeholder="secteur d'activité du poste..">
            </div>
            <div id="money">
                <h1>Rémunération</h1>
                <input id="money-input" placeholder="Rémunération pour le poste..">
            </div> 
            <div id="duration">
                <h1>Durée</h1>
                <input id="duration-input" placeholder="Durée du poste..">
            </div>
            <div id="buttons">
                <button id="create">Créer</button>
            </div>
        </div>
    </div>
</body>