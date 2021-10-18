<?php
abstract class Model
{
    private static $_bdd;
    private static function setBdd()
    {
        self::$_bdd = new PDO('mysql:host=45.87.80.205;dbname=u827284670_allCity;charset=utf8','u827284670_sophien','wdAReTU6666.');
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }
    protected function getBdd()
    {
        if(self::$_bdd == null)
            $this->setBdd();
        return self::$_bdd;
    }
    protected function getAll($table, $obj, $Id, $crit)
    {
        $var =[];
        $req =self::$_bdd->prepare('SELECT '.$crit.' FROM ' .$table.' ORDER BY '.$Id);
        $req->execute();
        while ($data =$req->fetch(PDO::FETCH_ASSOC))
        {
            $var[] = new $obj($data);  
        }
        return $var;
        $req->closeCursor();
    }
    protected function getOne($table, $obj, $crit)
    {
        $var =[];
        $req =self::$_bdd->prepare('SELECT DISTINCT '.$crit.' FROM ' .$table.' ORDER BY '.$crit);
        $req->execute();
        while ($data =$req->fetch(PDO::FETCH_ASSOC))
        {
            $var[] = new $obj($data);  
            
        }
        return $var;
        $req->closeCursor();
    }

    protected function getListfree($obj,$requeteSQL)
    {

        $var =[];
        $req =self::$_bdd->prepare($requeteSQL);
        $req->execute();
        while ($data =$req->fetch(PDO::FETCH_ASSOC))
        {
            $var[] = new $obj($data);  
        }
        return $var;
        $req->closeCursor();
    }

    protected function getListToModelForJson($jsonFile,$requeteSQL)
    {
        $tabData = array();
        $req =self::$_bdd->prepare($requeteSQL);
        $req->execute();
        while ($data =$req->fetch(PDO::FETCH_ASSOC))
        {
            $tabData[] = $data;
        }
        $jsonData = json_encode($tabData, JSON_FORCE_OBJECT);
        file_put_contents($jsonFile, $jsonData);
        $req->closeCursor();
    }
}