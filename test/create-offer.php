<?php
// Connexion à la base de données
$mysqli = new mysqli("localhost", "root", "", "a2prix");

// Vérifier la connexion
if ($mysqli->connect_error) {
    die("Erreur de connexion : " . $mysqli->connect_error);
}

// Paramètres d'entrée
$nom_entreprise = "DipWeb";
$poste = "Developer";
$adresse = "Paris, 6 rue des coteaux";
$description = "jen sais rien mon pote";
$secteur = "Transport";
$remuneration = "655";
$places = "2";
$duree = "12";

$ville = explode(',', $adresse)[0];

// Vérification si l'entreprise existe à partir du nom et de l'adresse
$checkEntrepriseQuery = "SELECT ID_Entreprise 
                         FROM Entreprise 
                         WHERE Nom_Ent = '$nom_entreprise'";
$result = $mysqli->query($checkEntrepriseQuery);

if ($result->num_rows == 0) {
    die("L'entreprise spécifiée n'existe pas.");
} else {
    $row = $result->fetch_assoc();
    $id_entreprise = $row['ID_Entreprise'];

        $date = date("Y-m-d");
    // Ajout du stage
    $insertStageQuery = "INSERT INTO Stage (Titre, Duree, Remuneration, Places, Nb_Postulants, Date_Parution, Notation, ID_Entreprise, Description) 
                         VALUES ('$poste', '$duree', '$remuneration', '$places', 0, $date , 0, '$id_entreprise', '$description')";
    if ($mysqli->query($insertStageQuery) === TRUE) {
        echo "Stage ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout du stage : " . $mysqli->error;
    }
}

// Fermer la connexion
$mysqli->close();
?>
