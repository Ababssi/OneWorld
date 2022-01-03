<?php

session_start();

if (isset($_SESSION['login']))
{
    require_once('controllers/Router.php');
    $router= new Router();
    $router->routeReq();

}else
{
    header('location:login.php');
}