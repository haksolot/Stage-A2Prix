<?php
    session_start();
    include('./backend/firewall/check-authorization.php');

    checkLogin($_SESSION);
    $student = checkStudent($_SESSION);
    $pilot = checkPilot($_SESSION);
    $admin = checkAdmin($_SESSION);
    if($student == true) {
        header("Location: /dashboard");
    }
    else if($pilot == true) {

    }
    else if($admin == true) {
        header("Location : /dashboard-admin.php");
    }
    else {
        header("Location: /login");
    }
?>