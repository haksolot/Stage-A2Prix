<?php
include './controller/firewall/student-firewall.php';
include './controller/loadOffers.php';
?>
<!DOCTYPE html>
<head>
    <title>Stage-A2Prix</title>
    <link rel="stylesheet" type="text/css" href="view/style/dashboard.css">
    <link rel="stylesheet" type="text/css" href="view/style/offer.css">
    <script src="view/script/offer-interactions.js"></script>
</head>
<body>
    <div id="bar">
        <button id="wishlist"></button>
        <input id="search" placeholder="Rechercer..">
        <input id="sector" placeholder="Secteur">
        <input id="location" placeholder="Localité">
        <input id="center" placeholder="Center">
        <button id="settings"></button>
    </div>
    <div id="scroller">
        <?php
load();
// require_once 'template.php';
// global $smarty;
// $smarty->assign('company', "test");
// $smarty->assign('poste', "chepa");
// $smarty->assign('adress', "11 rue de la bite");
// $smarty->assign('sector', "Tech");
// $smarty->assign('money', 123);
// $smarty->assign('openings', 1);
// $smarty->assign('description', "ghfdjkgh dsfasd fdas fdas fsda fasd fasdfsadfasd");
// $smarty->assign('duration', 7);
// $smarty->display('offer.tpl');
?>
    </div>
</body>