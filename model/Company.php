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

    public function setCompany($a, $b, $c, $d, $e, $f, $g, $h)
    {
        $this->setCompanyName($a);
        $this->setType($b);
        $this->setDescription($c);
        $this->setAdress($d);
        $this->setSiret($e);
        $this->setJuridiction($f);
        $this->setCapital($g);
        $this->setHost($h);
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
            echo ("L'adresse doit être au format correct.");
            return false;
        }

        // Récupération de la ville à partir de l'adresse
        $city = explode(',', $this->adress)[0];

        // Vérification si la ville existe
        $checkVilleQuery = "SELECT ID_Ville FROM Ville WHERE Nom_Ville = :ville";
        $stmt = $this->db->prepare($checkVilleQuery);
        $stmt->bindParam(':ville', $city, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($stmt->rowCount() == 0) {
            return false;
        } else {
            $this->city_id = $result['ID_Ville'];
            return true;
        }
    }

    public function createAdress()
    {
        $Adress = explode(',', $this->adress)[1];

        $insertAdresseQuery = "INSERT INTO Localisation (Adresse, ID_Ville) VALUES (:localisation, :id_ville)";
        $stmt = $this->db->prepare($insertAdresseQuery);
        $stmt->bindParam(':localisation', $Adress, PDO::PARAM_STR);
        $stmt->bindParam(':id_ville', $this->city_id, PDO::PARAM_INT);
        $stmt->execute();
        // $id_adresse = $db->lastInsertId();
    }

    public function checkAdress()
    {
        if (strpos($this->adress, ',') === false) {
            echo ("L'adresse doit être au format correct.");
            return false;
        }

        $Adress = explode(',', $this->adress)[1];

        $checkAdresseQuery = "SELECT ID_City FROM Localisation WHERE Adresse = :localisation AND ID_Ville = :id_ville";
        $stmt = $this->db->prepare($checkAdresseQuery);
        $stmt->bindParam(':localisation', $Adresse, PDO::PARAM_STR);
        $stmt->bindParam(':id_ville', $this->city_id, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($stmt->rowCount() == 0) {
            return false;
        } else {
            return true;
        }

    }

    public function createCompany()
    {
        if ($this->checkName() == false && $this->checkCity() == true) {
            if ($this->checkAdress() == false) {
                $this->createAdress();
            }
            $insertEntrepriseQuery = "INSERT INTO Entreprise (Nom_Ent, Type_Ent, Nb_postulant, Evaluation, Description, Numero_SIRET, Forme_Juridique, Capital_Social, Hébergeur, ID_Pilote, ID_City, ID_Admin)
                                        VALUES (:nom_entreprise, :secteur, 0, 0, :description, :siret, :juridique, :capital, :hebergeur, 2, :id_city, 3)";

            // $insertEntrepriseQuery = "INSERT INTO Entreprise (Nom_Ent, Type_Ent, Nb_postulant, Evaluation, Description, Numero_SIRET, Forme_Juridique, Capital_Social, Hébergeur, ID_Pilote, ID_City, ID_Admin)
            //                             VALUES (:nom_entreprise, :secteur, 0, 0, :description, :siret, :juridique, :capital, :hebergeur, :pilot, :id_adresse, :admin)";

            $stmt = $this->db->prepare($insertEntrepriseQuery);
            $stmt->bindParam(':nom_entreprise', $this->company_name, PDO::PARAM_STR);
            $stmt->bindParam(':secteur', $this->type, PDO::PARAM_STR);
            $stmt->bindParam(':description', $this->description, PDO::PARAM_STR);
            $stmt->bindParam(':siret', $this->siret, PDO::PARAM_STR);
            $stmt->bindParam(':juridique', $this->juridiction, PDO::PARAM_STR);
            $stmt->bindParam(':capital', $this->capital, PDO::PARAM_STR);
            $stmt->bindParam(':hebergeur', $this->host, PDO::PARAM_STR);
            $stmt->bindParam(':id_city', $this->city_id, PDO::PARAM_STR);

            // $stmt->bindParam(':pilot', idpilot, PDO::PARAM_STR);
            // $stmt->bindParam(':admin', idadmin, PDO::PARAM_STR);

            // $stmt->bindParam(':id_adresse', $id_adresse, PDO::PARAM_INT);
            $stmt->execute();

            echo "Entreprise ajoutée avec succès.";
        } else if ($this->checkName() == true) {
            echo ("L'entreprise existe déjà");
        }
    }
}
