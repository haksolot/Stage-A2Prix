<?php
// session_start();
require './backend/database/db.php';

$database = new Database();
$db = $database->connect();

if (isset($_REQUEST['id'], $_REQUEST['password'], $_REQUEST['name'], $_REQUEST['surname'], $_REQUEST['center'], $_REQUEST['promotion'])) {
    try {
        $username = $_REQUEST['id'];
        $password = $_REQUEST['password'];
        $password = hash('sha512', $password);
        $name = $_REQUEST['name'];
        $surname = $_REQUEST['surname'];
        $center = $_REQUEST['center'];
        $promotion = $_REQUEST['promotion'];

        $checkLoginExistence = "SELECT Login FROM utilisateur WHERE Login = :username";
        $stmt = $db->prepare($checkLoginExistence);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            die("Utilisateur spécifié existe déjà.");
        } else {
            $insertUserQuery = "INSERT INTO Utilisateur (Nom_user, Prenom_user, Password, Login) VALUES (:name, :surname, :password, :username)";
            $stmt = $db->prepare($insertUserQuery);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->execute();

            echo "Utilisateur ajouté avec succès. ";
            $id_utilisateur = $db->lastInsertId();

            $insertPiloteQuery = "INSERT INTO Pilote (ID_Pilote, ID_Admin) VALUES (:id_utilisateur, 1)";
            $stmt = $db->prepare($insertPiloteQuery);
            $stmt->bindParam(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
            $stmt->execute();

            echo "Pilote ajouté avec succès. ";

            $checkCenterQuery = "SELECT ID_Formation FROM Centre WHERE Nom_Centre = :center";
            $stmt = $db->prepare($checkCenterQuery);
            $stmt->bindParam(':center', $center, PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $id_centre = $row['ID_Formation'];
            } else {
                die("Le centre spécifié n'existe pas.");
            }

            $checkPromotionQuery = "SELECT ID_Promotion FROM Promotion WHERE Nom_Promo = :promotion";
            $stmt = $db->prepare($checkPromotionQuery);
            $stmt->bindParam(':promotion', $promotion, PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $id_promotion = $row['ID_Promotion'];
            } else {
                $insertPromotionQuery = "INSERT INTO Promotion (Nom_Promo, ID_Pilote, ID_Formation) VALUES (:promotion, :id_utilisateur, :id_centre)";
                $stmt = $db->prepare($insertPromotionQuery);
                $stmt->bindParam(':promotion', $promotion, PDO::PARAM_STR);
                $stmt->bindParam(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
                $stmt->bindParam(':id_centre', $id_centre, PDO::PARAM_INT);
                $stmt->execute();

                echo "Promotion créée avec succès. ";
                $id_promotion = $db->lastInsertId();
            }

            echo "ID de la promotion: " . $id_promotion;
        }
    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
}