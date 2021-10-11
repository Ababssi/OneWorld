<?php
require_once('views/View.php');
class ControllerCity
{
    private $_cityManager;
    private $_view;

    public function __construct($crit)  
    {
        $list=self::urlToArray($crit);
        $this->sendToModelAndView(self::arrayToRequestForView($list));
        //$this->sendToModelThenJsonForCity();
    }

    private function sendToModelThenJsonForCity()
    {
        $this->_cityManager = new CityManager;
        $this->_cityManager->getListToManagerForJson("SELECT DISTINCT city.Id,city.Name,city.Population,city.IsCapital,country.NameCountry,country.Code FROM `city`,`country` WHERE city.CountryCode=country.Code ");
    }

    private function sendToModelAndView($reqsql)
    {
        echo " controller euf : ";
        echo "</br>";
        print_r($reqsql);
        echo "</br>";
     
        $this->_cityManager = new CityManager;
        echo " controller euf : ";
        var_dump($this->_cityManager);
        $city = $this->_cityManager->getCityfree($reqsql);

        $this->_view = new View('City');
        $this->_view->generate(array('city'=> $city)); 
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
        $request = "SELECT * FROM `country`,`city` WHERE country.Code = city.CountryCode AND ";
        foreach ($tabAsso as $key => $value) {
            $request .= " ".$key."='".$value."' AND "; 
        }
        $request = substr($request, 0, -5);
        return $request;
    }  
 
}