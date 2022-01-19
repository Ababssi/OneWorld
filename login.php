<?php
session_start();
require_once('model/GestionCompte.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) 
{
    $loginError = ''; 
    $passwordError = '';

    $login=htmlentities(trim($_POST['login']), ENT_QUOTES, 'UTF-8'); 
    $password=htmlentities(trim($_POST['password']), ENT_QUOTES, 'UTF-8'); 
    $password= password_hash($password,PASSWORD_DEFAULT);

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
    { 
        $gestCompte = new GestionCompte;
        $candidature = $gestCompte->getConnectRole($login, $password);
        if ($candidature)
        {
            header('location:index.php');
        }
    }
    else
    {
        // Acces refusé on reste sur la page!
        $loginError="champ login vide";
        $passwordError="champ passwprd vide";
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
            <form class="drapCell" method="POST" action="login.php">

                <label class="control-label">Login</label>
                    <div class="controls">
                        <input type="text" name="login" value="">
                        <?php if (!empty($loginError)) : ?><!-- affiche erreur-->
                            <span class="help-inline"><?php echo $loginError; ?></span>
                        <?php endif; ?>
                    </div>

                <label class="control-label">Password</label>
                    <div class="controls">
                        <input type="password" name="password" value="">
                        <?php if (!empty($passwordError)) : ?> <!-- affiche erreur-->
                            <span class="help-inline"><?php echo $passwordError; ?></span>
                        <?php endif; ?>
                    </div>

                <input type="submit" value="submit" name="submit">
            </form>
        </div>
    </body>
</html>