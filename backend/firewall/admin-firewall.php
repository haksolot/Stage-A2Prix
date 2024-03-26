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
        header("Location: /pilot-dashboard");
    }
    else if($admin == true) {
        
    }
    else {
        header("Location: /login");
    }
?>