<?php
require_once 'db.php';
require_once 'view/template.php';

function loadPeople()
{
    $Database = new Database();
    $db = $Database->connect();

    global $smarty;

    $page_actuelle = isset($_GET['page']) ? $_GET['page'] : 1;

    $elements_par_page = 30;

    $offset = ($page_actuelle - 1) * $elements_par_page;

    $check = "SELECT * FROM utilisateur LIMIT :offset, :elements_par_page";
    $stmt = $db->prepare($check);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindParam(':elements_par_page', $elements_par_page, PDO::PARAM_INT);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $nom = null;
        $prenom = null;
        $promo = null;
        $centre = null;
        $role = null;

        $check1 = "SELECT * FROM étudiant WHERE ID_Student = :id_student";
        $result1 = $db->prepare($check1);
        $result1->bindParam(':id_student', $row['ID_User']);
        $result1->execute();

        $check2 = "SELECT * FROM pilote WHERE ID_Pilote = :id_pilot";
        $result2 = $db->prepare($check2);
        $result2->bindParam(':id_pilot', $row['ID_User']);
        $result2->execute();

        if ($result1->rowCount() > 0) {
            $role = "student";
            $studentQuery = "SELECT utilisateur.Nom_user AS nom,
            utilisateur.Prenom_user AS prenom,
            promotion.Nom_Promo AS promo,
            centre.Nom_Centre AS centre
            FROM utilisateur
            INNER JOIN étudiant ON utilisateur.ID_User = étudiant.ID_Student
            INNER JOIN promotion ON étudiant.ID_Promotion = promotion.ID_Promotion
            INNER JOIN centre ON promotion.ID_Formation = centre.Id_Formation
            WHERE ID_User = :userid;
            ";
            $result = $db->prepare($studentQuery);
            $result->bindParam('userid', $row['ID_User']);
            $result->execute();

            $studentData = $result->fetch(PDO::FETCH_ASSOC);

            $nom = $studentData['nom'];
            $prenom = $studentData['prenom'];
            $promo = $studentData['promo'];
            $centre = $studentData['centre'];
            $role = 'student';

            $smarty->assign('id', $row['ID_User']);
            $smarty->assign('name', $nom);
            $smarty->assign('surname', $prenom);
            $smarty->assign('promotion', $promo);
            $smarty->assign('campus', $centre);
            $smarty->display('person.tpl');

        } else if ($result2->rowCount() > 0) {
            $role = "pilot";
            $pilotQuery = "SELECT utilisateur.Nom_user AS nom,
            utilisateur.Prenom_user AS prenom,
            promotion.Nom_Promo AS promo,
            centre.Nom_Centre AS centre
            FROM utilisateur
            INNER JOIN promotion ON utilisateur.ID_User = promotion.ID_Pilote
            INNER JOIN centre ON promotion.ID_Formation = centre.Id_Formation
            WHERE ID_User = :userid;
            ";
            $result = $db->prepare($pilotQuery);
            $result->bindParam('userid', $row['ID_User']);
            $result->execute();

            $pilotData = $result->fetch(PDO::FETCH_ASSOC);

            $nom = $pilotData['nom'];
            $prenom = $pilotData['prenom'];
            $promo = $pilotData['promo'];
            $centre = $pilotData['centre'];
            $role = 'pilot';

            $smarty->assign('id', $row['ID_User']);
            $smarty->assign('name', $nom);
            $smarty->assign('surname', $prenom);
            $smarty->assign('promotion', $promo);
            $smarty->assign('campus', $centre);
            $smarty->display('person.tpl');
        } else {

        }

    }
}
