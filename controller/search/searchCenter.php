<?php

require_once 'db.php';
require_once 'view/template.php';

function searchCenter($a)
{
    $Database = new Database();
    $db = $Database->connect();
    global $smarty;

    $studentQuery = "SELECT utilisateur.ID_User,
            utilisateur.Nom_user AS nom,
            utilisateur.Prenom_user AS prenom,
            promotion.Nom_Promo AS promo,
            centre.Nom_Centre AS centre
            FROM utilisateur
            INNER JOIN étudiant ON utilisateur.ID_User = étudiant.ID_Student
            INNER JOIN promotion ON étudiant.ID_Promotion = promotion.ID_Promotion
            INNER JOIN centre ON promotion.ID_Formation = centre.Id_Formation
            WHERE Nom_Centre LIKE :truc;
            ";
    $result = $db->prepare($studentQuery);
    $terme = "%" . $a . "%";
    $result->bindParam(':truc', $terme, PDO::PARAM_STR);
    $result->execute();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $smarty->assign('id', $row['ID_User']);
        $smarty->assign('name', $row['nom']);
        $smarty->assign('surname', $row['prenom']);
        $smarty->assign('promotion', $row['promo']);
        $smarty->assign('campus', $row['centre']);
        $smarty->display('person.tpl');
    }
}
