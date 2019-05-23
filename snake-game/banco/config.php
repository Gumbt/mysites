<?php
class Database 
{
	private static $dbName = 'u90603881_lol' ; 
	private static $dbHost = 'mysql796.umbler.com' ;
	private static $dbUsername = 'u90603881_lol';
	private static $dbUserPassword = '1234567G';
	
	private static $cont  = null;
	
	public function __construct() 
	{
		exit('Init function is not allowed');//função de inicialização não é permitida
	}
	
	public static function connect()
	{
	   // uma conexão para toda a aplicação
       if ( null == self::$cont )
       {      
        //tratamento de exceção
        try 
        {
          self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword);  
          self::$cont->exec("set names utf8"); 
        }
        catch(PDOException $e) //atribui à variável $e as instruções do erro
        {
          die($e->getMessage());  //fecha a conexão e exibe a mensagem de erro
        }
       } 
       return self::$cont;
	}
	
	public static function disconnect()
	{
		self::$cont = null; //encerra a conexão com o banco
	}
}
?>