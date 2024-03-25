<?php
require_once 'class.php';

class Student extends User {
    public function test(){
        echo($this->name);
    }
}