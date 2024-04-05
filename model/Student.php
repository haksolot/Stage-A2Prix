<?php
require_once 'User.php';

class Student extends User
{
    public $year, $id, $pilote, $admin, $promotion, $center, $formation, $center_id, $promotion_id;

    public function setYear($a)
    {
        $this->year = $a;
    }

    public function setId($i)
    {
        $this->id = $i;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setPilote($a)
    {
        $this->pilote = $a;
    }

    public function getPilote()
    {
        return $this->pilote;
    }

    public function setAdmin($a)
    {
        $this->admin = $a;
    }

    public function getAdmin()
    {
        return $this->admin;
    }

    public function setPromotion($a)
    {
        $this->promotion = $a;
    }

    public function getPromotion()
    {
        return $this->promotion;
    }

    public function setCenter($a)
    {
        $this->center = $a;
    }

    public function getCenter()
    {
        return $this->center;
    }

    public function getCenterId()
    {
        return $this->center_id;
    }

    public function checkYear()
    {
        if (is_int($this->year) && $this->year >= 1000 && $this->year <= 9999) {
            return true;
        } else {
            return false;
        }
    }

    public function checkCenter()
    {
        $checkCenterQuery = "SELECT ID_Formation FROM Centre WHERE Nom_Centre = :center";
        $stmt = $this->db->prepare($checkCenterQuery);
        $stmt->bindParam(':center', $this->center, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $this->center_id = $row['ID_Formation'];
            } else {
                echo ("Le centre de formation n'a pas put être ajouté");
            }
            return true;
        } else {
            return false;
        }
    }

