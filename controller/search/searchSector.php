<?php

require_once 'db.php';
require_once 'view/template.php';

function searchSector($a)
{
    $Database = new Database();
    $db = $Database->connect();
    global $smarty;
    
    $query = "SELECT * FROM stage
    INNER JOIN entreprise ON stage.ID_Entreprise = entreprise.ID_Entreprise
    INNER JOIN localisation ON entreprise.ID_City = localisation.ID_City
    INNER JOIN ville ON localisation.ID_Ville = ville.ID_Ville
    WHERE Type_Ent LIKE :truc;";
    $result = $db->prepare($query);
    $terme = "%" . $a . "%";
    $result->bindParam(':truc', $terme, PDO::PARAM_STR);

    $result->execute();

    if ($result->rowCount() > 0) {
        // Affichage des résultats
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $smarty->assign('id', $row["ID_Stage"]);
            $smarty->assign('company', $row["Nom_Ent"]);
            $smarty->assign('poste', $row["Titre"]);
            $smarty->assign('adress', $row["Nom_Ville"] . " (".$row["CP"].") - " . $row["Adresse"]);
            $smarty->assign('sector', $row["Type_Ent"]);
            $smarty->assign('money', $row["Remuneration"]);
            $smarty->assign('openings', $row["Places"]);
            $smarty->assign('description', $row["description"]);
            $smarty->assign('duration', $row["Duree"]);
            $smarty->display('offer.tpl');
        }
    } else {

    }
}
