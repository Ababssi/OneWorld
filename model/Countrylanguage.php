<?php

class Countrylanguage
{
    private $_CountryCode; //clé primaire 
    private $_Language;
    private $_IsOfficial;
    private $_Percentage;

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
    public function setCountryCode($CountryCode)
    {
        if (is_string($CountryCode)) 
        $this->_CountryCode = $CountryCode;
    }
    public function setLanguage($Language)
    {
        if(is_string($Language))
        $this->_Language = $Language;
    } 
    public function setIsOfficial($IsOfficial)
    {
        if(is_string($IsOfficial))
        $this->_IsOfficial = $IsOfficial;
    }
    public function setPercentage($Percentage)
    {
        $Percentage = (int) $Percentage;
        $this->_Percentage = $Percentage;
    }

    //GETTERS
    public function CountryCode()
    {
        return $this->_CountryCode;
    }
    public function Language()
    {
        return $this->_Language;
    }
    public function IsOfficial()
    {
        return $this->_IsOfficial;
    }
    public function Percentage()
    {
        return $this->_Percentage;
    }

}