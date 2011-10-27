<?php
class DB {
	
	private $dbname = 'biobattleground';
	private $dbuser = 'root';
	private $dbpass = '';
	private $dbhost = 'localhost';
	
	private static $instance;
	
	/* TODO: 
	 * Konstruktor, po³¹czenie z baz¹ - DONE+singleton,
	 * funkcje do obs³ugi select - do przedyskutowania ;),
	 * insert i update
	 */
	private function __construct() {
		$connectionParams = 'mysql:host='.$this->dbhost.';dbname='.$this->dbname;
		try {
			// host, dbname, user, pass
			$this->$db = new PDO($connectionParams, $this->dbuser, $this->dbpass);
			//return
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
	}
	
	public static function getInstance(){
		if(!isset($instance)) {
			$instance = new DB();
		}
		return $instance;
	}
	
}

?>