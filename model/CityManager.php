<?php
    class CityManager extends Model
    {

        public function getCity($crit)
        {
            $this-> getBdd();
            return $this->getAll('city','City','CityCode', $crit);
        }

        public function getOneAttCity($crit)
        {
            $this-> getBdd();
            return $this->getOne('city','City', $crit);
        }

        public function getCityfree($tabAsso)
        {
            $this-> getBdd();
            $reqsql = $this->arrayToRequestForView($tabAsso);
            return $this->getListfree('City',$reqsql);
        }

        //on assemble la requete SQL depuis une liste indéxée
        public static function arrayToRequestForView($tabAsso)
        {
            $request = "SELECT DISTINCT city.* ,country.* FROM `country`,`city` WHERE country.Code = city.CountryCode AND ";
            foreach ($tabAsso as $key => $value) {
                $request .= " ".$key."='".$value."' AND "; 
            }
            $request = substr($request, 0, -5);
            $request .= " ORDER BY city.Name";
            return $request;
        }

        public function getListToManagerForJson()
        {
            $reqsql="SELECT DISTINCT city.Id,city.Name,city.Population,city.IsCapital,country.NameCountry,country.Code FROM `city`,`country` WHERE city.CountryCode=country.Code";
            $this-> getBdd();
            return $this->getListToModelForJson('countryFulldataCapitalcityMainlanguage.json',$reqsql);
        }

    }