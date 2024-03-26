<?php
    session_start();
    include('./backend/firewall/check-authorization.php');

    checkLogin($_SESSION);
    $student = checkStudent($_SESSION);
    $pilot = checkPilot($_SESSION);
    if($student == true) {

    }
    else if($pilot == true) {
        header("Location: /pilot-dashboard");
    }
    else if($admin == true) {
        header("Location : /dashboard-admin.php");
    }
    else {
        header("Location: /login");
    }
?>