<?php
    class CountrylanguageManager extends Model
    {
        public function getCountrylanguage($crit)
        {
            $this-> getBdd();
            return $this->getAll('countrylanguage','Countrylanguage','Language', $crit);         
        }

        public function getOneAttlanguage($crit)
        {
            $this-> getBdd();
            return $this->getOne('countrylanguage','Countrylanguage', $crit);
        }

        public function getLanguefree($tabAsso)
        {
            $this-> getBdd();
            $reqsql = $this->arrayToRequestForView($tabAsso);
            return $this->getListfree('Countrylanguage',$reqsql);
        }

        //on assemble la requete SQL depuis une liste indéxée
        public static function arrayToRequestForView($tabAsso)
        {
            $request = "SELECT DISTINCT * FROM `countrylanguage`,`country` WHERE countrylanguage.CountryCode=country.Code  AND ";
            foreach ($tabAsso as $key => $value) {
                $request .= " ".$key."='".$value."' AND "; 
            }
            $request = substr($request, 0, -5);
            $request .= " ORDER BY countrylanguage.Language";
            return $request;
        }

        public function getListToManagerForJson()
        {
            $this-> getBdd();
            $reqsql = "SELECT countrylanguage.Language,countrylanguage.percentage,countrylanguage.IsOfficial,country.NameCountry,country.Code FROM `countrylanguage`,`country` WHERE countrylanguage.CountryCode=country.Code ";
            return $this->getListToModelForJson('languageFulldataMaincountry.json',$reqsql);
        }
    }
