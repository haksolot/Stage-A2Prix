<?php
    include('./backend/tools/links.php');
    include('./backend/firewall/pilot-firewall.php');
    include('./backend/create/create-student.php');
?>
<!DOCTYPE html>
<head>
    <title>Stage-A2Prix</title>
    <link rel="stylesheet" type="text/css" href="view/style/account-creation.css">
</head>
<body>
    <form id="container" action="" method="post">
        <h1>Création de compte</h1>
        <input type="text" name="id" id="account-id" placeholder="Nom d'utilisateur">
        <input id="password" name="password" placeholder="Mot de passe">
        <div class="row">
            <input type="text" name="name" id="name" placeholder="Nom">
            <input type="text" name="surname" id="surname" placeholder="Prénom">
        </div>
        <div class="row">
            <input type="text" name="center" id="center" placeholder="Centre">
            <input type="text" name="promotion" id="promotion" placeholder="Promotion">
            <button id="confirmation"></button>
        </div>
    </form>
</body>