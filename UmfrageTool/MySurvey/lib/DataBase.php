<?php
namespace MySurvey\lib;
require_once('conf.php');
/*
 * Aspekt fuer 
 *	Datenbank-Kommunikation
 */
trait DataBase{
	private static $connection=null;
	
	private static function connect(){
		$conf=conf();
		$conn=$conf['driver'].':host='.$conf['host'].';dbname='.$conf['database'];
		self::$connection = self::$connection ?: new \PDO($conn, $conf['user'], $conf['pass']);
	}
	
	public static function query($sql){
		$arr=null;
		try {
			self::connect();
			$arr=self::$connection->query($sql)->fetchAll();
		} catch (\PDOException $e) {
			error_log( 'Database Error: ' . $e->getMessage());
		}
		return $arr;
	}
	
}
//TODO:
//Autoloading
//SESSIONS
?>