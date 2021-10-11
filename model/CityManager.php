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

        public function getCityfree($reqsql)
        {
            $this-> getBdd();
            return $this->getListfree('City',$reqsql);
        }

        public function getListToManagerForJson($reqsql)
        {
            $this-> getBdd();
            return $this->getListToModelForJson('cityFulldataCountryName.json',$reqsql);
        }
    }