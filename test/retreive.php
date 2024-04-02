<?php
require_once 'template.php';
$mysqli = new mysqli("localhost", "root", "", "a2prix");

// Vérifier la connexion
if ($mysqli->connect_error) {
    die("Erreur de connexion : " . $mysqli->connect_error);
}

function load() {
    global $mysqli;
    global $smarty;

    // Nombre d'éléments à afficher par page
    $elements_par_page = 3;

    // Page actuelle
    $page_actuelle = isset($_GET['page']) ? $_GET['page'] : 1;

    // Calcul de l'offset
    $offset = ($page_actuelle - 1) * $elements_par_page;

    // Requête SQL pour compter le nombre total de lignes
    $total_lignes_sql = "SELECT COUNT(*) AS total FROM stage";
    $result_total = $mysqli->query($total_lignes_sql);
    $row_total = $result_total->fetch_assoc();
    $total_lignes = $row_total['total'];

    // Calcul du nombre total de pages
    $total_pages = ceil($total_lignes / $elements_par_page);

    // Requête SQL avec la pagination
    $check = "SELECT * FROM stage LIMIT $offset, $elements_par_page";
    $result = $mysqli->query($check);

    // Boucle à travers les résultats et affichage avec Smarty
    while ($row = $result->fetch_assoc()) {
        $id_ent = strval($row['ID_Entreprise']);
        $check = "SELECT Nom_Ent FROM entreprise WHERE ID_Entreprise = '$id_ent'";
        $la = $mysqli->query($check);
        $laa = $la->fetch_assoc();

        // $smarty->assign('heading', strval($row["Titre"]));
        $smarty->assign('heading', strval($laa["Nom_Ent"]));
        $smarty->assign('c ontent', 'La rémunération est de: ' . strval($row["Remuneration"]) . '!');
        $smarty->display('index.tpl'); // Affiche le template
    }

    // Affichage de la pagination
    for ($i = 1; $i <= $total_pages; $i++) {
        echo "<a href='?page=$i'>$i</a> ";
    }
}
load();

if (isset($_POST['lancerFonction'])) {
    load();
}
?>

<!DOCTYPE html>
<head>
    <title>Stage-A2Prix</title>
</head>
<body>
    <div id="bar">
        <h2>Titre</h2>
    </div>
    <div id="scroller">
        <form action="" method="post">
            <button type="submit" name="lancerFonction">Load more</button>
        </form>
    </div>
</body>
