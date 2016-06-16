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
	
		public static function createsurveytbl($survey_id){
		try {
			self::connect();
			self::$connection->prepare("create table survey_ (
						id int NOT NULL AUTO_INCREMENT,
						Question text,
						Answer_1 text,
						Answer_2 text,
						Answer_3 text,
						Answer_4 text)");
		} catch (\PDOException $e) {
			error_log( 'Database Error: ' . $e->getMessage());
		}
	}
	
}
//TODO:
//Autoloading
//SESSIONS
?>