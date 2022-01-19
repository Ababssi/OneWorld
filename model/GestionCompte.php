<?php
require_once('Model.php');
require_once('User.php');

    class GestionCompte extends Model
    { 
        public function getConnectRole($login, $password)
        {      
            $this->getBdd();
            $candidat = new User(['Login' => $login, 'Password' => $password,'Adress' => "",'Role' => ""]);
            $reqAllUser = "SELECT user.* FROM `user`";
            $tabAllUsers = $this->getListObj('User',$reqAllUser);
            foreach ($tabAllUsers as $candidature) {

                if ($candidature->Login() === $candidat->Login() && $candidature->Password() === $candidat->Password())
                {
                    session_start();
                    $_SESSION['login'] = $candidature->Login();
                    $_SESSION['password'] = $candidature->Password();
                    $_SESSION['adress'] = $candidature->Adress();
                    $_SESSION['role'] = $candidature->Role();
                    return true;
                }
                
            }
            return -1; 
        }
    }










