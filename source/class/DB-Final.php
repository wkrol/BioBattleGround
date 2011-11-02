<?php
/*
 * INCLUDE BLOCK
 * Dla klas obiektów, których wartoœci pobierane bêd¹ z bazy
 */
include_once 'source/class/climate.php';
include_once 'source/class/organism.php';
include_once 'source/class/group.php';

/*
 * Klasa obs³uguj¹ca bazê danych
 */
class DB {
	
	/*
	 * Ustawienia po³¹czenia z baz¹ danych
	 */
	private $dbname = 'biobattleground';
	private $dbuser = 'root';
	private $dbpass = '';
	private $dbhost = 'localhost';
	
	private static $instance;
	
	/* TODO:
	 * funkcje do obs³ugi select - do przedyskutowania ;),
	 * insert i update
	 */
	private function __construct() {
		$connectionParams = 'mysql:host='.$this->dbhost.';dbname='.$this->dbname;
		try {
			// host, dbname, user, pass
			$this->db = new PDO($connectionParams, $this->dbuser, $this->dbpass);
			//return $db;
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
	
	public function login($username, $password) {
		$stmt = $this->db->prepare('select * from uzytkownicy where NAZWA = ? and HASLO = ?');
		try {
			$result->execute(array($username, $password));
		} catch (Exception $e) {
			throw new Exception('Wyst¹pi³ problem z baz¹ danych: '.$e->getMessage());
		}
		//TODO sprawdzenie czy jest user
		
	}
	
	/*
	 * Funkcja pobieraj¹ca z bazy odpowiednie dane, zwraca je ju¿ w postaci potrzebnego obiektu
	 */
	public function getObject($type, $id) {
		$stmt = $this->db->prepare('SELECT * FROM ? WHERE id = ?');
		$stmt->execute(array($type, $id));			//Tu IF albo TRY po testach
		
		$result = $stmt->fetch(PDO::FETCH_ASSOC);	//Zwraca tablicê asocjacyjn¹
		
		//Tworzenie odpowiedniego obiektu 
		switch ($type) {
			case 'group':
				//GROUP, czyli dawne STADO ma teraz zupe³nie inn¹ konstrukcjê, wiêc TODO: przedyskutowaæ na spotkaniu
				$object = new Group(
					$result[ID],
					$result[NAME]
					/*, $zagroda*/);
				break;
			case 'climate':
				//$nazwa, $deszcz, $wiatr, $naslonecznienie, $id = NULL
				$object = new Climate(
					$result[NAME],
					$result[RAIN],
					$result[WIND],
					$$result[SUN],
					$result[ID]);
				break;
			case 'organism':
				//TODO: type, stado? wiek, glod - brak w bazie
				$object = new Organism(
					$result[NAME],
					$result[VITALITY],
					$result[INSTINCT],
					$result[TOUGHNESS],
					$result[ID]);
				break;
			default:
				throw new Exception('Unknown action(wrong object type)');
				break;
		}
		return $object;
	}
	
	
	public function insertOrganism($name, $stat1, $stat2, $stat3, $type){
		$result=mysql_query("INSERT INTO organism(nazwa, hp, instynkt, odpornosc, typ) 
							 VALUES ('$name', '$stat1', '$stat2', '$stat3', '$type')");
	}
	
	public function insertClimate($name, $rain, $wind, $sun){
		$result=mysql_query("INSERT INTO climate(nazwa, opady, wiatr, naslonecznienie) VALUES ('$name', '$rain', '$wind', '$sun')");
	}
	
	public function insertMap($name, $string){
		$result=mysql_query("INSERT INTO map(nazwa, mapString) VALUES ('$name', '$string')");
	}
	
	public function deleteOrganism($name_id, $name_value ){
		mysql_query("DELETE FROM organism WHERE $name_id='$name_value'") or die("Wybrany organizm nie istnieje - ".mysql_error());
	}
	
	
}

?>