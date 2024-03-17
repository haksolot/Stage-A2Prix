<?php
    session_start();
    require('./backend/database/db.php');

    if (isset($_POST['username'])){
        $username = mysqli_real_escape_string($mysqli, stripslashes($_REQUEST['username']));
        $password = mysqli_real_escape_string($mysqli, stripslashes($_REQUEST['password']));
        $role = NULL;
        $id = NULL;

        $query = "SELECT * FROM Utilisateur WHERE Login='$username' and Password='".hash('sha512', $password)."'";
        $result = mysqli_query($mysqli,$query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if($rows==1){
            $_SESSION['logged_in'] = true;
            $checkLoginExistence = "SELECT ID_User 
                        FROM utilisateur 
                        WHERE Login = '$username'";

            $result = $mysqli->query($checkLoginExistence);
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $id = $row['ID_User'];

                $checkPilot = "SELECT ID_Pilote 
                FROM pilote 
                WHERE ID_Pilote = '$id'";

                $result = $mysqli->query($checkPilot);

                if ($result->num_rows > 0){
                    $role = "pilot";
                }

                $checkStudent = "SELECT ID_Student 
                FROM étudiant 
                WHERE ID_Student = '$id'";

                $result = $mysqli->query($checkStudent);

                if ($result->num_rows > 0){
                    $role = "student";
                }

            } else {
                echo('Utilisateur n\'existe pas');
            }

            if($role)
            {
              $_SESSION['role'] = $role;
              $_SESSION['id'] = $id;
              if ($role == 'student')
              {
                header("Location: /dashboard");
              }
              else if ($role == 'pilot')
              {
                header("Location: /pilot-dashboard");
              }
            }
            else{
                echo("L'utilisateur n'a pas de role");
            }

        }else{
          echo("Le nom d'utilisateur ou le mot de passe est incorrect.");
        }
      }
?>