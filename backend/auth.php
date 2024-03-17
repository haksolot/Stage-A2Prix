<?php
    session_start();
    require('./backend/database/db.php');

    if (isset($_POST['username'])){
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($conn, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        $query = "SELECT * FROM Utilisateur WHERE Login='$username' and Password='".hash('sha512', $password)."'";
        $result = mysqli_query($conn,$query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if($rows==1){
            $_SESSION['logged_in'] = true;
            echo('coucou');
            header("Location: /dashboard");
        }else{
          echo("Le nom d'utilisateur ou le mot de passe est incorrect.");
        }
      }
?>