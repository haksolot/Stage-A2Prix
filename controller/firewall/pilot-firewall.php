<?php
    session_start();
    include('./controller/firewall/check-authorization.php');

    checkLogin($_SESSION);
    $student = checkStudent($_SESSION);
    $pilot = checkPilot($_SESSION);
    $admin = checkAdmin($_SESSION);

    if($student == true) {
        header("Location: /dashboard");
    }
    else if($admin == true){
        header("Location: /admin-dashboard");
    }
    else if($pilot == true) {

    }
    else {
        header("Location: /login");
    }
?>