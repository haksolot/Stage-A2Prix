<?php
    include('controller/Pilote-Updater.php');
?>
<!DOCTYPE html>
<head>  
    <title>Stage-A2Prix</title>
    <link rel="stylesheet" type="text/css" href="../view/style/updatePilote.css">

</head>
<body>
    <form id="container" action="" method="post">
        <h1>Modification de compte</h1>
        <div class="row">
            <input type="text" name="name" id="name" placeholder="Nom">
            <input type="text" name="surname" id="surname" placeholder="Prénom">
        </div>
        <div class="row">
            <button id="confirmation"></button>
        </div>
    </form>
</body>