<?php
require_once('views/View.php');
class ControllerAccueil
{
    // private $_accueilManager;
    private $_view;
    public function __construct($url)
    {
        $this->Accueil();
    }

    private function Accueil()
    {
        // $this->_accueilManager = new accueilManager;
        // $accueil = $this->_accueilManager->getaccueil();
        $this->_view = new View('Accueil');
        $this->_view->generate(array('accueil'=> $accueil));
    }
    
}
