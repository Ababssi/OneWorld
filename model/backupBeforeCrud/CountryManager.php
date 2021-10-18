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

        public function getCountfree($reqsql)
        {
            $this-> getBdd();
            return $this->getListfree('Country',$reqsql);
        }
        
        public function getListToManagerForJson($reqsql)
        {
            $this-> getBdd();
            return $this->getListToModelForJson('countryFulldataCapitalcityMainlanguage.json',$reqsql);
        }

    }