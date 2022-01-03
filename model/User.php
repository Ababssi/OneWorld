<?php

class User
{
    private $login;
    private $password;
    private $adress;
    private $role;

    //CONSTRUCTEUR
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }
    
    //HYDRATATION
    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method))
            $this->$method($value);
        }
    }

    //SETTERS
    public function setLogin($login)
    {
        if (is_string($login)) 
        $this->Login = $login;
    }
    public function setPassword($Password)
    {
        if(is_string($Password))
        $this->Password = $Password;
    }
    public function setAdress($Adress)
    {
        if(is_string($Adress))
        $this->Adress = $Adress;
    }
    public function setRole($Role)
    {
        $Role = (int) $Role;
        $this->Role = $Role;
    }

    //GETTERS
    public function Login()
    {
        return $this->Login;
    }
    public function Password()
    {
        return $this->Password;
    }
    public function Adress()
    {
        return $this->Adress;
    }
    public function Role()
    {
        return $this->Role;
    }

}