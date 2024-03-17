<?php
    require('./backend/database/db.php');

    if (isset($_REQUEST['company-name'], $_REQUEST['sector'], $_REQUEST['adress'], $_REQUEST['description'], $_REQUEST['siret'], $_REQUEST['society'], $_REQUEST['host'], $_REQUEST['capital'])){
        // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
        $nom_entreprise = mysqli_real_escape_string($mysqli, stripslashes($_REQUEST['company-name']));
        $secteur = mysqli_real_escape_string($mysqli, stripslashes($_REQUEST['sector']));
        $localisation = mysqli_real_escape_string($mysqli, stripslashes($_REQUEST['adress']));
        $description = mysqli_real_escape_string($mysqli, stripslashes($_REQUEST['description']));
        $siret = mysqli_real_escape_string($mysqli, stripslashes($_REQUEST['siret']));
        $juridique = mysqli_real_escape_string($mysqli, stripslashes($_REQUEST['society']));
        $hebergeur = mysqli_real_escape_string($mysqli, stripslashes($_REQUEST['host']));
        $capital = mysqli_real_escape_string($mysqli, stripslashes($_REQUEST['capital']));

        $checkCompanyExistence = "SELECT Nom_Ent 
                        FROM entreprise 
                        WHERE Nom_Ent = '$nom_entreprise'";

        $result = $mysqli->query($checkCompanyExistence);

        if ($result->num_rows > 0) {
            die("L'entreprise spécifié existe déja.");
        } else {
        // Vérification de la forme de l'adresse
        if (strpos($localisation, ',') === false) {
            die("L'adresse doit être au format correct.");
        }

        // Récupération de la ville à partir de l'adresse
        $ville = explode(',', $localisation)[0];

        // Vérification si la ville existe
        $checkVilleQuery = "SELECT ID_Ville FROM Ville WHERE Nom_Ville = '$ville'";
        $result = $mysqli->query($checkVilleQuery);

        if ($result->num_rows == 0) {
            echo("La ville n'existe pas");
        } else {
            $row = $result->fetch_assoc();
            $id_ville = $row['ID_Ville'];
        }

        // Vérification si l'adresse existe
        $checkAdresseQuery = "SELECT ID_City FROM Localisation WHERE Adresse = '$localisation' AND ID_Ville = '$id_ville'";
        $result = $mysqli->query($checkAdresseQuery);

        if ($result->num_rows == 0) {
            // Si l'adresse n'existe pas, la créer
            $insertAdresseQuery = "INSERT INTO Localisation (Adresse, ID_Ville) VALUES ('$localisation', '$id_ville')";
            $mysqli->query($insertAdresseQuery);
            $id_adresse = $mysqli->insert_id;
        } else {
            $row = $result->fetch_assoc();
            $id_adresse = $row['ID_City'];
        }

        // Ajout de l'entreprise
        $insertEntrepriseQuery = "INSERT INTO Entreprise (Nom_Ent, Type_Ent, Nb_postulant, Evaluation, Description, Numero_SIRET, Forme_Juridique, Capital_Social, Hébergeur, ID_Pilote, ID_City, ID_Admin) 
                                VALUES ('$nom_entreprise', '$secteur', 0, 0, '$description', '$siret', '$juridique', '$capital', '$hebergeur', NULL, '$id_adresse', NULL)";
        if ($mysqli->query($insertEntrepriseQuery) === TRUE) {
            echo "Entreprise ajoutée avec succès.";
        } else {
            echo "Erreur lors de l'ajout de l'entreprise : " . $mysqli->error;
        }
        }
    // Fermer la connexion
    $mysqli->close();
    }
?>