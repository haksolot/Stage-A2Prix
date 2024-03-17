<?php
    include('./backend/tools/links.php');
    include('./backend/auth.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Stage A2Prix</title>
    <!-- <link rel="stylesheet" href="style/auth.css"> -->
    <?php linkResource("stylesheet", '/frontend/style/auth.css'); ?>
</head>

<body>

    <form id="container" action="" method="post" name="login">
        <h1>Authentification</h1>
        <input type="text" id="account-id" name="username" placeholder="Nom d'utilisateur">
        <div class="row">
            <input id="password" name="password" placeholder="Mot de passe">
            <button id="confirmation" onclick="sendData()"></button>
        </div>
</form>
</body>

</html>