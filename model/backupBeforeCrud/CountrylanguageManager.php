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

        public function getLanguefree($reqsql)
        {

            $this-> getBdd();
            return $this->getListfree('Countrylanguage',$reqsql);
        }

        public function getListToManagerForJson($reqsql)
        {
            $this-> getBdd();
            return $this->getListToModelForJson('languageFulldataMaincountry.json',$reqsql);
        }
    }