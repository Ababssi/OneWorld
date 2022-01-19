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
            case 'Dele':       
                $this->deleToModelAndView($list);     
                break;
            case 'Upda':   
                $this->updaToModelAndView($list);         
                break;
            case 'Crea':           
                $this->creaToModelAndView($list);            
                break;      
            case 'Json':              
                $this->sendToModelThenJsonForCountry();            
                break;
            default:              
                $this->readToModelAndView($list);       
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
    private function creaToModelAndView($tabasso)
    {
        
        $this->countryManager = new CountryManager;
        $country = $this->countryManager->createCountry($tabasso);

        $this->view = new View('Country');
        $this->view->generate(array('country'=> $country));
        
    }

    //READ
    // on appelle un fonction de lecture (inclus les filtres)
    // puis on envoie la vue avec un message de comfirmation "voici votre recherche"
    private function readToModelAndView($tabasso)
    {
        $this->countryManager = new CountryManager;
        $country = $this->countryManager->readCountry($tabasso);
            
        $this->view = new View('Country');
        $this->view->generate(array('country'=> $country)); 
    }

    //UPDATE
    // on appelle un fonction de mise a jour, modification
    // puis on envoie la vue avec un message de comfirmation "modification faite"
    private function updaToModelAndView($tabasso)
    {   
        $this->countryManager = new CountryManager;
        $country = $this->countryManager->updateCountry($tabasso);
            
        $this->view = new View('Country');
        $this->view->generate(array('country'=> $country));
    }

    //DELETE
    // on appelle un fonction de suppression
    // puis on envoie la vue avec un message de comfirmation "element retiré"
    private function deleToModelAndView($tabasso)
    {
        
            $this->countryManager = new CountryManager;
            $country = $this->countryManager->deleteCountry($tabasso);  

            $this->view = new View('Country');
            $this->view->generate(array('country'=> $country));
        
    }

    //on envoie la requete SQL qui generera un json dans la classe Model
    private function sendToModelThenJsonForCountry()
    {
        $this->countryManager = new CountryManager;
        $this->countryManager->getListToManagerForJson();
    }


}