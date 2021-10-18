<?php

class Country
{
    private $Code; //clé primaire
    private $NameCountry;
    private $Continent;
    private $Surface;
    private $Population;
    private $Region; 
    private $IndepYear;
    private $LifeExpectancy;
    private $GNP;
    private $GNPOld;
    private $LocalName; 
    private $GovernmentForm;
    private $HeadOfState;
    private $Capital;
    private $Code2;
    
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
        $this->Code = $Code;
    }
    public function setNameCountry($NameCountry)
    {
        if(is_string($NameCountry))
        $this->NameCountry = $NameCountry;
    }
    public function setContinent($Continent)
    {
        if(is_string($Continent))
        $this->Continent = $Continent;
    }
    public function setSurfaceArea($Surface)
    {
        $Surface = (int) $Surface;
        $this->Surface = $Surface;
    }
    public function setPopulation($Population)
    {
        $Population = (int) $Population;
        $this->Population = $Population;
    }  
    public function setRegion($Region)
    {
        if (is_string($Region)) 
        $this->Region = $Region;
    }
    public function setIndepYear($IndepYear)
    {
        $IndepYear = (int) $IndepYear;
        $this->IndepYear = $IndepYear;
    }
    public function setLifeExpectancy($LifeExpectancy)
    {
        $LifeExpectancy = (float) $LifeExpectancy;
        $this->LifeExpectancy = $LifeExpectancy;
    }
    public function setGNP($GNP)
    {
        $GNP = (int) $GNP;
        $this->GNP = $GNP;
    }
    public function setGNPOld($GNPOld)
    {
        $GNPOld = (int) $GNPOld;
        $this->GNPOld = $GNPOld;
    }
    public function setLocalName($LocalName)
    {
        if(is_string($LocalName))
        $this->LocalName = $LocalName;
    }
    public function setGovernmentForm($GovernmentForm)
    {
        if(is_string($GovernmentForm))
        $this->GovernmentForm = $GovernmentForm;
    }
    public function setHeadOfState($HeadOfState)
    {
        if(is_string($HeadOfState));
        $this->HeadOfState = $HeadOfState;
    }
    public function setCapital($Capital)
    {
        $Capital = (int) $Capital;
        $this->Capital = $Capital;
    }
    public function setCode2($Code2)
    {
        if(is_string($Code2));
        $this->Code2 = $Code2;
    }

  

    //GETTERS
    public function Code()
    {
        return $this->Code;
    }
    public function NameCountry()
    {
        return $this->NameCountry;
    }
    public function Continent()
    {
        return $this->Continent;
    }
    public function Surface()
    {
        return $this->Surface;
    }
    public function Population()
    {
        return $this->Population;
    }
    public function Region()
    {
        return $this->Region;
    }
    public function IndepYear()
    {
        return $this->IndepYear;
    }
    public function LifeExpectancy()
    {
        return $this->LifeExpectancy;
    }
    public function GNP()
    {
        return $this->GNP;
    }
    public function GNPOld()
    {
        return $this->GNPOld;
    }
    public function LocalName()
    {
        return $this->LocalName;
    }
    public function GovernmentForm()
    {
        return $this->GovernmentForm;
    }
    public function HeadOfState()
    {
        return $this->HeadOfState;
    }
    public function Capital()
    {
        return $this->Capital;
    }
    public function Code2()
    {
        return $this->Code2;
    }
}