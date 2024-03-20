<?php
require './backend/database/db.php';

$database = new Database();
$db = $database->connect();

if (isset($_REQUEST['company-name'], $_REQUEST['title'], $_REQUEST['adress'], $_REQUEST['description'], $_REQUEST['sector'], $_REQUEST['money'], $_REQUEST['duration'], $_REQUEST['places'])) {
    try {
        $nom_entreprise = $_REQUEST['company-name'];
        $poste = $_REQUEST['title'];
        $adresse = $_REQUEST['adress'];
        $description = $_REQUEST['description'];
        $secteur = $_REQUEST['sector'];
        $remuneration = $_REQUEST['money'];
        $duree = $_REQUEST['duration'];
        $places = $_REQUEST['places'];

        $ville = explode(',', $adresse)[0];

        // Vérification si l'entreprise existe à partir du nom et de l'adresse
        $checkEntrepriseQuery = "SELECT ID_Entreprise FROM Entreprise WHERE Nom_Ent = :nom_entreprise";
        $stmt = $db->prepare($checkEntrepriseQuery);
        $stmt->bindParam(':nom_entreprise', $nom_entreprise, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() == 0) {
            die("L'entreprise spécifiée n'existe pas.");
        } else {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $id_entreprise = $row['ID_Entreprise'];

            $date = date("Y-m-d");

            // Ajout du stage
            $insertStageQuery = "INSERT INTO Stage (Titre, Duree, Remuneration, Places, Nb_Postulants, Date_Parution, Notation, ID_Entreprise, Description)
                                VALUES (:poste, :duree, :remuneration, :places, 0, :date, 0, :id_entreprise, :description)";
            $stmt = $db->prepare($insertStageQuery);
            $stmt->bindParam(':poste', $poste, PDO::PARAM_STR);
            $stmt->bindParam(':duree', $duree, PDO::PARAM_STR);
            $stmt->bindParam(':remuneration', $remuneration, PDO::PARAM_STR);
            $stmt->bindParam(':places', $places, PDO::PARAM_INT);
            $stmt->bindParam(':date', $date, PDO::PARAM_STR);
            $stmt->bindParam(':id_entreprise', $id_entreprise, PDO::PARAM_INT);
            $stmt->bindParam(':description', $description, PDO::PARAM_STR);
            $stmt->execute();

            echo "Stage ajouté avec succès.";
        }
    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
}
