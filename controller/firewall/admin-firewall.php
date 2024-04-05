<?php
    session_start();
    include('./controller/firewall/check-authorization.php');

    checkLogin($_SESSION);
    $student = checkStudent($_SESSION);
    $pilot = checkPilot($_SESSION);
    $admin = checkAdmin($_SESSION);

    if($admin == true){

    }
    else if($student == true) {
        header("Location: /dashboard");
    }
    else if($pilot == true) {
        header("Location: /pilot-dashboard");
    }
    else {
        header("Location: /login");
    }
?>