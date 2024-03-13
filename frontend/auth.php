<?php
session_start();
require('./backend/db.php');

if (isset($_POST['username'])){
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username);
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM Utilisateur WHERE Login='$username' and Password='".hash('sha512', $password)."'";
  $result = mysqli_query($conn,$query) or die(mysql_error());
  $rows = mysqli_num_rows($result);
  if($rows==1){
      $_SESSION['username'] = $username;
      header("Location: /dashboard");
  }else{
    echo("Le nom d'utilisateur ou le mot de passe est incorrect.");
  }
}

function linkResource($rel, $href)
{
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