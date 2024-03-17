<?php
    include('./backend/tools/links.php');
?>
<!DOCTYPE html>
<head>
    <title>Stage-A2Prix</title>
    <?php linkResource("stylesheet", "/frontend/style/account-creation.css"); ?>
</head>
<body>
    <div id="container">
        <h1>Création de compte</h1>
        <input type="text" id="account-id" placeholder="Nom d'utilisateur">
        <input id="password" placeholder="Mot de passe">
        <div class="row">
            <input type="text" id="name" placeholder="Nom">
            <input type="text" id="surname" placeholder="Prénom">
        </div>
        <div class="row">
            <input type="text" id="center" placeholder="Centre">
            <input type="text" id="promotion" placeholder="Promotion assigné">
            <button id="confirmation"></button>
        </div>
    </div>
</body>
