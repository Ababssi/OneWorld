<!DOCTYPE html>
<html lang="en">

    <head>     
        <meta charset="UTF-8">
        <meta name="keywords" content="HTML, CSS, JavaScript, Php">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="Information monde, pays, ville, langues"  content="Rechercher des informations géographique économique gouvernementale démographique">
        <meta name="author" content="Sophien Ababssi">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.jsdelivr.net/npm/tom-select@2.0.0-rc.4/dist/js/tom-select.complete.min.js"></script>   
        <!-- <link href="https://cdn.jsdelivr.net/npm/tom-select@2.0.0-rc.4/dist/css/tom-select.css" rel="stylesheet"> -->
        <link rel="stylesheet" href="style.css">
        <title>Tout ce que vous avez besoin de savoir sur les Pays les Villes et les Langues</title>
    </head>

    <body>    
        <header>
            <h1><a href="../index.php">OneWorld</a></h1>   
            <canvas id="canvas"></canvas>
        </header>
        <h3>Des infos sur </h3>
        <main id="accueil">
            
            <section class="navGrid">
                <div class="navCell cell1" title="Learn about cities city" id="cardcity" href="http://oneworld.cyberdevweb.fr/index.php?url=city/read">Une ville</div>
                <div class="navCell cell2" title="Learn about countries country" id="cardcoun" href="http://oneworld.cyberdevweb.fr/index.php?url=country/read">Un pays</div>
                <div class="navCell cell3" title="Learn about language" id="cardlang" href="http://oneworld.cyberdevweb.fr/index.php?url=countrylanguage/read">Une langue</div>
            </section>

            <section class="rech">
            <!----------------------------------Country----------------------------------->
                <div id ="rechCountry" class="searchBarNone" >

                    <div class="select">
                        <select id="select-country" name ="select-country" placeholder="Un doute ? sur l'orthographe tapez quelques lettres..."></select>
                        <button class="btnFiltre"  onclick="return ficheCountry();">Go</button>
                    </div>

                    <div class="select">
                        <select id="selectByLang" name ="selectByLang" placeholder="Par langue parlée" ></select> 
                    </div>

                    <div class="select">
                        <select id="selectByContForCountry" name ="selectByContForCountry" placeholder="Par Continent" value="all">
                            <option value="*">Par Continent</option>
                            <option value="North America">North America</option>
                            <option value="South America">South America</option>
                            <option value="Europe">Europe</option>
                            <option value="Africa">Africa</option>
                            <option value="Asia">Asia</option>
                            <option value="Oceania">Oceania</option>
                            <option value="Antarctica">Antarctica</option>
                        </select>
                    </div>

                    <div class="select">
                        <select id="selectByPopuForCountry" name ="selectByPopuForCountry" placeholder="Par Tranche de Population" value="all">
                            <option value="*">Par Population</option>
                            <option value="2000000"> plus de 2M </option>
                            <option value="5000000"> plus de 10M </option>
                            <option value="10000000"> plus de 10M </option>
                            <option value="50000000"> plus de 50M </option>
                            <option value="100000000"> plus de 100M </option>
                            <option value="800000000"> plus de 800M </option>
                        </select>
                    </div>

                    <button class="btnFiltre"  onclick="return afficheRech1();">Filtrer</button>
                    <p id="debugCtry"></p>

                </div>
                <!-----------------------------------------------City--------------------------------------------->
                <div id ="rechCity" class="searchBarNone" >

                    <div class="select">
                        <select id="select-city" name ="select-city" placeholder="Un doute sur l'orthographe tapez quelques lettres..."></select>
                        <button class="btnFiltre"  onclick="return ficheCity();">Go</button>
                    </div>

                    <div class="select">
                        <select id="selectByContForCity" name ="selectByContForCity" placeholder="Par Continent" value="all">
                            <option value="*">Par Continent</option>
                            <option value="North America">North America</option>
                            <option value="South America">South America</option>
                            <option value="Europe">Europe</option>
                            <option value="Africa">Africa</option>
                            <option value="Asia">Asia</option>
                            <option value="Oceania">Oceania</option>
                            <option value="Antarctica">Antarctica</option>
                        </select>
                    </div>

                    <div class="select">
                        <select id="selectByPopuForCity" name ="selectByPopuForCity" placeholder="Par Tranche de Population" value="all">
                            <option value="*">Par Population</option>
                            <option value="200000">plus de 200k</option>
                            <option value="500000">plus de 500k</option>
                            <option value="1000000">plus de 1M</option>
                            <option value="5000000">plus de 5M</option>
                            <option value="10000000">plus de 10M</option>
                        </select>
                    </div>

                    <div class="select">
                        <select id="selectByCoun" name ="selectByCoun" placeholder="Pays"></select>                   
                    </div>

                    <button class="btnFiltre"  onclick="return afficheRech2();">Filtrer</button>
                    <p id="debugCity"></p>

                </div>
                <!-----------------------------------------------Langue----------------------------------------------->
                <div id ="rechLangue" class="searchBarNone">              
                    <div class="select">

                        <select id="select-language" name ="select-language" placeholder="Un doute sur l'orthographe tapez quelques lettres..."></select>
                        <button class="btnFiltre"  onclick="return ficheLang();">Go</button>
                    </div>

                    <div class="select">
                        <select id="selectByContForLang" name ="selectByContForLang" placeholder="Par Continent" value="all">
                            <option value="*">Par Continent</option>
                            <option value="North America">North America</option>
                            <option value="South America">South America</option>
                            <option value="Europe">Europe</option>
                            <option value="Africa">Africa</option>
                            <option value="Asia">Asia</option>
                            <option value="Oceania">Oceania</option>
                            <option value="Antarctica">Antarctica</option>
                        </select>
                    </div>

                    <div class="select">
                        <select id="selectByOff" name ="selectByOff" placeholder="Officials" value="all">
                            <option value="*">Par Statut</option>
                            <option value="T">Officiel</option>
                            <option value="F">NonOfficiel</option>
                        </select>
                    </div>

                    <div class="select">
                        <select id="selectByCoun2" name ="selectByCoun2" placeholder="Par Pays"></select>                   
                    </div>

                    <button class="btnFiltre"  onclick="return afficheRech3();">Filtrer</button>
                    <p id="debugLg"></p>
                </div>
            </section>
        </main>
            <!-------------------------------------------------------------------------------------------->
        <?= $content ?>  

        <footer>
            <section>
                <p class="val midInfo">base de donnée datant de 1995 </p>
                <a class="val midInfo" title="contactez moi" href="mailto:abasop1@gmail.com">Par Sophien Ababssi</a>
            </section>
            <section>
                <?php if ($_SESSION['login']!==null): ?>
                    <p class="val midInfo">Session de <?php echo $_SESSION['login']?></p>
                    <p class="val midInfo"> Niveau d'accréditation : <?php echo $_SESSION['role']?></p>
                    <a href="logout.php" title="deconnexion" class="val midInfo">Deconnexion</a>
                <?php else : ?>   
                    <a href="login.php" title="connexion" class="val midInfo">Contributeur ou Administrateur Connectez vous ici</a>
                <?php endif; ?>
            </section>
        </footer>

        <script src="app.js"></script>
        <script type="module" src="main.js"></script>

    </body>
</html>


