<?php
require_once 'User.php';

class Admin extends User
{

    public function __construct()
    {
        $this->role = 'admin';
    }
}