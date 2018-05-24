<?php
class DB{
	static private $_instance;
	static private $_config=array('dsn'=>'mysql:host=localhost;dbname=pm;charset=utf8','user'=>'root','passwd'=>'123456');
    static private $_dbSource;
	private function __construct(){
		
	}

    public static function getInstance(){
	    if (!self::$_instance instanceof self){
	        self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function getDB(){
        if (!self::$_dbSource){
           try{
               self::$_dbSource = new PDO(self::$_config['dsn'],self::$_config['user'],self::$_config['passwd']);
               self::$_dbSource->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
               self::$_dbSource->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
           }catch (PDOException $e){
               die("数据库连接出错： ".$e->getMessage());
           }
        }
        return self::$_dbSource;
    }
}
