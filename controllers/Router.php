<?php
require_once('views/View.php');
class Router
{
    private $_ctrl;
    private $_view;

    public function routeReq()
    {
        try
        {
            //CHARGEMENT AUTOMATIQUE DES CLASSES

            spl_autoload_register(function($class) {
                require_once('model/'.$class.'.php'); 
            });
            $url = [];
            $select="";

            if(isset($_GET['url']))
            {
                if (!empty($_GET['url'])) {
                    $url = explode('/', filter_var($_GET['url']));        
                    $controller = ucfirst(strtolower(array_shift($url)));
                    $controllerClass = "Controller".$controller;
                    $controllerFile = "controllers/".$controllerClass.".php";              
                    if (file_exists($controllerFile)) {
                        require_once($controllerFile);
                        $this->_ctrl = new $controllerClass($url);
                    } else {
                        throw new Exception('Aucune correspondance fichier');
                    }
                }
                else
                {
                    require_once('controllers/ControllerAccueil.php');
                    $this->_ctrl = new ControllerAccueil($url);
                }                            
            }
            else throw new Exception('Lancez une recherche !'); 
        }
        //GESTION DES ERREURS
        catch(Exception $e)
        {
            $errorMsg = $e->getMessage();
            $this->_view = new View('Error');
            $this->_view->generate(array('errorMsg' => $errorMsg));
        }
    }
}