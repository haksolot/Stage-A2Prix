<?php
// Récupère l'URL de la requête
$request_uri = $_SERVER['REQUEST_URI'];

// Gère les routes
switch ($request_uri) {
    case '/':
        // Route pour la page d'accueil
        include 'view/auth.php';
        break;
    case '/login':
        // Route pour la page de connexion
        include 'view/auth.php';
        break;
    case '/logout':
        // Route pour la page de déconnexion
        include 'controller/logout.php';
        break;
    case '/dashboard':
        // Route pour la page de connexion
        include 'view/dashboard.php';
        break;
    case '/admin-dashboard':
        // Route pour la page de connexion
        include 'view/dashboard-admin.php';
        break;
    case '/pilot-dashboard':
        // Route pour la page de connexion
        include 'view/dashboard-pilote.php';
        break;
    case '/create/student':
        // Route pour la page de connexion
        include 'view/account-create-student.php';
        break;
    case '/create/pilot':
        // Route pour la page de connexion
        include 'view/account-create-pilote.php';
        break;
    case '/create/company':
        // Route pour la page de connexion
        include 'view/company-creation.php';
        break;
    case '/edit/company':
        // Route pour la page de connexion
        include 'view/company-edit.php';
        break;
    case '/apply/offer':
        // Route pour la page de connexion
        include 'view/apply.php';
        break;
    case '/create/offer':
        // Route pour la page de connexion
        include 'view/offer-creation.php';
        break;
    case '/edit/student':
        // Route pour la page de connexion
        include 'view/update-student.php';
        break;
    // Ajoute d'autres routes au besoin
    default:
        // Route par défaut (404)
        http_response_code(404);
        include 'view/auth.php';
        break;
}
?>
