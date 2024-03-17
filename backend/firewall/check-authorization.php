<?php
    function checkLogin($a){
        if (!isset($a['logged_in']) || $a['logged_in'] !== true) {
            header("Location: /login");
            exit();
        }
    }

    function checkStudent($a){
        if (isset($a['role']) && $a['role'] == 'student') {
            return true;
        }
        else {
            return false;
        }
    }

    function checkPilot($a){
        if (isset($a['role']) && $a['role'] == 'pilot') {
            return true;
        }
        else {
            return false;
        }
    }
?>