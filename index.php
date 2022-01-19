


<?php

session_start();
require_once('controllers/Router.php');
$router= new Router();
$router->routeReq();
