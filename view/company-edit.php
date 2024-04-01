<?php
    include('./backend/tools/links.php');
?>
<!DOCTYPE html>
<head>
    <title>Stage-A2Prix</title>
    <link rel="stylesheet" type="text/css" href="view/style/company.css">
</head>
<body>
    <div id="container">
        <div id="fields">
            <div id="name">
                <h1>Nom</h1>
                <input id="name-input" placeholder="nom de l'entreprise..">
            </div>
            <div id="sector">
                <h1>Secteur</h1>
                <input id="sector-input" placeholder="secteur d'activité..">
                <button id="add-sector">&nbsp;</button>
            </div>
            <div id="location">
                <h1>Localité</h1>
                <input id="location-input" placeholder="localité..">
            </div>
            <div id="description">
                <h1>Description</h1>
                <input id="description-input" placeholder="description de l'entreprise..">
            </div>
        </div>
        <div id="buttons">
            <button id="delete">&nbsp;</button>
            <button id="edit">Modifier</button>
        </div>
    </div>
</body>