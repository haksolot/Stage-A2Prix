<?php
    // Connexion à la base de données
    $mysqli = new mysqli("localhost", "root", "", "a2prix");

    // Vérifier la connexion
    if ($mysqli->connect_error) {
        die("Erreur de connexion : " . $mysqli->connect_error);
    }

    // Ajout d'un nouvel utilisateur
    $username = "baptistyffhd";
    $role = NULL;

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
        echo($role);
    }
    else{
        echo("L'utilisateur n'a pas de role");
    }
?>