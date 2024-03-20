<?php
session_start();
require './backend/database/db.php';

$database = new Database();
$db = $database->connect();

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = null;
    $id = null;

    $query = "SELECT * FROM Utilisateur WHERE Login=:username and Password=:password";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':password', hash('sha512', $password), PDO::PARAM_STR);
    $stmt->execute();
    $rows = $stmt->rowCount();

    if ($rows == 1) {
        $_SESSION['logged_in'] = true;

        $checkLoginExistence = "SELECT ID_User FROM utilisateur WHERE Login = :username";
        $stmt = $db->prepare($checkLoginExistence);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $id = $row['ID_User'];

            $checkPilot = "SELECT ID_Pilote FROM pilote WHERE ID_Pilote = :id";
            $stmt = $db->prepare($checkPilot);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $role = "pilot";
            }

            $checkStudent = "SELECT ID_Student FROM étudiant WHERE ID_Student = :id";
            $stmt = $db->prepare($checkStudent);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $role = "student";
            }
        } else {
            echo ('Utilisateur n\'existe pas');
        }

        if ($role) {
            $_SESSION['role'] = $role;
            $_SESSION['id'] = $id;
            if ($role == 'student') {
                header("Location: /dashboard");
            } elseif ($role == 'pilot') {
                header("Location: /pilot-dashboard");
            }
        } else {
            echo ("L'utilisateur n'a pas de role");
        }
    } else {
        echo ("Le nom d'utilisateur ou le mot de passe est incorrect.");
    }
}
