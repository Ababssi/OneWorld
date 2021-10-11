<?php

class Country
{
    private $_Code; //clé primaire
    private $_NameCountry;
    private $_Continent;
    private $_Surface;
    private $_Population;

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
    public function setCode($Code)
    {
        if (is_string($Code)) 
        $this->_Code = $Code;
    }
    public function setNameCountry($NameCountry)
    {
        if(is_string($NameCountry))
        $this->_NameCountry = $NameCountry;
    }
    public function setContinent($Continent)
    {
        if(is_string($Continent))
        $this->_Continent = $Continent;
    }
    public function setSurfaceArea($Surface)
    {
        $Surface = (int) $Surface;
        $this->_Surface = $Surface;
    }
    public function setPopulation($Population)
    {
        $Population = (int) $Population;
        $this->_Population = $Population;
    }
    //GETTERS
    public function Code()
    {
        return $this->_Code;
    }
    public function NameCountry()
    {
        return $this->_NameCountry;
    }
    public function Continent()
    {
        return $this->_Continent;
    }
    public function Surface()
    {
        return $this->_Surface;
    }
    public function Population()
    {
        return $this->_Population;
    }
}