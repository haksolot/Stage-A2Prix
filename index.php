<?php
// Récupère l'URL de la requête
$request_uri = $_SERVER['REQUEST_URI'];

// Gère les routes
switch ($request_uri) {
    case '/':
        // Route pour la page d'accueil
        include 'frontend/auth.php';
        break;
    case '/login':
        // Route pour la page de connexion
        include 'frontend/auth.php';
        break;
    case '/dashboard':
        // Route pour la page de connexion
        include 'frontend/dashboard.php';
        break;
    case '/admin-dashboard':
        // Route pour la page de connexion
        include 'frontend/dashboard-admin.php';
        break;
    case '/create/student':
        // Route pour la page de connexion
        include 'frontend/account-create-student.php';
        break;
    case '/create/pilot':
        // Route pour la page de connexion
        include 'frontend/account-create-pilote.php';
        break;
    case '/create/company':
        // Route pour la page de connexion
        include 'frontend/company-creation.php';
        break;
    case '/edit/company':
        // Route pour la page de connexion
        include 'frontend/company-edit.php';
        break;
    case '/apply/offer':
        // Route pour la page de connexion
        include 'frontend/apply.php';
        break;
    case '/create/offer':
        // Route pour la page de connexion
        include 'frontend/offer-creation.php';
        break;
    // Ajoute d'autres routes au besoin
    default:
        // Route par défaut (404)
        http_response_code(404);
        include 'frontend/auth.php';
        break;
}
?>
