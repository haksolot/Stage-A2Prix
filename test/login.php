<?php
    // Connexion à la base de données
    $mysqli = new mysqli("localhost", "root", "", "a2prix");

    // Vérifier la connexion
    if ($mysqli->connect_error) {
        die("Erreur de connexion : " . $mysqli->connect_error);
    }

    // Exécuter une requête SQL
    $query = "SELECT Login FROM utilisateur WHERE Login LIKE 'jfikdlsa'";
    $result = $mysqli->query($query);

    // Vérifier si la requête a réussi
    if ($result) {
        // Parcourir les résultats
        while ($row = $result->fetch_assoc()) {
            // Utiliser les données
            echo $row['Login'] . "<br>";
            echo(type($row['Login']));
        }
        
        // Libérer le résultat
        $result->free();
    } else {
        echo "Erreur lors de l'exécution de la requête : " . $mysqli->error;
    }

    // Fermer la connexion
    $mysqli->close();

?>
