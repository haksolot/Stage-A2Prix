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

        $smarty->assign('company', $laa["Nom_Ent"]);
        // $smarty->assign('poste', "chepa");
        // $smarty->assign('adress', "11 rue de la bite");
        // $smarty->assign('sector', "Tech");
        // $smarty->assign('money', 123);
        // $smarty->assign('openings', 1);
        // $smarty->assign('description', "ghfdjkgh dsfasd fdas fdas fsda fasd fasdfsadfasd");
        // $smarty->assign('duration', 7);
        // $smarty->display('offer.tpl');
        $smarty->display('offer.tpl');
    }

    // Affichage de la pagination
    for ($i = 1; $i <= $total_pages; $i++) {
        echo "<a href='?page=$i'>$i</a> ";
    }
}
