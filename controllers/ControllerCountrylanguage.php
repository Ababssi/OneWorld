<?php
require_once('views/View.php');
class ControllerCountrylanguage
{
    private $countrylanguageManager;
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
        $this->countrylanguageManager = new CountrylanguageManager;
        $countrylanguage = $this->countrylanguageManager->getLanguefree($tabAsso);
        $this->view = new View('Countrylanguage');
        $this->view->generate(array('countrylanguage'=> $countrylanguage)); 
    }

    //READ
    // on appelle un fonction de lecture (inclus les filtres)
    // puis on envoie la vue avec un message de comfirmation "voici votre recherche"
    private function readToModelAndView($tabAsso)
    {
        $this->countrylanguageManager = new CountrylanguageManager;
        $countrylanguage = $this->countrylanguageManager->getLanguefree($tabAsso);
        $this->view = new View('Countrylanguage');
        $this->view->generate(array('countrylanguage'=> $countrylanguage)); 
    }

    //UPDATE
    // on appelle un fonction de lecture (inclus les filtres)
    // puis on envoie la vue avec un message de comfirmation "voici votre recherche"
    private function updaToModelAndView($tabAsso)
    {
        $this->countrylanguageManager = new CountrylanguageManager;
        $countrylanguage = $this->countrylanguageManager->getLanguefree($tabAsso);
        $this->view = new View('Countrylanguage');
        $this->view->generate(array('countrylanguage'=> $countrylanguage)); 
    }

    //DELETE
    // on appelle un fonction de lecture (inclus les filtres)
    // puis on envoie la vue avec un message de comfirmation "voici votre recherche"
    private function deleToModelAndView($tabAsso)
    {
        $this->countrylanguageManager = new CountrylanguageManager;
        $countrylanguage = $this->countrylanguageManager->getLanguefree($tabAsso);
        $this->view = new View('Countrylanguage');
        $this->view->generate(array('countrylanguage'=> $countrylanguage)); 
    }

    //on envoie la requete SQL qui generera un json dans la classe Model
    private function sendToModelThenJsonForLanguage()
    {
        $this->countrylanguageManager = new CountrylanguageManager;
        $this->countrylanguageManager->getListToManagerForJson();
    }

}

