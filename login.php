<?php

require_once('model/GestionCompte.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) 
{
    $loginError = ''; //on initialise nos messages d' erreurs
    $passwordError = '';
    $password=htmlentities(trim($_POST['password'])); //on securise les données
    $login=htmlentities(trim($_POST['login']));
    //on vérifie les input
    $valid = true;
    if (empty($login)) {
        $loginError = 'Please enter Login';
        $valid = false;
    }
    if (empty($password)) {
        $passwordError = 'Please enter password';
        $valid = false;
    }

    if ($valid) 
    { //si c'est bon, on connecte à la base
        
        $gestCompte = new GestionCompte;
        $obj = $gestCompte->getConnectRole($login, $password);
        if ($obj)
        {
            // echo '<pre>';
            // print_r($obj);
            // echo '</pre>';
            
            session_start(); //on ouvre la session
            $_SESSION['login'] = $obj->Login();//on assigne nos valeurs
            $_SESSION['password'] = $obj->Password();
            $_SESSION['adress'] = $obj->Adress();
            $_SESSION['role'] = $obj->Role();
            
            echo '<p>Bienvenue '.$obj->Login().', 
                vous êtes maintenant connecté!</p>
                <p>Cliquez <a href="./index.php">ici</a> 
                pour revenir à la page d accueil</p>';
            header('location:index.php'); //et on renvoie vers l'index  
        }
        else
        {
            // Acces refusé on reste sur la page!
            $passwordError="incorrects";
            $loginError="Login ou Password";
            echo '<p>Une erreur s\'est produite pendant votre identification.<br /> Le mot de passe ou le pseudo entré  n\'est pas correcte.</p><p>Cliquez <a href="./login.php">ici</a>';   
        }

    }
      
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Crud</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div>
            <h3>Connectez vous !</h3>
            <form class="carte" method="POST" action="login.php">

                <div class="control-group <?php echo!empty($loginError) ? 'error' : ''; ?>">
                    <label class="control-label">Login</label>
                    <div class="controls">
                        <input type="text" name="login" value="">
                        <?php if (!empty($loginError)) : ?><!-- affiche erreur-->
                            <span class="help-inline"><?php echo $loginError; ?></span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="control-group <?php echo!empty($passwordError) ? 'error' : ''; ?>">
                    <label class="control-label">Password</label>
                    <div class="controls">
                        <input type="password" name="password" value="">
                    <?php if (!empty($passwordError)) : ?> <!-- affiche erreur-->
                        <span class="help-inline"><?php echo $passwordError; ?></span>
                    <?php endif; ?>
                    </div>
                </div>

                <input type="submit" value="submit" name="submit">
            </form>
        </div>
    </body>
</html>