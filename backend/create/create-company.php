<?php
require './backend/database/db.php';

$database = new Database();
$db = $database->connect();

if (isset($_REQUEST['company-name'], $_REQUEST['sector'], $_REQUEST['adress'], $_REQUEST['description'], $_REQUEST['siret'], $_REQUEST['society'], $_REQUEST['host'], $_REQUEST['capital'])) {
    try {
        $nom_entreprise = $_REQUEST['company-name'];
        $secteur = $_REQUEST['sector'];
        $localisation = $_REQUEST['adress'];
        $description = $_REQUEST['description'];
        $siret = $_REQUEST['siret'];
        $juridique = $_REQUEST['society'];
        $hebergeur = $_REQUEST['host'];
        $capital = $_REQUEST['capital'];

        $checkCompanyExistence = "SELECT Nom_Ent FROM entreprise WHERE Nom_Ent = :nom_entreprise";
        $stmt = $db->prepare($checkCompanyExistence);
        $stmt->bindParam(':nom_entreprise', $nom_entreprise, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            die("L'entreprise spécifié existe déjà.");
        } else {
            // Vérification de la forme de l'adresse
            if (strpos($localisation, ',') === false) {
                die("L'adresse doit être au format correct.");
            }

            // Récupération de la ville à partir de l'adresse
            $ville = explode(',', $localisation)[0];

            // Vérification si la ville existe
            $checkVilleQuery = "SELECT ID_Ville FROM Ville WHERE Nom_Ville = :ville";
            $stmt = $db->prepare($checkVilleQuery);
            $stmt->bindParam(':ville', $ville, PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() == 0) {
                echo ("La ville n'existe pas");
            } else {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $id_ville = $row['ID_Ville'];

                // Vérification si l'adresse existe
                $checkAdresseQuery = "SELECT ID_City FROM Localisation WHERE Adresse = :localisation AND ID_Ville = :id_ville";
                $stmt = $db->prepare($checkAdresseQuery);
                $stmt->bindParam(':localisation', $localisation, PDO::PARAM_STR);
                $stmt->bindParam(':id_ville', $id_ville, PDO::PARAM_INT);
                $stmt->execute();

                if ($stmt->rowCount() == 0) {
                    // Si l'adresse n'existe pas, la créer
                    $insertAdresseQuery = "INSERT INTO Localisation (Adresse, ID_Ville) VALUES (:localisation, :id_ville)";
                    $stmt = $db->prepare($insertAdresseQuery);
                    $stmt->bindParam(':localisation', $localisation, PDO::PARAM_STR);
                    $stmt->bindParam(':id_ville', $id_ville, PDO::PARAM_INT);
                    $stmt->execute();
                    $id_adresse = $db->lastInsertId();
                } else {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $id_adresse = $row['ID_City'];
                }

                // Ajout de l'entreprise
                $insertEntrepriseQuery = "INSERT INTO Entreprise (Nom_Ent, Type_Ent, Nb_postulant, Evaluation, Description, Numero_SIRET, Forme_Juridique, Capital_Social, Hébergeur, ID_Pilote, ID_City, ID_Admin)
                                            VALUES (:nom_entreprise, :secteur, 0, 0, :description, :siret, :juridique, :capital, :hebergeur, NULL, :id_adresse, NULL)";
                $stmt = $db->prepare($insertEntrepriseQuery);
                $stmt->bindParam(':nom_entreprise', $nom_entreprise, PDO::PARAM_STR);
                $stmt->bindParam(':secteur', $secteur, PDO::PARAM_STR);
                $stmt->bindParam(':description', $description, PDO::PARAM_STR);
                $stmt->bindParam(':siret', $siret, PDO::PARAM_STR);
                $stmt->bindParam(':juridique', $juridique, PDO::PARAM_STR);
                $stmt->bindParam(':capital', $capital, PDO::PARAM_STR);
                $stmt->bindParam(':hebergeur', $hebergeur, PDO::PARAM_STR);
                $stmt->bindParam(':id_adresse', $id_adresse, PDO::PARAM_INT);
                $stmt->execute();

                echo "Entreprise ajoutée avec succès.";
            }
        }
    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
}
