<?php
    // session_start();
    require('./backend/database/db.php');

    if (isset($_REQUEST['id'], $_REQUEST['password'], $_REQUEST['name'], $_REQUEST['surname'], $_REQUEST['center'], $_REQUEST['promotion'])){
      // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
        $username = mysqli_real_escape_string($mysqli, stripslashes($_REQUEST['id']));
        $password = mysqli_real_escape_string($mysqli, stripslashes($_REQUEST['password']));
        $name = mysqli_real_escape_string($mysqli, stripslashes($_REQUEST['name']));
        $surname = mysqli_real_escape_string($mysqli, stripslashes($_REQUEST['surname']));
        $center = mysqli_real_escape_string($mysqli, stripslashes($_REQUEST['center']));
        $promotion = mysqli_real_escape_string($mysqli, stripslashes($_REQUEST['promotion']));

        $checkLoginExistence = "SELECT Login 
                        FROM utilisateur 
                        WHERE Login = '$username'";

        $result = $mysqli->query($checkLoginExistence);

        if ($result->num_rows > 0) {
            die("Utilisateur spécifié existe déja.");
        } else {
            echo("Noice");
            $insertUserQuery = "INSERT INTO Utilisateur (Nom_user, Prenom_user, Password, Login) 
                            VALUES ('$name', '$surname', '".hash('sha512', $password)."', '$username')";

            if ($mysqli->query($insertUserQuery) === TRUE) {
                echo "Utilisateur ajouté avec succès. ";
                // Récupération de l'ID de l'utilisateur ajouté
                $id_utilisateur = $mysqli->insert_id;

                // Vérification si le centre existe

                $checkCenterQuery = "SELECT ID_Formation 
                                    FROM Centre 
                                    WHERE Nom_Centre = '$center'";

                $result = $mysqli->query($checkCenterQuery);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $id_centre = $row['ID_Formation'];

                    $checkPromotionQuery = "SELECT ID_Promotion 
                                            FROM Promotion 
                                            WHERE Nom_Promo = '$promotion'";

                    $result = $mysqli->query($checkPromotionQuery);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $id_promotion = $row['ID_Promotion'];
                    } else {
                        // Création de la promotion
                        $insertPromotionQuery = "INSERT INTO Promotion (Nom_Promo, ID_Pilote, ID_Formation) 
                                                VALUES ('$promotion', '2', '$id_centre')";

                        if ($mysqli->query($insertPromotionQuery) === TRUE) {
                            echo "Promotion créée avec succès. ";
                            $id_promotion = $mysqli->insert_id;
                        } else {
                            echo "Erreur lors de la création de la promotion : " . $mysqli->error;
                        }
                    }

                    // Ajout d'un nouvel étudiant lié à l'utilisateur
                    $insertStudentQuery = "INSERT INTO Étudiant (ID_Student, Annee_Formation, ID_Pilote, ID_Admin, ID_Promotion) 
                                        VALUES ('$id_utilisateur', '2024lol', '2', '1', '$id_promotion')";

                    if ($mysqli->query($insertStudentQuery) === TRUE) {
                        echo "Étudiant ajouté avec succès.";
                    } else {
                        echo "Erreur lors de l'ajout de l'étudiant : " . $mysqli->error;
                    }
                } else {
                    echo "Erreur lors de l'ajout de l'utilisateur : " . $mysqli->error;
                }
                } else {
                    die("Le centre spécifié n'existe pas.");
                }
        }
        // Fermer la connexion
        $mysqli->close();
        }
?>