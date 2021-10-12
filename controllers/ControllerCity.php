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

    private function sendToModelThenJsonForCity()
    {
        $this->cityManager = new CityManager;
        $this->cityManager->getListToManagerForJson("SELECT DISTINCT city.Id,city.Name,city.Population,city.IsCapital,country.NameCountry,country.Code FROM `city`,`country` WHERE city.CountryCode=country.Code ");
    }

    private function sendToModelAndView($reqsql)
    {

        $this->cityManager = new CityManager;
        $city = $this->cityManager->getCityfree($reqsql);

        $this->view = new View('City');
        $this->view->generate(array('city'=> $city)); 
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
        $request = "SELECT DISTINCT city.* FROM `country`,`city` WHERE country.Code = city.CountryCode AND ";
        foreach ($tabAsso as $key => $value) {
            $request .= " ".$key."='".$value."' AND "; 
        }
        $request = substr($request, 0, -5);
        $request .= " ORDER BY city.Name";
        return $request;
    }  
 
}