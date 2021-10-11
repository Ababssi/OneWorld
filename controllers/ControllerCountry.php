<?php
require_once('views/View.php');
class ControllerCountry
{
    private $_countryManager;
    private $_view;

    public function __construct($crit)
    {
        $list=self::urlToArray($crit);
        $this->sendToModelAndView(self::arrayToRequestForView($list));
        //$this->sendToModelThenJsonForCountry();
    }

    private function sendToModelThenJsonForCountry()
    {
        $this->_countryManager = new CountryManager;
        $this->_countryManager->getListToManagerForJson("SELECT country.Code,country.NameCountry,city.Name,country.Continent,country.Population,country.SurfaceArea FROM `country`,`city` WHERE city.Id=country.Capital ORDER BY country.NameCountry" );
    }

    private function sendToModelAndView($reqsql)
    {
        $this->_countryManager = new CountryManager;
        $country = $this->_countryManager->getCountfree($reqsql);
        $this->_view = new View('Country');
        $this->_view->generate(array('country'=> $country)); 
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

}