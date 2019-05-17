<?php

class Auth
{
    private $userName;
    private $password;
    private $rememberMe;
    


    public function validatePassword($password, $hash)
    {
        return password_verify($password, $hash);
    }

    public function login($user)
    {
        Session::set('name', $user->getUserName());
        Session::set('avatar', $user->getAvatar());
        Cookie::set('name', $user->getUserName(), 3600);
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

   
    public function getAvatar()
    {
        return $this->avatar;
    }

    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }
}