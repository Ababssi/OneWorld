<?php
    class CountryManager extends Model
    {
        public function getCountry($crit)
        {
            $this-> getBdd();
            return $this->getAll('country','Country','Code', $crit);
        }

        public function getOneAttCountry($crit)
        {
            $this-> getBdd();
            return $this->getOne('country','Country', $crit);
        }

        public function getCountfree($tabAsso)
        {
            $this-> getBdd();
            $reqsql = $this->arrayToRequestForView($tabAsso);
            return $this->getListfree('Country',$reqsql);
        }
        
        // on assemble la requete SQL depuis une liste indéxée
        public static function arrayToRequestForView($tabAsso)
        {
            $request = "SELECT DISTINCT country.* FROM `country`,`countrylanguage` WHERE country.Code = countrylanguage.CountryCode AND ";
            foreach ($tabAsso as $key => $value) {
                $request .= " ".$key."='".$value."' AND "; 
            }
            $request = substr($request, 0, -5);
            $request .= " ORDER BY country.NameCountry";
            return $request;
        }

        public function getListToManagerForJson()
        {
            $reqsql="SELECT country.Code,country.NameCountry,city.Name,country.Continent,country.Population,country.SurfaceArea FROM `country`,`city` WHERE city.Id=country.Capital ORDER BY country.NameCountry";
            $this-> getBdd();
            return $this->getListToModelForJson('countryFulldataCapitalcityMainlanguage.json',$reqsql);
        }

    }
