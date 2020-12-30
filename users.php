<?php

class user
{
    private $username;
    private $email;
    private $password;



    public function getiduser()
    {
        return $this->iduser;
    }
    public function getusername()
    {
        return $this->username;
    }
    public function getemail()
    {
        return $this->email;
    }
    public function getpassword()
    {
        return $this->password;
    }
    
 
 
 
    public function setusername($username)
    {
        $this->username = $username;
    }
    public function setemail($email)
    {
        $this->email = $email;
    }
    public function setpassword($password)
    {
        $this->password = $password;
    }



    public function __construct($username ,$email, $password )
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;

    }
}
