<?php
require_once('views/View.php');
class ControllerCity
{
    private $cityManager;
    private $view;

    public function __construct($crit)  
    {
        $list=self::urlToArray($crit);
        $this->sendToModelAndView(self::arrayToRequestForView($list));
        //$this->sendToModelThenJsonForCity();
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

    //fonction controlleur lien entre le Model et la View
    private function sendToModelAndView($reqsql)
    {
        $this->cityManager = new CityManager;
        $city = $this->cityManager->getCityfree($reqsql);
        $this->view = new View('City');
        $this->view->generate(array('city'=> $city)); 
    }

    //on assemble la requete SQL depuis une liste indéxée
    public static function arrayToRequestForView($tabAsso)
    {
        $request = "SELECT DISTINCT city.* FROM `country`,`city` WHERE country.Code = city.CountryCode AND ";
        foreach ($tabAsso as $key => $value) {
            $request .= " ".$key."='".$value."' AND "; 
        }
        $request = substr($request, 0, -5);
        $request .= " ORDER BY city.Name";
        return $request;
    }  
    
    //on envoie la requete SQL qui generera un json dans la classe Model
    private function sendToModelThenJsonForCity()
    {
        $this->cityManager = new CityManager;
        $this->cityManager->getListToManagerForJson("SELECT DISTINCT city.Id,city.Name,city.Population,city.IsCapital,country.NameCountry,country.Code FROM `city`,`country` WHERE city.CountryCode=country.Code ");
    }
 
}