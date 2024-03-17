<?php
    session_start();
    include('./backend/links.php');
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        header("Location: /login");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Stage-A2Prix</title>
    <?php
    linkResource("stylesheet", "frontend/style/dashboard.css");
    linkResource("stylesheet", "frontend/style/offer.css");
    linkScript("frontend/script/offer-interactions.js");
    linkScript("frontend/script/admin-dashboard-interactions.js");
    ?>
</head>
<body>
    <div id="create-choice">
        <button id="create-student" class="choice">Étudiant</button>
        <button id="create-pilot" class="choice" onclick ="GoToCreatePilot()">Pilote</button>
        <button id="create-offer" class="choice">Offre</button>
    </div>  
    <div id="to-blur">
        <div id="bar">
            <button id="wishlist"></button>
            <input id="search" placeholder="Rechercer..">
            <button id="create-button">Créer</button>
            <button id="settings"></button>
        </div>
        <div id="scroller">
            <link rel="stylesheet" href="/style/offer.css">
            <div class="offer-container">
                <div id="offer-123" class="offer-background closed">
                    <div class="top-part">
                        <div class="offer-left">
                            <div class="offer-title">
                                <h1 class="offer-h1">CESI</h1>
                                <input class="offer-h1-input"></input>
                                <a class="offer-sep"> - </a>
                                <h2 class="offer-h2">Développeur</h2>
                                <input class="offer-h2-input"></input>
                            </div>
                            <p class="offer-address">8 Rue des Frères Charles et Alcclasse d'Orbigny, 6400 Pau</p>
                            <input class="offer-address-input"></input>
                            <div class="offer-star-holder">
                                <button data-rating="1" class="offer-star offer-starF"></button>
                                <button data-rating="2" class="offer-star offer-starF"></button>
                                <button data-rating="3" class="offer-star offer-starF"></button>
                                <button data-rating="4" class="offer-star offer-starE"></button>
                                <button data-rating="5" class="offer-star offer-starE"></button>
                            </div>
                        </div>
                        <div class="offer-line"><div></div></div>
                        <div class="offer-right">
                            <div class="offer-like-container">
                                <button class="offer-like">&nbsp</button>
                            </div>
                            <div>
                                <div class="offer-carac">
                                    <a class="offer-sector">&nbsp</a>
                                    <p class="offer-carac-text">Enseignement</p>
                                    <input class="offer-carac-input"></input>
                                </div>
                                <div class="offer-carac">
                                    <a class="offer-money">&nbsp</a>
                                    <p class="offer-carac-text">652</p>
                                    <input class="offer-carac-input"></input>
                                </div>
                                <div class="offer-carac">
                                    <a class="offer-people">&nbsp</a>
                                    <p class="offer-carac-text">13 ont postulé</p>
                                    <input class="offer-carac-input"></input>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="offer-line-vertical"><div></div></div>
                    <div class="bottom-part">
                        <div class="bottom-left">
                            <p class="offer-description">Rejoignez notre équipe pour un stage en ingénierie informatique. Participez à des projets innovants, développez vos compétences et travaillez avec une équipe passionnée.</p>
                            <input class="offer-description-input"></input>
                        </div>
                        <div class="offer-line"><div></div></div>
                        <div class="bottom-right">
                            <div class="offer-carac">
                                <a class="offer-time">&nbsp</a>
                                <p class="offer-carac-text">15 jours</p>
                                <input class="offer-carac-input"></input>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="actions-container">
                    <button class="edit-button editing-state"></button>
                    <button class="view-button"></button>
                    <button class="delete-button"></button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>