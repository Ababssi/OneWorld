<?php

class City
{
    private $_Id; 
    private $_Name;
    private $_District;
    private $_Population;
    private $_CountryCode; //clé etrangère

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
    public function setId($Id)
    {
        $Id = (int) $Id;
        if ($Id > 0) $this->_Id = $Id;
    }
    public function setName($Name)
    {
        if(is_string($Name))
        $this->_Name = $Name;
    }
    public function setCountryCode($CountryCode)
    {
        if(is_string($CountryCode))
        $this->_CountryCode = $CountryCode;
    }
    public function setDistrict($District)
    {
        if(is_string($District))
        $this->_District = $District;
    }
    public function setPopulation($Population)
    {
        $Population = (int) $Population;
        $this->_Population = $Population;
    }


    //GETTERS
    public function Id()
    {
        return $this->_Id;
    }
    public function Name()
    {
        return $this->_Name;
    }
    public function CountryCode()
    {
        return $this->_CountryCode;
    }
    public function District()
    {
        return $this->_District;
    }
    public function Population()
    {
        return $this->_Population;
    }

}