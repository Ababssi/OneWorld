<!DOCTYPE html>
<html lang="en">
    <head>
        
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.jsdelivr.net/npm/tom-select@2.0.0-rc.4/dist/js/tom-select.complete.min.js"></script>   
        <link href="https://cdn.jsdelivr.net/npm/tom-select@2.0.0-rc.4/dist/css/tom-select.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <title><?= $t ?></title>
    </head>

    <body>    
            <header>
                <h1>OneWorld</h1>
            </header>

            <h3>Je me renseigne sur </h3>

            <main class="navGrid">
                <a class="navCell" id="cardcity" href="http://oneworld.cyberdevweb.fr/index.php?url=city">Une ville</a>
                <a class="navCell" id="cardcoun" href="http://oneworld.cyberdevweb.fr/index.php?url=country">Un pays</a>
                <a class="navCell" id="cardlang" href="http://oneworld.cyberdevweb.fr/index.php?url=countrylanguage">Une langue</a>
            </main>

            <!-----------------------------------------------Country------------------------------------------------>

            <div id ="rechCountry" class="searchBarNone" >

                <div class="select">
                    <label for="select-country">Je cherche un <b>pays</b></label>
                    <select id="select-country" name ="select-country" placeholder="Un doute sur l'orthographe tapez quelques lettres..."></select>
                    <button onclick="return ficheCountry();">Go</button>
                </div>

                <div class="select">
                    <label for="selectByLang">Je cherche un <b>pays</b> dans lequel on parle le :  </label>
                    <select id="selectByLang" name ="selectByLang" placeholder="Langue" ></select> 
                </div>

                <div class="select">
                    <label for="selectByContForCountry">Je cherche un <b>pays</b> appartenant au contienent :  </label>
                    <select id="selectByContForCountry" name ="selectByContForCountry" placeholder="Continent" value="all">
                        <option value="*">All</option>
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
                    <label for="selectByPopuForCountry">Je cherche un <b>pays</b> ayant cette tranche de population : </label>
                    <select id="selectByPopuForCountry" name ="selectByPopuForCountry" placeholder="Population" value="all">
                        <option value="*"> All </option>
                        <option value="2000000"> moins de 2M </option>
                        <option value="5000000"> entre 5M et 10M</option>
                        <option value="10000000"> entre 10M et 50M </option>
                        <option value="50000000"> entre 50M et 100M </option>
                        <option value="100000000"> plus de 100M < </option>
                        <option value="800000000"> plus de 800M < </option>
                    </select>
                </div>

                <button onclick="return afficheRech1();">Filtrer</button>
                <p id="debugCtry"></p>

            </div>

            <!-----------------------------------------------City--------------------------------------------->

            <div id ="rechCity" class="searchBarNone" >

                <div class="select">
                    <label for="select-city">Je cherche une <b>ville</b></label>
                    <select id="select-city" name ="select-city" placeholder="Un doute sur l'orthographe tapez quelques lettres..."></select>
                    <button onclick="return ficheCity();">Go</button>
                </div>

                <div class="select">
                    <label for="selectByContForCity">Je cherche les <b>villes</b> appartenant au contienent :  </label>
                    <select id="selectByContForCity" name ="selectByContForCity" placeholder="Continent" value="all">
                        <option value="*">All</option>
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
                    <label for="selectByPopuForCity">Je cherche les <b>villes</b>  ayant cette tranche de population : </label>
                    <select id="selectByPopuForCity" name ="selectByPopuForCity" placeholder="Population" value="all">
                        <option value="*"> All </option>
                        <option value="200000"> moins de 200k </option>
                        <option value="500000"> entre 500k et 1M</option>
                        <option value="1000000"> entre 1M et 5M </option>
                        <option value="5000000"> entre 1M et 5M </option>
                        <option value="10000000"> plus de 10M < </option>
                    </select>
                </div>

                <div class="select">
                    <label for="selectByCoun">Je cherche la capitale de ce pays : </label> 
                    <select id="selectByCoun" name ="selectByCoun" placeholder="Pays"></select>                   
                </div>

                <button onclick="return afficheRech2();">Filtrer</button>
                <p id="debugCity">debug : </p>

            </div>

            <!-----------------------------------------------Langue----------------------------------------------->

            <div id ="rechLangue" class="searchBarNone">
                
                <div class="select">
                    <label for="select-language">Je cherche une <b>langue</b></label>
                    <select id="select-language" name ="select-language" placeholder="Un doute sur l'orthographe tapez quelques lettres..."></select>
                    <button onclick="return ficheLang();">Go</button>
                </div>

                <div class="select">
                    <label for="selectByContForLang">Je cherche les <b>Langues</b> parlées dans ce contienent :  </label>
                    <select id="selectByContForLang" name ="selectByContForLang" placeholder="Continent" value="all">
                        <option value="*">All</option>
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
                    <label for="selectByOff">Je cherche toutes les <b>Langues</b>  officiels : </label>
                    <select id="selectByOff" name ="selectByOff" placeholder="Officiels" value="all">
                        <option value="*">All</option>
                        <option value="T">True</option>
                        <option value="F">False</option>
                    </select>
                </div>

                <div class="select">
                    <label for="selectByCoun">Je cherche les <b>Langues</b> parlées dans ce pays :  </label> 
                    <select id="selectByCoun" name ="selectByCoun" placeholder="Pays"></select>                   
                </div>

                <button onclick="return afficheRech3();">Filtrer</button>
                <p id="debugLg"></p>

            </div>

            <!-------------------------------------------------------------------------------------------->

            <?= $content ?>    
            
            <footer>
                <p>par Sophien ABABSSI </p>
            </footer>

            <script src="app.js"></script>
    </body>

</html>