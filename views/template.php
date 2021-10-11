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

            <h3>Some tips about a </h3>
        <main id="accueil">
            <section class="navGrid">
                <a class="navCell cell1" id="cardcity" href="http://oneworld.cyberdevweb.fr/index.php?url=city">Une ville</a>
                <a class="navCell cell2" id="cardcoun" href="http://oneworld.cyberdevweb.fr/index.php?url=country">Un pays</a>
                <a class="navCell cell3" id="cardlang" href="http://oneworld.cyberdevweb.fr/index.php?url=countrylanguage">Une langue</a>
            </section>

            <section class="rech">
            <!-----------------------------------------------Country------------------------------------------------>
                <div id ="rechCountry" class="searchBarNone" >

                    <div class="select">
                        <label for="select-country">Un Pays</b></label>
                        <select id="select-country" name ="select-country" placeholder="Un doute ? sur l'orthographe tapez quelques lettres..."></select>
                        <button onclick="return ficheCountry();">Go</button>
                    </div>

                    <div class="select">
                        <label for="selectByLang">Par Langue</label>
                        <select id="selectByLang" name ="selectByLang" placeholder="Langue" ></select> 
                    </div>

                    <div class="select">
                        <label for="selectByContForCountry">Par Pays</label>
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
                        <label for="selectByPopuForCountry">Par Population</label>
                        <select id="selectByPopuForCountry" name ="selectByPopuForCountry" placeholder="Population" value="all">
                            <option value="*"> All </option>
                            <option value="2000000"> plus de 2M </option>
                            <option value="5000000"> plus de 10M</option>
                            <option value="10000000"> plus de 50M </option>
                            <option value="50000000"> plus de 100M </option>
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
                        <label for="select-city">Une <b>Ville</b></label>
                        <select id="select-city" name ="select-city" placeholder="Un doute sur l'orthographe tapez quelques lettres..."></select>
                        <button onclick="return ficheCity();">Go</button>
                    </div>

                    <div class="select">
                        <label for="selectByContForCity">Par <b>Villes</b> </label>
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
                        <label for="selectByPopuForCity">Par Population </label>
                        <select id="selectByPopuForCity" name ="selectByPopuForCity" placeholder="Population" value="all">
                            <option value="*"> All </option>
                            <option value="200000"> plus de 200k </option>
                            <option value="500000"> plus de 1M</option>
                            <option value="1000000"> plus de 5M </option>
                            <option value="5000000"> plus de 5M </option>
                            <option value="10000000"> plus de 10M < </option>
                        </select>
                    </div>

                    <div class="select">
                        <label for="selectByCoun">Capitale de </label> 
                        <select id="selectByCoun" name ="selectByCoun" placeholder="Pays"></select>                   
                    </div>

                    <button onclick="return afficheRech2();">Filtrer</button>
                    <p id="debugCity"></p>

                </div>
                <!-----------------------------------------------Langue----------------------------------------------->
                <div id ="rechLangue" class="searchBarNone">
                
                    <div class="select">
                        <label for="select-language">Une <b>langue</b></label>
                        <select id="select-language" name ="select-language" placeholder="Un doute sur l'orthographe tapez quelques lettres..."></select>
                        <button onclick="return ficheLang();">Go</button>
                    </div>

                    <div class="select">
                        <label for="selectByContForLang">Par Continent</label>
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
                        <label for="selectByOff">Officiels</label>
                        <select id="selectByOff" name ="selectByOff" placeholder="Officiels" value="all">
                            <option value="*">All</option>
                            <option value="T">True</option>
                            <option value="F">False</option>
                        </select>
                    </div>

                    <div class="select">
                        <label for="selectByCoun2">En </label> 
                        <select id="selectByCoun2" name ="selectByCoun2" placeholder="Pays"></select>                   
                    </div>

                    <button onclick="return afficheRech3();">Filtrer</button>
                    <p id="debugLg"></p>

                </div>
            </section>
        </main>
            <!-------------------------------------------------------------------------------------------->
            <?= $content ?>               
            <footer>
            <a href="mailto:votreadresse@mail.fr">Sophien ABABSSI</a>
            </footer>
            <script src="app.js"></script>
    </body>
</html>