<?php
// Connexion à la base de données
$mysqli = new mysqli("localhost", "root", "", "a2prix");

// Vérifier la connexion
if ($mysqli->connect_error) {
    die("Erreur de connexion : " . $mysqli->connect_error);
}

// Ajout d'un nouvel utilisateur
$username = "seanchad";
$password = "1234";
$name = "Sean";
$surname = "Lamet";

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
            $result = $mysqli->query("SELECT LAST_INSERT_ID() as id");
            $row = $result->fetch_assoc();
            $id_utilisateur = $row['id'];

            // Ajout d'un nouveau pilote lié à l'utilisateur
            $insertPiloteQuery = "INSERT INTO Pilote (ID_Pilote, ID_Admin) 
                                VALUES ('$id_utilisateur', '1')";

            if ($mysqli->query($insertPiloteQuery) === TRUE) {
                echo "Pilote ajouté avec succès. ";

                // Vérification si le centre existe
                $center = "CESI Arras";

                $checkCenterQuery = "SELECT ID_Formation 
                                    FROM Centre 
                                    WHERE Nom_Centre = '$center'";

                $result = $mysqli->query($checkCenterQuery);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $id_centre = $row['ID_Formation'];
                } else {
                    die("Le centre spécifié n'existe pas.");
                }

                // Vérification si la promotion existe
                $promotion = "CPI69";

                $checkPromotionQuery = "SELECT ID_Promotion 
                                        FROM Promotion 
                                        WHERE Nom_Promo = '$promotion'";

                $result = $mysqli->query($checkPromotionQuery);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $id_promotion = $row['ID_Promotion'];
                } else {
                    // Création de la promotion si elle n'existe pas
                    $insertPromotionQuery = "INSERT INTO Promotion (Nom_Promo, ID_Pilote, ID_Formation)
                                            VALUES ('$promotion', $id_utilisateur, '$id_centre')";
                    if ($mysqli->query($insertPromotionQuery) === TRUE) {
                        echo "Promotion créée avec succès. ";
                        $id_promotion = $mysqli->insert_id;
                    } else {
                        echo "Erreur lors de la création de la promotion : " . $mysqli->error;
                    }
                }

                echo "ID de la promotion: " . $id_promotion;
            } else {
                echo "Erreur lors de l'ajout du pilote : " . $mysqli->error;
            }
        } else {
            echo "Erreur lors de l'ajout de l'utilisateur : " . $mysqli->error;
        }
    }

// Fermer la connexion
$mysqli->close();
?>
