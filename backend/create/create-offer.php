<?php
    require('./backend/database/db.php');

    if (isset($_REQUEST['company-name'], $_REQUEST['title'], $_REQUEST['adress'], $_REQUEST['description'], $_REQUEST['sector'], $_REQUEST['money'], $_REQUEST['duration'], $_REQUEST['places'])){
        // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
        $nom_entreprise = mysqli_real_escape_string($mysqli, stripslashes($_REQUEST['company-name']));
        $poste = mysqli_real_escape_string($mysqli, stripslashes($_REQUEST['title']));
        $adresse = mysqli_real_escape_string($mysqli, stripslashes($_REQUEST['adress']));
        $description = mysqli_real_escape_string($mysqli, stripslashes($_REQUEST['description']));
        $secteur = mysqli_real_escape_string($mysqli, stripslashes($_REQUEST['sector']));
        $remuneration = mysqli_real_escape_string($mysqli, stripslashes($_REQUEST['money']));
        $duree = mysqli_real_escape_string($mysqli, stripslashes($_REQUEST['duration']));
        $places = mysqli_real_escape_string($mysqli, stripslashes($_REQUEST['places']));

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
    }
?>