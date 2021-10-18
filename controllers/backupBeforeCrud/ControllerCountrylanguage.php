<?php
require_once('views/View.php');
class ControllerCountrylanguage
{
    private $countrylanguageManager;
    private $view;

    public function __construct($crit)
    {
        $list=self::urlToArray($crit);
        $this->sendToModelAndView(self::arrayToRequestForView($list));
        //$this->sendToModelThenJsonForLanguage();
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
        $this->countrylanguageManager = new CountrylanguageManager;
        $countrylanguage = $this->countrylanguageManager->getLanguefree($reqsql);
        $this->view = new View('Countrylanguage');
        $this->view->generate(array('countrylanguage'=> $countrylanguage)); 
    }

    //on assemble la requete SQL depuis une liste indéxée
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

    //on envoie la requete SQL qui generera un json dans la classe Model
    private function sendToModelThenJsonForLanguage()
    {
        $this->countrylanguageManager = new CountrylanguageManager;
        $this->countrylanguageManager->getListToManagerForJson("SELECT countrylanguage.Language,countrylanguage.percentage,countrylanguage.IsOfficial,country.NameCountry,country.Code FROM `countrylanguage`,`country` WHERE countrylanguage.CountryCode=country.Code ");
    }

}

