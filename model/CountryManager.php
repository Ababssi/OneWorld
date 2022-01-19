<?php
    class CountryManager extends Model
    {


        public function readCountry($tabAsso)
        {
            $this-> getBdd();
            $reqsql = $this->arrayToRequestForRead($tabAsso);
            return $this->getListObj('Country',$reqsql);
        }

        public function updateCountry($tabAsso)
        {
            $this-> getBdd();
            $idCode = array_shift($tabAsso);
            $reqsql = $this->arrayToRequestForUpdate($idCode, $tabAsso);
            $modificationFaiteBool = $this->execRequeteModel($reqsql);
            if($modificationFaiteBool)
            {
                return $this->getOne('country','Country', $idCode);
            }
            return false;
        }
        
        public function createCountry($tabAsso)
        {
            $this-> getBdd();
            $idCode = reset($tabAsso);
            $reqsql = $this->arrayToRequestForCreate($tabAsso);
            
            $creationFaiteBool = $this->execRequeteModel($reqsql);
            
            if($creationFaiteBool)
            {
                return $this->getOne('country','Country', $idCode);
            }
            return false;
        }
        
        public function deleteCountry($tabAsso)
        {
            $this-> getBdd();
            $idCode = reset($tabAsso);
            $reqsql = $this->arrayToRequestForDelete($tabAsso);
            
            $creationFaiteBool = $this->execRequeteModel($reqsql);
            
            if($creationFaiteBool)
            {
                return $this->getOne('country','Country', $idCode);
            }else
            return false;
        }
        
        // on assemble la requete SQL depuis une liste indéxée pour le READ
        private function arrayToRequestForRead($tabAsso)
        {
            $request = "SELECT DISTINCT country.* 
                        FROM `country`,`countrylanguage` 
                        WHERE country.Deleted = '0' 
                        AND country.Code = countrylanguage.CountryCode AND ";
            foreach ($tabAsso as $key => $value) {
                $request .= " ".$key."='".$value."' AND "; 
            }
            $request = substr($request, 0, -5);
            $request .= " ORDER BY country.NameCountry";

            return $request;
        }

        // on assemble la requete SQL depuis une liste indéxée pour le CREATE
        private function arrayToRequestForCreate($tabAsso)
        {
            $codePays = array_shift($tabAsso);
            $languePays = array_pop($tabAsso);
            $capitale = array_pop($tabAsso);
            $request = "INSERT INTO `country` (`Code`, `Population`, `LifeExpectancy`,`NameCountry`, `SurfaceArea`, `GovernmentForm`, `HeadOfState`, `Continent`, `IndepYear`) VALUES ('".$codePays."', ";
            foreach ($tabAsso as $key => $value) {
                $request .= "'".$value."', "; 
            }
            $request = substr($request, 0, -2);
            $request .= ");";
            $request .= " INSERT INTO `countrylanguage` (`CountryCode`, `Language`, `IsOfficial` ,`Percentage`) VALUES ('".$codePays."', '".$languePays."','T','');";

            return $request;
        }

        // on assemble la requete SQL depuis une liste indéxée pour le UPDATE
        private function arrayToRequestForUpdate($idCode, $tabAsso)
        {
            $request = "UPDATE country SET ";
            foreach ($tabAsso as $key => $value) {
                $request .= $key."='".$value."', "; 
            }
            $request = substr($request, 0, -2);
            $request .= " WHERE country.Code = '".$idCode."'";

            return $request;
        }

        // on assemble la requete SQL depuis une liste indéxée pour le DELETE
        private function arrayToRequestForDelete($tabAsso)
        {
            $id = reset($tabAsso);
            $request = "UPDATE country SET Deleted = '-1' WHERE country.Code = '".$id."'";
            return $request;
        }

        public function getListToManagerForJson()
        {
            $reqsql="SELECT country.Code,country.NameCountry,city.Name,country.Continent,
            country.Population,country.SurfaceArea FROM `country`,`city` 
            WHERE city.Id=country.Capital ORDER BY country.NameCountry";
            $this-> getBdd();
            return $this->getListToModelForJson('countryFulldataCapitalcityMainlanguage.json',$reqsql);
        }

    }
