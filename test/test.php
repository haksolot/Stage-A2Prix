<?php

require '../db.php';

$Database = new Database();
$db = $Database->connect();

$query = "SELECT * FROM ville WHERE Nom_Ville LIKE :truc;";
$result = $db->prepare($query);
$terme = "%" . "Ar" . "%";
$result->bindParam(':truc', $terme, PDO::PARAM_STR);

$result->execute();

if($result->rowCount() > 0) {
    // Affichage des résultats
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        print_r($row);
    }
} else {
    echo "0 résultats";
}