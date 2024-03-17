<?php
    session_start();
    include('./backend/check-authorization.php');

    checkLogin($_SESSION);
    $student = checkStudent($_SESSION);
    $pilot = checkPilot($_SESSION);
    if($student == true) {

    }
    else if($pilot == true) {
        header("Location: /pilot-dashboard");
    }
    else {
        header("Location: /login");
    }
?>