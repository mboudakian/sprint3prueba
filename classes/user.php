<?php

class User 
{
    private $email;
    private $userName;
    private $password;
    private $age;
    private $avatar;


    public function __construct(string $userName,
     string $email, string $password,int $age, string $avatar)
    {
        $this->userName = $userName;
        $this->email = $email;
        $this->password = $password;
        $this->age = $age;
        $this->avatar = $avatar;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
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

    public function getAge()
    {
        return $this->age;
    }
    public function setAge($age)
    {
        $this->age = $age;
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