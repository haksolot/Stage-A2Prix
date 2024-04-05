<?php
require_once 'db.php';
require_once 'view/template.php';

function loadPilotOffers()
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
    $total_lignes_sql = "SELECT COUNT(*) AS total FROM stage";
    $stmt = $db->prepare($total_lignes_sql);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $total_lignes = $row['total'];

    // Calcul du nombre total de pages
    $total_pages = ceil($total_lignes / $elements_par_page);

    // Requête SQL avec la pagination
    // $check = "SELECT * FROM stage LIMIT $offset, $elements_par_page";
    $check = "SELECT * FROM stage LIMIT :offset, :elements_par_page";
    $stmt = $db->prepare($check);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindParam(':elements_par_page', $elements_par_page, PDO::PARAM_INT);
    $stmt->execute();

    // Boucle à travers les résultats et affichage avec Smarty
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $id_ent = strval($row['ID_Entreprise']);
        $check = "SELECT Nom_Ent FROM entreprise WHERE ID_Entreprise = :id_ent";
        $la = $db->prepare($check);
        $la->bindParam(':id_ent', $id_ent, PDO::PARAM_INT);
        $la->execute();
        $laa = $la->fetch(PDO::FETCH_ASSOC);

        $requete1 = "SELECT Type_Ent AS sector FROM entreprise WHERE ID_Entreprise = :id_ent";
        $first = $db->prepare($requete1);
        $first->bindParam(':id_ent', $id_ent, PDO::PARAM_INT);
        $first->execute();
        $sector = $first->fetch(PDO::FETCH_ASSOC);
        $sector = $sector["sector"];

        $requete2 = "SELECT e.ID_City AS location, l.Adresse
        FROM entreprise e
        JOIN localisation l ON e.ID_City = l.ID_City
        WHERE e.ID_Entreprise = :id_ent;
        ";
        $second = $db->prepare($requete2);
        $second->bindParam(':id_ent', $id_ent, PDO::PARAM_INT);
        $second->execute();
        $location = $second->fetch(PDO::FETCH_ASSOC);
        $location = $location["Adresse"];

        $requete3 = "SELECT
        e.ID_City AS location,
        l.ID_Ville AS id_ville,
        v.Nom_Ville,
        v.CP
        FROM
        entreprise e
        JOIN localisation l ON e.ID_City = l.ID_City
        JOIN ville v ON l.ID_Ville = v.ID_Ville
        WHERE
        e.ID_Entreprise = :id_ent;
        ";
        $third = $db->prepare($requete3);
        $third->bindParam(':id_ent', $id_ent, PDO::PARAM_INT);
        $third->execute();
        $result = $third->fetch(PDO::FETCH_ASSOC);
        $city = $result["Nom_Ville"];
        $cp = $result["CP"];

        $smarty->assign('id', $row["ID_Stage"]);
        $smarty->assign('company', $laa["Nom_Ent"]);
        $smarty->assign('poste', $row["Titre"]);
        $smarty->assign('adress', $city . " (".$cp.") - " . $location);
        $smarty->assign('sector', $sector);
        $smarty->assign('money', $row["Remuneration"]);
        $smarty->assign('openings', $row["Places"]);
        $smarty->assign('description', $row["description"]);
        $smarty->assign('duration', $row["Duree"]);
        $smarty->display('offer-admin.tpl');
    }

    // Affichage de la pagination
    for ($i = 1; $i <= $total_pages; $i++) {
        echo "<a href='?page=$i'>$i</a> ";
    }
}
