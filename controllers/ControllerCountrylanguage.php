<?php
require_once('views/View.php');
class ControllerCountrylanguage
{
    private $_countrylanguageManager;
    private $_view;

    public function __construct($crit)
    {
        $list=self::urlToArray($crit);
        $this->sendToModelAndView(self::arrayToRequestForView($list));
        //$this->sendToModelThenJsonForLanguage();
    }

    private function sendToModelThenJsonForLanguage()
    {
        $this->_countrylanguageManager = new CountrylanguageManager;
        $this->_countrylanguageManager->getListToManagerForJson("SELECT countrylanguage.Language,countrylanguage.percentage,countrylanguage.IsOfficial,country.NameCountry,country.Code FROM `countrylanguage`,`country` WHERE countrylanguage.CountryCode=country.Code ");
    }

    private function sendToModelAndView($reqsql)
    {
        $this->_countrylanguageManager = new CountrylanguageManager;
        $countrylanguage = $this->_countrylanguageManager->getLanguefree($reqsql);
        $this->_view = new View('Countrylanguage');
        $this->_view->generate(array('countrylanguage'=> $countrylanguage)); 
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
        $request = "SELECT DISTINCT * FROM `countrylanguage`,`country` WHERE countrylanguage.CountryCode=country.Code  AND ";
        foreach ($tabAsso as $key => $value) {
            $request .= " ".$key."='".$value."' AND "; 
        }
        $request = substr($request, 0, -5);
        $request .= " ORDER BY countrylanguage.Language";
        return $request;
    }

}