    public function checkPromotion()
    {
        $checkPromotionQuery = "SELECT ID_Promotion FROM Promotion WHERE Nom_Promo = :promotion";
        $stmt = $this->db->prepare($checkPromotionQuery);
        $stmt->bindParam(':promotion', $this->promotion, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($stmt->rowCount() > 0) {
            $this->promotion_id = $result['ID_Promotion'];
            return true;
        } else {
            return false;
        }
    }

    public function createPromotion()
    {
        $insertPromotionQuery = "INSERT INTO Promotion (Nom_Promo, ID_Pilote, ID_Formation) VALUES (:promotion, :pilote, :id_centre)";
        $stmt = $this->db->prepare($insertPromotionQuery);
        $stmt->bindParam(':promotion', $this->promotion, PDO::PARAM_STR);
        $stmt->bindParam(':pilote', $this->pilote, PDO::PARAM_STR);
        $stmt->bindParam(':id_centre', $this->center_id, PDO::PARAM_INT);
        $stmt->execute();

        $this->promotion_id = $this->db->lastInsertId();

    }

    public function createStudent()
    {
        if ($this->checkCenter() == true && $this->checkYear() == true) {
            if ($this->checkPromotion() == false) {
                $this->createPromotion();
            }
            $this->createUser();
            $insertStudentQuery = "INSERT INTO Étudiant (ID_Student, Annee_Formation, ID_Pilote, ID_Admin, ID_Promotion) VALUES (:id_utilisateur, :annee, :pilote, :admin_id, :id_promotion)";
            $stmt = $this->db->prepare($insertStudentQuery);
            $stmt->bindParam(':id_utilisateur', $this->id, PDO::PARAM_INT);
            $stmt->bindParam(':annee', $this->year, PDO::PARAM_INT);
            $stmt->bindParam(':pilote', $this->pilote, PDO::PARAM_INT);
            $stmt->bindParam(':admin_id', $this->admin, PDO::PARAM_INT);
            $stmt->bindParam(':id_promotion', $this->promotion_id, PDO::PARAM_INT);
            $stmt->execute();
        }

        if ($this->checkCenter() == false) {
            echo ("Le centre spécifié n'existe pas");
        }

        if ($this->checkYear() == false) {
            echo ("L'année spécifié n'est pas valide");
        }
    }

    public function deleteStudent($idToDelete)
    {

        $deleteStudentQuery = "DELETE FROM Étudiant WHERE ID_Student = :id_utilisateur";
        $stmt = $this->db->prepare($deleteStudentQuery);
        $stmt->bindParam(':id_utilisateur', $idToDelete, PDO::PARAM_INT);
        $stmt->execute();

        $deleteUserQuery = "DELETE FROM Utilisateur WHERE ID_User = :id_utilisateur";
        $stmt = $this->db->prepare($deleteUserQuery);
        $stmt->bindParam(':id_utilisateur', $idToDelete, PDO::PARAM_INT);
        $stmt->execute();

        try {
            $deleteEvaluationQuery = "DELETE FROM EVE WHERE ID_Student = :id_utilisateur";
            $stmt = $this->db->prepare($deleteEvaluationQuery);
            $stmt->bindParam(':id_utilisateur', $idToDelete, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {

        }
        
        
        

        try{
            $deleteCandidaterQuery = "DELETE FROM Candidater WHERE ID_Student = :id_utilisateur";
            $stmt = $this->db->prepare($deleteCandidaterQuery);
            $stmt->bindParam(':id_utilisateur', $idToDelete, PDO::PARAM_INT);
            $stmt->execute();
        }catch (PDOException $e) {

        }
        
        
        try{
            $deleteSouhaiterQuery = "DELETE FROM Souhaiter WHERE ID_Student = :id_utilisateur";
            $stmt = $this->db->prepare($deleteSouhaiterQuery);
            $stmt->bindParam(':id_utilisateur', $idToDelete, PDO::PARAM_INT);
            $stmt->execute();
        }catch (PDOException $e) {

        }
       
        header("Location: ../dashboard");
    }

    public function checkSameLine(){

        $checkSameLineQuery = "SELECT p.ID_Promotion 
        FROM promotion p 
        JOIN centre c ON p.ID_Formation = c.ID_Formation 
        WHERE c.Nom_Centre = :center 
        AND p.Nom_Promo = :promotion;"
        ;

        $stmt = $this->db->prepare($checkSameLineQuery);
        $stmt->bindParam(':promotion', $this->promotion, PDO::PARAM_STR);
        $stmt->bindParam(':center', $this->center, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() > 0) {
            $this->promotion_id = $result['ID_Promotion'];
            return true;
        } else {
            return false;
        }

    }

    public function checkIdExist($CurrentId){
        $checkLoginExistence = "SELECT * FROM étudiant WHERE ID_Student = :id;";
        $stmt = $this->db->prepare($checkLoginExistence);
        $stmt->bindParam(':id', $CurrentId, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }

    }

    public function checkCenterAndPromoExist(){

        $insertUserQuery = "SELECT promotion.Nom_Promo, centre.Nom_Centre
        FROM promotion
        INNER JOIN centre ON promotion.ID_Formation = centre.ID_Formation
        WHERE promotion.Nom_Promo = :promo AND centre.Nom_Centre = :center ;
        ";

        $stmt = $this->db->prepare($insertUserQuery);

        $stmt->bindParam(':promo', $this->promotion, PDO::PARAM_STR);
        $stmt->bindParam(':center', $this->center, PDO::PARAM_STR);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
            echo "promo exist";
        } else {
            return false;
            echo "promo sont exist";
        }

    }


    public function updateStudent($modifId){
            if ($this->checkCenterAndPromoExist() == true){
            echo'abie';
                $insertUserQuery = "UPDATE utilisateur
                SET Nom_user = :nName, Prenom_user = :nSurname
                WHERE ID_User = :userId;
                
                UPDATE étudiant
                SET ID_Promotion = (
                    SELECT ID_Promotion
                    FROM promotion
                    WHERE Nom_Promo = :promo
                )
                WHERE ID_Student = :userId;
                ";
    
                $stmt = $this->db->prepare($insertUserQuery);
                $stmt->bindParam(':nName', $this->name, PDO::PARAM_STR);
                $stmt->bindParam(':nSurname', $this->surname, PDO::PARAM_STR);
                $stmt->bindParam(':promo', $this->promotion, PDO::PARAM_STR);
                $stmt->bindParam(':userId', $modifId, PDO::PARAM_STR);
                $stmt->execute();
                header("Location: ../dashboard");
            }

    }

    public function getUserNameByIndex($index){
        $insertUserQuery = "SELECT u.Nom_user, u.Prenom_user
        FROM utilisateur u
        INNER JOIN étudiant e ON u.ID_User = e.ID_Student";
        $stmt = $this->db->prepare($insertUserQuery);
        $stmt->execute();
    
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        if (!empty($results) && isset($results[$index - 1])) {
            $user = $results[$index - 1];
            return $user['Prenom_user'] . " " . $user['Nom_user'];
        } else {
            return "Aucun résultat trouvé pour cet index.";
        }
    }

    public function studentNumber(){
        $insertUserQuery = "
            SELECT COUNT(*) AS Nombre_de_resultats
            FROM utilisateur u
            INNER JOIN étudiant e ON u.ID_User = e.ID_Student
        ";
    
        $stmt = $this->db->prepare($insertUserQuery);
        $stmt->execute();
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $result['Nombre_de_resultats'];
    }

    public function findUserId($nameToTrim) {
        $insertUserQuery = "
        SELECT ID_User
        FROM utilisateur
        WHERE CONCAT(Prenom_user, ' ', Nom_user) = TRIM(:name);
        ";
    
        $stmt = $this->db->prepare($insertUserQuery);
        $stmt->bindParam(':name', $nameToTrim, PDO::PARAM_STR);
        $stmt->execute();
    
        $userId = $stmt->fetchColumn();
    
        $userId = (string) $userId;

        return $userId;
    }
    
    
    
    
    
    

}
