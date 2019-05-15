<?php

class Auth
{
    private $userName;
    private $password;
    private $rememberMe;

    public function searchUser()
    {

    }

    public function validatePassword($password, $hash)
    {
        return password_verify($password, $hash);
    }

    public function login()
    {

    }



    
    public function getUserName()
    {
        return $this->userName;
    }
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getRememberMe()
    {
        return $this->rememberMe;
    }
    public function setRememberMe($rememberMe)
    {
        $this->rememberMe = $rememberMe;
    }
}