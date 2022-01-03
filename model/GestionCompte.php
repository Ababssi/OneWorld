<?php
require_once('Model.php');
    class GestionCompte extends Model
    { 
        public function getConnectRole($login, $pass)
        {       
            $this->getBdd();
            $reqSql = "SELECT user.* FROM `user` WHERE user.login = '".$login."' AND user.password = '".$pass."'";
            return $this->getConnect('User',$reqSql);
        }
 
    }

