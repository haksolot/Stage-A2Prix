<?php
require_once 'Pilot.php';

class Company extends Pilot
{
    public $company_id, $company_name, $type, $description, $adress, $city_id, $siret, $juridiction, $capital, $host;

    public function setCompanyId($a)
    {
        $this->company_id = $a;
    }

    public function getCompanyId()
    {
        return $this->company_id;
    }

    public function setCompanyName($a)
    {
        $this->company_name = $a;
    }

    public function getCompanyName()
    {
        return $this->company_name;
    }

    public function setType($a)
    {
        $this->type = $a;
    }

    public function getType()
    {
        return $this->type;
    }
    public function setDescription($a)
    {
        $this->description = $a;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setAdress($a)
    {
        $this->adress = $a;
    }

    public function getAdress()
    {
        return $this->adress;
    }

    public function setSiret($a)
    {
        $this->siret = $a;
    }

    public function getSiret()
    {
        return $this->siret;
    }

    public function setJuridiction($a)
    {
        $this->juridiction = $a;
    }

    public function getJuridiction()
    {
        return $this->juridiction;
    }

    public function setCapital($a)
    {
        $this->capital = $a;
    }

    public function getCapitial()
    {
        return $this->capital;
    }

    public function setHost($a)
    {
        $this->host = $a;
    }

    public function getHost()
    {
        return $this->host;
    }

    public function checkName()
    {
        $checkCompanyExistence = "SELECT Nom_Ent FROM entreprise WHERE Nom_Ent = :nom_entreprise";
        $stmt = $this->db->prepare($checkCompanyExistence);
        $stmt->bindParam(':nom_entreprise', $this->company_name, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function checkCity()
    {
        if (strpos($this->adress, ',') === false) {
            echo("L'adresse doit être au format correct.");
            return false;
        }

        // Récupération de la ville à partir de l'adresse
        $city = explode(',', $this->adress)[0];

        // Vérification si la ville existe
        $checkVilleQuery = "SELECT ID_Ville FROM Ville WHERE Nom_Ville = :ville";
        $stmt = $db->prepare($checkVilleQuery);
        $stmt->bindParam(':ville', $this->city, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() == 0) {
            return false;
        } else {
            return true;
        }
    }

    public function createCompany(){
        if(checkName() == true && checkCity() == true){
            
        }
    }
}
