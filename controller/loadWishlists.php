<?php
require './db.php';
require_once 'view/template.php';
function load()
{

    $Database = new Database();
    $db = $Database->connect();

    global $smarty;

    // Nombre d'éléments à afficher par page
    $elements_par_page = 3;

    // Page actuelle
    $page_actuelle = isset($_GET['page']) ? $_GET['page'] : 1;

    // Calcul de l'offset
    $offset = ($page_actuelle - 1) * $elements_par_page;

    // Requête SQL pour compter le nombre total de lignes
    $total_lignes_sql = "SELECT COUNT(*) AS total FROM souhaiter";
    $stmt = $db->prepare($total_lignes_sql);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $total_lignes = $row['total'];

    // Calcul du nombre total de pages
    $total_pages = ceil($total_lignes / $elements_par_page);

    // Requête SQL avec la pagination
    // $check = "SELECT * FROM stage LIMIT $offset, $elements_par_page";
    $check = "SELECT * FROM souhaiter LIMIT :offset, :elements_par_page";
    $stmt = $db->prepare($check);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindParam(':elements_par_page', $elements_par_page, PDO::PARAM_INT);
    $stmt->execute();

    // Boucle à travers les résultats et affichage avec Smarty
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $offerId = strval($row['ID_Stage']);
        
        // Fetch offer title
        $offerTitleQuery = "SELECT Titre FROM Stage WHERE ID_Stage = :offerId";
        $offerTitleStatement = $db->prepare($offerTitleQuery);
        $offerTitleStatement->bindParam(':offerId', $offerId, PDO::PARAM_INT);
        $offerTitleStatement->execute();
        $offerTitleRow = $offerTitleStatement->fetch(PDO::FETCH_ASSOC);
        $offerTitle = $offerTitleRow["Titre"];
    
        // Fetch offer description
        $DescriptionQuery = "SELECT Description FROM Stage WHERE ID_Stage = :offerId";
        $DescriptionStatement = $db->prepare($DescriptionQuery);
        $DescriptionStatement->bindParam(':offerId', $offerId, PDO::PARAM_INT);
        $DescriptionStatement->execute();
        $DescriptionRow = $DescriptionStatement->fetch(PDO::FETCH_ASSOC);
        $Description = $DescriptionRow["Description"];
    
        // Fetch offer location
        $locationQuery = "SELECT e.ID_City AS location, l.Adresse
            FROM entreprise e
            JOIN localisation l ON e.ID_City = l.ID_City
            WHERE s.ID_Stage = :offerId;
        ";
        $locationStatement = $db->prepare($locationQuery);
        $locationStatement->bindParam(':offerId', $offerId, PDO::PARAM_INT);
        $locationStatement->execute();
        $locationRow = $locationStatement->fetch(PDO::FETCH_ASSOC);
        $location = $locationRow["Adresse"];
    
        // Fetch offer city and postal code
        $cityQuery = "SELECT
            e.ID_City AS location,
            l.ID_Ville AS city_id,
            v.Nom_Ville AS city_name,
            v.CP AS postal_code
            FROM
            entreprise e
            JOIN localisation l ON e.ID_City = l.ID_City
            JOIN ville v ON l.ID_Ville = v.ID_Ville
            WHERE
            e.ID_Entreprise = :offerId;
        ";
        $cityStatement = $db->prepare($cityQuery);
        $cityStatement->bindParam(':offerId', $offerId, PDO::PARAM_INT);
        $cityStatement->execute();
        $cityRow = $cityStatement->fetch(PDO::FETCH_ASSOC);
        $cityName = $cityRow["city_name"];
        $postalCode = $cityRow["postal_code"];
    
        // Assign data to Smarty template
        $smarty->assign('company', $offerTitleRow["Nom_Ent"]);
        $smarty->assign('poste', $offerTitle);
        $smarty->assign('adress', $cityName . " (".$postalCode.") - " . $location);
        $smarty->assign('sector', $sector);
        $smarty->assign('money', $row["Remuneration"]);
        $smarty->assign('openings', $row["Places"]);
        $smarty->assign('description', $row["Description"]);
        $smarty->assign('duration', $row["Duree"]);
        $smarty->display('offer.tpl');
    }    

    // Affichage de la pagination
    for ($i = 1; $i <= $total_pages; $i++) {
        echo "<a href='?page=$i'>$i</a> ";
    }
}
