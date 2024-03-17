<?php
    $mysqli = new mysqli("localhost", "root", "", "a2prix");

        // Vérifier la connexion
        if ($mysqli->connect_error) {
            die("Erreur de connexion : " . $mysqli->connect_error);
        }
?>