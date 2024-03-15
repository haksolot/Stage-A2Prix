<?php
    include('./backend/links.php');
?>
<!DOCTYPE html>
<head>
    <title>Stage-A2Prix</title>
    <!-- <link rel="stylesheet" href="style/account-creation.css"> -->
    <?php 
    linkResource("stylesheet", "/frontend/style/account-creation.css"); 
    // linkScript("frontend/script/createPiloteConfirm.js");
    ?>

</head>
<body>
<?php
require('./backend/db.php');
if (isset($_REQUEST['id'], $_REQUEST['password'], $_REQUEST['name'], $_REQUEST['surname'], $_REQUEST['center'], $_REQUEST['promotion'])){
  // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
  $id = stripslashes($_REQUEST['id']);
  $id = mysqli_real_escape_string($conn, $id);
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
  $name = stripslashes($_REQUEST['name']);
  $name = mysqli_real_escape_string($conn, $name);
  $surname = stripslashes($_REQUEST['surname']);
  $surname = mysqli_real_escape_string($conn, $surname);
  $center = stripslashes($_REQUEST['center']);
  $center = mysqli_real_escape_string($conn, $center);
  $promotion = stripslashes($_REQUEST['promotion']);
  $promotion = mysqli_real_escape_string($conn, $promotion);
  $query = "INSERT INTO Utilisateur (Nom_user, Prenom_user, Password, Login) VALUES ('$name', '$surname', '".hash('sha512', $password)."', '$id')";
  $res = mysqli_query($conn, $query);
}

?>
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