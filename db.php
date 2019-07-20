<?php


class DB{
    protected static $pdo;
    public function __construct(){}

    public function connect(){
        $dsn="mysql:host=localhost;dbname=sell";
        try{
        self::$pdo = new PDO($dsn,"root","");
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        return self::$pdo;
        }catch(PDOException $ex){
            echo $ex->getMessage();
        }
        return false;
    }
    public function getConnection(){
        return self::$pdo;
    }

    public static function query($query,$params){
        $statement = self::connect()->prepare($query);
        $statement->execute($params);
        if(explode(' ',$query)[0] == 'SELECT'){
            $data = $statement->fetchAll();
            return $data;
        }
    }
}
?>