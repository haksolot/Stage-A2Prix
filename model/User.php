<?php

require './db.php';

class User
{
    protected $Database;
    protected $db;

    public function __construct()
    {
        $this->Database = new Database();
        $this->db = $this->Database->connect();
    }

    public $name, $surname, $login, $id, $role;
    private $password;

    public function setName($sName)
    {
        $this->name = $sName;
    }

    public function setSurname($sSurname)
    {
        $this->surname = $sSurname;
    }

    public function setLogin($sLogin)
    {
        $this->login = $sLogin;
    }

    public function setId($sId)
    {
        $this->id = $sId;
    }

    public function setPassword($sPassword)
    {
        $this->password = $sPassword;
    }

    public function setRole($sRole)
    {
        $this->role = $sRole;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRole()
    {
        return $this->role;
    }


    public function setUser($name, $surname, $login, $id, $password)
    {
        setName($name);
        setSurname($surname);
        setLogin($login);
        setId($id);
        setPassword($password);
    }

    public function getUser()
    {
        return array($this->name, $this->surname, $this->login, $this->id, $this->password);
    }

    public function checkLogin()
    {
        $checkLoginExistence = "SELECT Login FROM utilisateur WHERE Login = :username";
        $stmt = $this->db->prepare($checkLoginExistence);
        $stmt->bindParam(':username', $this->login, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            die("Utilisateur spécifié existe déjà.");
            return true;
        } else {
            return false;
        }
    }

    public function createUser()
    {
        if ($this->checkLogin() == false) {
            $this->password = hash('sha512', $this->password);
            $insertUserQuery = "INSERT INTO Utilisateur (Nom_user, Prenom_user, Password, Login) VALUES (:name, :surname, :password, :username)";
            $stmt = $this->db->prepare($insertUserQuery);
            $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
            $stmt->bindParam(':surname', $this->surname, PDO::PARAM_STR);
            $stmt->bindParam(':password', $this->password, PDO::PARAM_STR);
            $stmt->bindParam(':username', $this->login, PDO::PARAM_STR);
            $stmt->execute();

            echo "Utilisateur ajouté avec succès";

            // Récupération de l'ID de l'utilisateur ajouté
            $checkLoginExistence = "SELECT ID_User FROM utilisateur WHERE Login = :username";
            $stmt = $this->db->prepare($checkLoginExistence);
            $stmt->bindParam(':username', $this->login, PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $this->id = $row['ID_User'];
            }
        } else {
            echo ("L'utilisateur n'a pas put être crée");
        }
    }


}
