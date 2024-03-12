<?php
session_start();

// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Maintenant que l'utilisateur est connecté, vous pouvez afficher le contenu de la page d'accueil
?>
<!DOCTYPE html>
<html>
<head>
    <title>Accueil</title>
</head>
<body>

<h2>Bienvenue, <?php echo $_SESSION['username']; ?>!</h2>

<p>C'est la page d'accueil.</p>
<p>Contenu de votre page d'accueil ici.</p>

<p><a href="logout.php">Se déconnecter</a></p>

</body>
</html>
