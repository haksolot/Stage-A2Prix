<?php
    include('./backend/tools/links.php');
?>
<!DOCTYPE html>
<head>
    <title>Stage-A2Prix</title>
    <?php linkResource("stylesheet", "/frontend/style/apply.css"); ?>
</head>
<body>
    <div id="bar">
        <button id="settings"></button>
    </div>
    <div id="box">
        <h1 class="text">CV</h1>
        <button class="upload">Glissez le document</button>
        <h1 class="text">Lettre de motivation</h1>
        <button class="upload">Glissez le document</button>
        <button id="save">Enregistrer</button>
    </div>
</body>