<?php
require_once('views/View.php');
class ControllerCity
{
    private $cityManager;
    private $view;

    public function __construct($crit)  
    {
        $crud = ucfirst(strtolower(array_shift($crit)));
        $list=self::urlToArray($crit);

        switch ($crud) 
        {
            case 'dele':              
                $this->deleToModelAndView($list);             
                break;
            case 'upda':            
                $this->updaToModelAndView($list);               
                break;
            case 'crea':               
                $this->creaToModelAndView($list);               
                break;          
            default:              
                $this->readToModelAndView($list);
                //$this->sendToModelThenJsonForCountry();         
                break;
        }

    }

    // on recupère les critères de séléction contenu dans crit
    // on les ordonne dans une liste indexée 
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
    private function creaToModelAndView($tabAsso)
    {
        $this->cityManager = new CityManager;
        $city = $this->cityManager->getCityfree($tabAsso);
        $this->view = new View('City');
        $this->view->generate(array('city'=> $city)); 
    }

    //READ
    // on appelle un fonction de lecture (inclus les filtres)
    // puis on envoie la vue avec un message de comfirmation "voici votre recherche"
    private function readToModelAndView($tabAsso)
    {
        $this->cityManager = new CityManager;
        $city = $this->cityManager->getCityfree($tabAsso);
        $this->view = new View('City');
        $this->view->generate(array('city'=> $city)); 
    }

    //UPDATE
    // on appelle un fonction de mise a jour, modification
    // puis on envoie la vue avec un message de comfirmation "modification faite"
    private function updaToModelAndView($tabAsso)
    {
        $this->cityManager = new CityManager;
        $city = $this->cityManager->getCityfree($tabAsso);
        $this->view = new View('City');
        $this->view->generate(array('city'=> $city)); 
    }

    //DELETE
    // on appelle un fonction de suppression
    // puis on envoie la vue avec un message de comfirmation "element retiré"
    private function deleToModelAndView($tabAsso)
    {
        $this->cityManager = new CityManager;
        $city = $this->cityManager->getCityfree($tabAsso);
        $this->view = new View('City');
        $this->view->generate(array('city'=> $city)); 
    }

    //on envoie la requete SQL qui generera un json dans la classe Model
    private function sendToModelThenJsonForCity()
    {
        $this->cityManager = new CityManager;
        $this->cityManager->getListToManagerForJson();
    }
 
}