<?php
    function linkResource($rel, $href) {
        echo "<link rel='{$rel}' href='{$href}'>";
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Stage A2Prix</title>
    <!-- <link rel="stylesheet" href="style/auth.css"> -->
    <?php linkResource("stylesheet", "/frontend/style/auth.css"); ?>
</head>
<body>
    <div id="container">
        <h1>Authentification</h1>
        <input type="text" id="account-id" placeholder="Nom d'utilisateur">
        <div class="row">
            <input id="password" placeholder="Mot de passe">
            <button id="confirmation" onclick="sendData()"></button>
        </div>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $password = $_POST['password'];
        $user = $_POST['account-id'];

        // Ton traitement PHP ici pour gérer l'envoi des données
    }
    ?>

</body>
</html>
