<?php
// $mysqli = new mysqli("localhost", "root", "", "a2prix");

//     // Vérifier la connexion
//     if ($mysqli->connect_error) {
//         die("Erreur de connexion : " . $mysqli->connect_error);
//     }
class Database
{
    private $host = "localhost";
    private $db_name = "a2prix";
    private $username = "root";
    private $password = "";
    public $conn;

    public function connect()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
