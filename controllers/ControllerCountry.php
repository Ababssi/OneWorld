<?php
require_once('views/View.php');
class ControllerCountry
{
    private $countryManager;
    private $view;

    public function __construct($crit)
    {       
        $list=self::urlToArray($crit);
        $this->sendToModelAndView(self::arrayToRequestForView($list));
        //$this->sendToModelThenJsonForCountry();
    }

    private function sendToModelThenJsonForCountry()
    {
        $this->countryManager = new CountryManager;
        $this->countryManager->getListToManagerForJson("SELECT country.Code,country.NameCountry,city.Name,country.Continent,country.Population,country.SurfaceArea FROM `country`,`city` WHERE city.Id=country.Capital ORDER BY country.NameCountry" );
    }

    private function sendToModelAndView($reqsql)
    {
        $this->countryManager = new CountryManager;
        $country = $this->countryManager->getCountfree($reqsql);
        $this->view = new View('Country');
        $this->view->generate(array('country'=> $country));
    }

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

    public static function AvglifeExpectancyOn($reqAvg){
        
        $fullReq = "SELECT DISTINCT country.LifeExpectancy FROM `country` WHERE country.Code = (".$reqAvg.")";

        $this->countryManager = new CountryManager;
        $this->countryManager->getListToManagerForJson($fullReq);


    }

}