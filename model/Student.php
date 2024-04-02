<?php
require_once 'User.php';

class Student extends User
{
    public $year, $pilote, $admin, $promotion, $center, $formation, $center_id, $promotion_id;

    public function setYear($a)
    {
        $this->year = $a;
    }

    public function getYear()
    {
        return $this->year;
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

    public function deleteStudent()
    {
        // Supprimer l'étudiant de la table Étudiant
        $deleteStudentQuery = "DELETE FROM Étudiant WHERE ID_Student = :id_utilisateur";
        $stmt = $this->db->prepare($deleteStudentQuery);
        $stmt->bindParam(':id_utilisateur', $this->id, PDO::PARAM_INT);
        $stmt->execute();

        // Puis de User correspondant à l'étudiant
        $deleteUserQuery = "DELETE FROM Utilisateur WHERE ID_User = :id_utilisateur";
        $stmt = $this->db->prepare($deleteUserQuery);
        $stmt->bindParam(':id_utilisateur', $this->id, PDO::PARAM_INT);
        $stmt->execute();

        // Ensuite, suppression des tables dépandantes del'étudiant
        $deleteEvaluationQuery = "DELETE FROM EVE WHERE ID_Student = :id_utilisateur";
        $stmt = $this->db->prepare($deleteEvaluationQuery);
        $stmt->bindParam(':id_utilisateur', $this->id, PDO::PARAM_INT);
        $stmt->execute();

        $deleteCandidaterQuery = "DELETE FROM Candidater WHERE ID_Student = :id_utilisateur";
        $stmt = $this->db->prepare($deleteCandidaterQuery);
        $stmt->bindParam(':id_utilisateur', $this->id, PDO::PARAM_INT);
        $stmt->execute();

        $deleteSouahiterQuery = "DELETE FROM Souhaiter WHERE ID_Student = :id_utilisateur";
        $stmt = $this->db->prepare($deleteSouhaiterQuery);
        $stmt->bindParam(':id_utilisateur', $this->id, PDO::PARAM_INT);
        $stmt->execute();

        // Vérifier si la suppression a réussi
        if ($stmt->rowCount() > 0) {
            return true; // L'étudiant a été supprimé avec succès
        } else {
            return false; // Échec de la suppression de l'étudiant
        }
    }
}
