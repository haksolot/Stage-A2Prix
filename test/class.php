<?php
class User {
    public $name, $surname, $login, $id;
    private $password;

    function setName($sName){
        $this->name = $sName;
    }

    function setSurname($sSurname){
        $this->surname = $sSurname;
    }

    function setLogin($sLogin){
        $this->login = $sLogin;
    }

    function setId($sId){
        $this->id = $sId;
    }

    function setPassword($sPassword){
        $this->password = $sPassword;
    }

    function getName(){
        return $this->name;
    }

    function getSurname(){
        return $this->surname;
    }

    function getLogin(){
        return $this->login;
    }

    function getId(){
        return $this->id;
    }

    function getPassword(){
        return $this->password;
    }

    function setUser($name, $surname, $login, $id, $password){
        setName($name);
        setSurname($surname);
        setLogin($login);
        setId($id);
        setPassword($password);
    }

    function getUser(){
        return array($this->name, $this->surname, $this->login, $this->id, $this->password);
    }
}