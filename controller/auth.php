<?php
session_start();
require("./model/User.php");

if (isset($_POST['username']) && isset($_POST['password'])) {
    $user = new User;
    $user->setLogin($_POST['username']);
    $user->setPassword($_POST['password']);
    $user->authUser();
}
