<?php
require_once 'Pilot.php';

class Offer extends Pilot
{
    public $offer_id, $title, $description, $duration, $money, $openings, $applied, $creation_date, $notation, $company_id;

    public function setOfferId($a)
    {
        $this->offer_id = $a;
    }

    public function getOfferId()
    {
        return $this->offer_id;
    }

    public function setTitle($a)
    {
        $this->title = $a;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setDescription($a)
    {
        $this->description = $a;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDuration($a)
    {
        $this->duration = $a;
    }

    public function getDuration()
    {
        return $this->duration;
    }

    public function setMoney($a)
    {
        $this->money = $a;
    }

    public function getMoney()
    {
        return $this->money;
    }

    public function setOpenings($a)
    {
        $this->openings = $a;
    }

    public function getOpenings()
    {
        return $this->openings;
    }

    public function setApplied($a)
    {
        $this->applied = $a;
    }

    public function getApplied()
    {
        return $this->applied;
    }

    public function setCreationDate($a)
    {
        $this->creation_date = $a;
    }

    public function getCreationDate()
    {
        return $this->creation_date;
    }

    public function setNotation($a)
    {
        $this->notation = $a;
    }

    public function getNotation()
    {
        return $this->notation;
    }

    public function setCompanyId($a)
    {
        $this->company_id = $a;
    }

    public function getCompanyId()
    {
        return $this->company_id;
    }

    public function setOffer($a, $b, $c, $d, $e, $f, $g, $h)
    {
        $this->setTitle($a);
        $this->setDescription($b);
        $this->setDuration($c);
        $this->setMoney($d);
        $this->setOpenings($e);
        $this->setApplied($f);
        $this->setCreationDate($g);
        $this->setNotation($h);
    }

    public function checkCompany()
    {
        $checkCompanyExistence = "SELECT Nom_Ent FROM entreprise WHERE ID_Entreprise = :nom_entreprise";
        $stmt = $this->db->prepare($checkCompanyExistence);
        $stmt->bindParam(':nom_entreprise', $this->company_id, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function createOffer()
    {
        $this->creation_date = date("Y-m-d");
        if ($this->checkCompany() == true) {
            $insertStageQuery = "INSERT INTO Stage (Titre, Duree, Remuneration, Places, Nb_Postulants, Date_Parution, Notation, ID_Entreprise, Description)
                                VALUES (:poste, :duree, :remuneration, :places, 0, :date, 0, :id_entreprise, :description)";
            $stmt = $this->db->prepare($insertStageQuery);
            $stmt->bindParam(':poste', $this->title, PDO::PARAM_STR);
            $stmt->bindParam(':duree', $this->duration, PDO::PARAM_STR);
            $stmt->bindParam(':remuneration', $this->money, PDO::PARAM_STR);
            $stmt->bindParam(':places', $this->openings, PDO::PARAM_INT);
            $stmt->bindParam(':date', $this->creation_date, PDO::PARAM_STR);
            $stmt->bindParam(':id_entreprise', $this->company_id, PDO::PARAM_INT);
            $stmt->bindParam(':description', $this->description, PDO::PARAM_STR);
            $stmt->execute();

            echo "Stage ajouté avec succès.";
        } else {
            echo ("L'entreprise n'existe pas");
        }
    }
}
