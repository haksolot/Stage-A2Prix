<?php
    //include('./controller/firewall/pilot-firewall.php');
    include('./controller/tempUdpater.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Stage-A2Prix</title>
    <link rel="stylesheet" type="text/css" href="../view/style/dashboard.css">
    <link rel="stylesheet" type="text/css" href="../view/style/studen-list.css">
    <style>
        <?php include('../view/style/studen-list.css'); ?>
    </style>
</head>
<body>
    <div id="bar">
    <form id="container" action="/edit/student" method="post">
        <input id="Confirm" name="textbox" placeholder="Utilisateur a modifier">
        <button id="confirmation"></button>
        </form>
    </div>
    <?php
    foreach ($donnees as $index => $personne) {
        $prenom = $personne["prenom"];
        $nom = $personne["nom"];
    ?>
    <div class="offer-container">
        <div id="offer-<?php echo $index; ?>" class="offer-background closed">
            <div class="top-part">
                <div class="offer-left">
                    <div class="offer-title">
                        <h1 class="offer-h1"><?php echo $prenom . ' ' . $nom; ?></h1>
                    </div>
                    <input class="offer-address-input"></input>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    

</body>
</html>
