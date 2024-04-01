<?php
    include('./backend/tools/links.php');
    include('./backend/firewall/pilot-firewall.php');
    include('./backend/create/create-company.php');
?>
<!DOCTYPE html>
<head>
    <title>Stage-A2Prix</title>
    <link rel="stylesheet" type="text/css" href="view/style/company.css">
</head>
<body>
    <div id="container" >
        <form id="fields" action="" method="post">
            <div id="name">
                <h1>Nom</h1>
                <input name="company-name" id="name-input" placeholder="nom de l'entreprise..">
            </div>
            <div id="sector">
                <h1>Secteur</h1>
                <input name="sector" id="sector-input" placeholder="secteur d'activité..">
                <button id="add-sector">&nbsp;</button>
            </div>
            <div id="location">
                <h1>Localité</h1>
                <input name="adress" id="location-input" placeholder="localité..">
            </div>
            <div id="description">
                <h1>Description</h1>
                <input name="description" id="description-input" placeholder="description de l'entreprise..">
            </div>
            <div id="siret">
                <h1>SIRET</h1>
                <input name="siret" id="siret-input" placeholder="SIRET de l'entreprise..">
            </div>
            <div id="society">
                <h1>Société</h1>
                <input name="society" id="society-input" placeholder="type de la société..">
            </div>
            <div id="host">
                <h1>Hébergeur</h1>
                <input name="host" id="host-input" placeholder="hébergeur..">
            </div>
            <div id="capitale">
                <h1>Capital Soacial</h1>
                <input name="capital" id="capital-input" placeholder="Capital social..">
            </div>
            <div id="buttons">
                <button id="create">Créer</button>
            </div>
        </form>
</form>
</body>