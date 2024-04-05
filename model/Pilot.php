<?php
require_once 'User.php';

class Pilot extends User
{
    public $admin, $promotion, $center, $formation, $center_id, $promotion_id, $company;

    public function setCompany($a){
        $this->company = $a;
    }

    public function getCompany(){
        return $this->company;
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
        $stmt->bindParam(':pilote', $this->id, PDO::PARAM_STR);
        $stmt->bindParam(':id_centre', $this->center_id, PDO::PARAM_INT);
        $stmt->execute();

        $this->promotion_id = $this->db->lastInsertId();

    }

    public function createPilot()
    {
        if ($this->checkCenter() == true) {
            if ($this->checkPromotion() == false) {
                $this->createPromotion();
            }
            $this->createUser();
            $insertPiloteQuery = "INSERT INTO Pilote (ID_Pilote, ID_Admin) VALUES (:id_utilisateur, :id_admin)";
            $stmt = $this->db->prepare($insertPiloteQuery);
            $stmt->bindParam(':id_utilisateur', $this->id, PDO::PARAM_INT);
            $stmt->bindParam(':id_admin', $this->admin, PDO::PARAM_INT);
            $stmt->execute();

            echo "Pilote ajouté avec succès. ";
        }

        if ($this->checkCenter() == false) {
            echo ("Le centre spécifié n'existe pas");
        }
    }

    public function deletePilot()
    {
        // Supprimer pilote de la table pilote
        try{
        $deletePilotQuery = "DELETE FROM Pilote WHERE ID_Pilote = :id_utilisateur";
        $stmt = $this->db->prepare($deletePiloteQuery);
        $stmt->bindParam(':id_utilisateur', $this->id, PDO::PARAM_INT);
        $stmt->execute();
        } catch (PDOException $e) {}

        // Puis de Utilisateur correspondant au Pilote
        try{
        $deleteUserQuery = "DELETE FROM Utilisateur WHERE ID_User = :id_utilisateur";
        $stmt = $this->db->prepare($deleteUserQuery);
        $stmt->bindParam(':id_utilisateur', $this->id, PDO::PARAM_INT);
        $stmt->execute();
        } catch (PDOException $e) {}

        // Ensuite, suppression des tables dépandantes du pilote
        try{
        $deleteEvaluationQuery = "DELETE FROM EVP WHERE ID_Pilote = :id_utilisateur";
        $stmt = $this->db->prepare($deleteEvaluationQuery);
        $stmt->bindParam(':id_utilisateur', $this->id, PDO::PARAM_INT);
        $stmt->execute();
        } catch (PDOException $e) {}

        try{
        $deletePromotionQuery = "DELETE FROM Promotion WHERE ID_Pilote = :id_utilisateur";
        $stmt = $this->db->prepare($deleteEvaluationQuery);
        $stmt->bindParam(':id_utilisateur', $this->id, PDO::PARAM_INT);
        $stmt->execute();
        }
        catch (PDOException $e) {}

        //Puis on supprime là ou l'ID_Pilote est utilisée (entreprise et étudiant)
        try{
        $updateEntrepriseQuery = "UPDATE Entreprise SET ID_Admin = :id_admin, ID_Pilote = NULL WHERE ID_Pilote = :id_utilisateur";
        $stmt = $this->db->prepare($deleteEvaluationQuery);
        $stmt->bindParam(':id_admin', $this->admin, PDO::PARAM_INT);
        $stmt->bindParam(':id_utilisateur', $this->id, PDO::PARAM_INT);
        $stmt->execute();
        } catch (PDOException $e) {}

        try{
        $updateStudentQuery = "UPDATE Étudiant SET ID_Admin = :id_admin, ID_Pilote = NULL WHERE ID_Pilote = :id_utilisateur";
        $stmt = $this->db->prepare($deleteEvaluationQuery);
        $stmt->bindParam(':id_admin', $this->admin, PDO::PARAM_INT);
        $stmt->bindParam(':id_utilisateur', $this->id, PDO::PARAM_INT);
        $stmt->execute();
        } catch (PDOException $e) {}

        // Vérifier si la suppression a réussi
        if ($stmt->rowCount() > 0) {
            return true; // L'étudiant a été supprimé avec succès
        } else {
            return false; // Échec de la suppression de l'étudiant
        }
    }

    function updatePilote($currentId){
        echo $this->name.$this->surname;
        $insertUserQuery = "UPDATE utilisateur
        SET Nom_user = :nName , Prenom_user = :nSurname
        WHERE ID_User = :currentId;
        
        ";

        $stmt = $this->db->prepare($insertUserQuery);
        $stmt->bindParam(':nName', $this->name, PDO::PARAM_STR);
        $stmt->bindParam(':nSurname', $this->surname, PDO::PARAM_STR);
        $stmt->bindParam(':currentId', $currentId, PDO::PARAM_STR);
        $stmt->execute();
        header("Location: ../pilot-dashboard");
    }
    

}
