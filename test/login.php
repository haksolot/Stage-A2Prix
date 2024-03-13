<?php
session_start();
// Vérification des données de connexion
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vérifiez ici si les informations de connexion sont correctes
    // Par exemple, vous pouvez vérifier avec une base de données ou des données enregistrées
    // Ceci est juste un exemple de vérification basique

    if ($username === "utilisateur" && $password === "motdepasse") {
        // Authentification réussie
        $_SESSION['username'] = $username;
        header("Location: accueil.php"); // Rediriger vers la page d'accueil après la connexion réussie
        exit;
    } else {
        // Identifiants incorrects
        echo "Identifiants incorrects. Veuillez réessayer.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Page de connexion</title>
</head>

<body>

    <h2>Connexion</h2>

    <form method="post" action="login.php">
        <div>
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div>
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Se connecter</button>
    </form>

</body>

</html>