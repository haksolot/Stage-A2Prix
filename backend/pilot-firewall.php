<?php
    session_start();
    include('./backend/check-authorization.php');

    checkLogin($_SESSION);
    $student = checkStudent($_SESSION);
    $pilot = checkPilot($_SESSION);
    if($student == true) {
        header("Location: /dashboard");
    }
    else if($pilot == true) {

    }
    else {
        header("Location: /login");
    }
?>