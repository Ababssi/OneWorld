<?php
require_once('views/View.php');
class ControllerCountry
{
    private $countryManager;
    private $view;

    public function __construct($crit)
    {       
        $crud = ucfirst(strtolower(array_shift($crit)));
        $list=self::urlToArray($crit);

        switch ($crud) 
        {
            case 'dele':              
                $this->deleToModelAndView(self::arrayToRequestForView($list));             
                break;
            case 'upda':            
                $this->updaToModelAndView(self::arrayToRequestForView($list));               
                break;
            case 'crea':               
                $this->creaToModelAndView(self::arrayToRequestForView($list));               
                break;          
            default:              
                $this->readToModelAndView(self::arrayToRequestForView($list));
                //$this->sendToModelThenJsonForCountry();         
                break;
        }
    }

    //on recupère les critères de séléction contenu dans crit
    //on les ordonne dans une liste indexée 
    public static function urlToArray($crit)
    {
        $expUrl=[];
        $listAttValue=[];
        foreach ($crit as $re) {
            $expUrl = explode(":",$re);
            $listAttValue[$expUrl[0]]=$expUrl[1];
        }
        return $listAttValue;
    }


    //CREATE
    // on appelle un fonction de creation 
    // puis on envoie la vue avec un message de comfirmation "creation faite"
    private function creaToModelAndView($reqsql)
    {
        $this->countryManager = new CountryManager;
        $country = $this->countryManager->getCountfree($reqsql);
        
        $this->view = new View('Country');
        $this->view->generate(array('country'=> $country));
    }

    //READ
    // on appelle un fonction de lecture (inclus les filtres)
    // puis on envoie la vue avec un message de comfirmation "voici votre recherche"
    private function readToModelAndView($reqsql)
    {
        $this->countryManager = new CountryManager;
        $country = $this->countryManager->getCountfree($reqsql);
        
        $this->view = new View('Country');
        $this->view->generate(array('country'=> $country));
    }

    //UPDATE
    // on appelle un fonction de mise a jour, modification
    // puis on envoie la vue avec un message de comfirmation "modification faite"
    private function updaToModelAndView($reqsql)
    {
        $this->countryManager = new CountryManager;
        $country = $this->countryManager->getCountfree($reqsql);
        
        $this->view = new View('Country');
        $this->view->generate(array('country'=> $country));
    }

    //DELETE
    // on appelle un fonction de suppression
    // puis on envoie la vue avec un message de comfirmation "element retiré"
    private function deleToModelAndView($reqsql)
    {
        $this->countryManager = new CountryManager;
        $country = $this->countryManager->getCountfree($reqsql);
        
        $this->view = new View('Country');
        $this->view->generate(array('country'=> $country));
    }


    //on assemble la requete SQL depuis une liste indéxée
    public static function arrayToRequestForView($tabAsso)
    {
        $request = "SELECT DISTINCT country.* FROM `country`,`countrylanguage` WHERE country.Code = countrylanguage.CountryCode AND ";
        foreach ($tabAsso as $key => $value) {
            $request .= " ".$key."='".$value."' AND "; 
        }
        $request = substr($request, 0, -5);
        $request .= " ORDER BY country.NameCountry";
        return $request;
    }


    //on envoie la requete SQL qui generera un json dans la classe Model
    private function sendToModelThenJsonForCountry()
    {
        $this->countryManager = new CountryManager;
        $this->countryManager->getListToManagerForJson("SELECT country.Code,country.NameCountry,city.Name,country.Continent,country.Population,country.SurfaceArea FROM `country`,`city` WHERE city.Id=country.Capital ORDER BY country.NameCountry" );
    }



    //tentative de recupération de moyenne directement de la BD
    //remplacer par un moyenne des valeurs directement dans la view
    // public static function AvglifeExpectancyOn($reqAvg){
        
    //     $fullReq = "SELECT DISTINCT country.LifeExpectancy FROM `country` WHERE country.Code = (".$reqAvg.")";

    //     $this->countryManager = new CountryManager;
    //     $this->countryManager->getListToManagerForJson($fullReq);
    // }

}