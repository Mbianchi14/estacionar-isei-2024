<?php

class DataBase{
    //propiedades principales del objeto
    private static $host ='localhost';//a configurar
    private static $dbName =' '; //a configurar
    private static $dbUser ='root';//a configurar
    private static $dbPass ='';//a configurar
    private static $error;

    //constructor
    public function _construct(){
    }

    //método configuracion de conexiones
    private static function connection(){
        $dsn = "mysql:host=".self::$host.";dbname=".self::$dbName;
        $opc=array(PDO::ATTR_PERSISTENT => TRUE, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

        //instanciar pdo
        try {
            //dentro del try con 'new pdo' cree el primer objeto
            $conn=new PDO($dsn, self::$dbUser, self::$dbPass, $opc);
            //settear horario Argentino
            $conn->exec('SET  time_zone = "-03:00";');
            $conn->exec('SET @@session.time_zone = "-03:00";');  
            $conn->exec("set names utf8");
        } catch (PDOException $e){
            self::$error = $e->getMessage();
            return self::$error;
        }
        return $conn;
    }

    //metodo para ejecutar
    public static function ejecutar($sql, $params=[]){
        $statement = static::connection()->prepare($sql);
        
        try {
            $resultado = $statement->execute($params);
        } catch (PDOException $e){
            $resultado =$e->getMessage();
        }
        return $resultado;
    }
    //metodo para recuperar todos los registros
    public static function getRecords($sql, $params=[]){
        $statement = static::connection()->prepare($sql);
        try {
            $statement->execute($params);
            $resultado=$statement->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e){
            echo '<pre>';
            var_dump($e);
            echo '</pre>';
            $resultado=false;
        }
        return $resultado;
    }
    //metodo para recuperar un solo regitro
    public static function getRecord($sql, $params=[]){
        $statement = static::connection()->prepare($sql);
        try {
            $statement->execute($params);
            $resultado=$statement->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e){
            echo '<pre>';
            var_dump($e);
            echo '</pre>';
            $resultado=false;
        }
        return $resultado;
    }
}