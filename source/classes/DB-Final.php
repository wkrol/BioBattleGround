<?php
/*
 * INCLUDE BLOCK
 * Dla klas obiektów, których wartości pobierane będą z bazy
 */
include_once 'source/classes/climate.php';
include_once 'source/classes/organism.php';
include_once 'source/classes/group.php';

/**
 * Klasa obsługująca bazę danych
 * TODO: byćmoże lepiej będzie oddzielić funkcje dot. user od funkcji symulacji
 */
class DB {
	
	/*
	 * Ustawienia połączenia z bazą danych
	 */
	private $dbname = 'biobattleground';
	private $dbuser = 'root';
	private $dbpass = '';
	private $dbhost = 'localhost';
	
	private static $instance;
	
	/* TODO:
	 * funkcje do obsługi select - do przedyskutowania ;)
	 * insert i update
	 */
	private function __construct() {
		$connectionParams = 'mysql:host='.$this->dbhost.';dbname='.$this->dbname;
		try {
			// host, dbname, user, pass
			$this->db = new PDO($connectionParams, $this->dbuser, $this->dbpass);
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
		return $this->db;
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
			$stmt->execute(array($username, $password));
		} catch (Exception $e) {
			throw new Exception('Wystąpił problem z bazą danych: '.$e->getMessage());
		}
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		if (!isset($result[ID])) {
			throw new Exception('Nie udało się zalogować');
		} else {
			return TRUE;
		}
	}
	
	//TODO: ciało funkcji
	public function register($username, $password, $description, $master, $admin) {
	}
	
	//TODO: ciało funkcji
	public function editUser($id) {
	}
	
	/*
	 * Funkcja pobierająca z bazy odpowiednie dane, zwraca je już w postaci potrzebnego obiektu
	 */
	public function getObject($type, $id) {
		$stmt = $this->db->prepare('SELECT * FROM ? WHERE id = ?');
		$stmt->execute(array($type, $id));			//Tu IF albo TRY po testach
		
		$result = $stmt->fetch(PDO::FETCH_ASSOC);	//Zwraca tablicę asocjacyjną
		
		//Tworzenie odpowiedniego obiektu 
		switch ($type) {
			case 'group':
				//GROUP, czyli dawne STADO ma teraz zupełnie inną konstrukcję, więc TODO: przedyskutować na spotkaniu
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
	
	
	public function insertOrganism($organism, $userid){
		$stmt = $this->db->prepare('INSERT INTO organism(name, instinct, toughness, vitality, type)
									VALUES (:name, :stat1, :stat2, :stat3, :type, :id)');
		$wynik->execute(array($organism->getNazwa,
							  $organism->getNazwa));
		if (!$wynik) {
			throw new Exception('Wykonanie zapytania nie powiodło się.');
		}
	}
	
	public function insertClimate($name, $rain, $wind, $sun, $id){
		$wynik = $this -> Lacz()->prepare("INSERT INTO climate(nazwa, opady, wiatr, naslonecznienie, id_uzyt) VALUES (:name, :rain, :wind, :sun, :id)");
		$wynik->bindParam(':name', $name, PDO::PARAM_STR);
		$wynik->bindParam(':rain', $rain, PDO::PARAM_INT);
		$wynik->bindParam(':wind', $wind, PDO::PARAM_INT);
		$wynik->bindParam(':sun', $sun, PDO::PARAM_INT);
		$wynik->bindParam(':id', $id, PDO::PARAM_INT);
		$wynik->execute();
		if (!$wynik) {
			throw new Exception('Wykonanie zapytania nie powiodło się.');
		}
	}
	
	public function insertMap($name, $string, $id){
		$wynik = $this -> Lacz()->prepare("INSERT INTO map(nazwa, mapString, id_uzyt) VALUES (:name, :string, :id)");
		$wynik->bindParam(':name', $name, PDO::PARAM_STR);
		$wynik->bindParam(':string', $string, PDO::PARAM_STR);
		$wynik->bindParam(':id', $id, PDO::PARAM_STR);
		$wynik->execute();
		if (!$wynik) {
			throw new Exception('Wykonanie zapytania nie powiodło się.');
		}
	}
	
	public function deleteOrganism($name_id, $name_value ){
		mysql_query("DELETE FROM organism WHERE $name_id='$name_value'") or die("Wybrany organizm nie istnieje - ".mysql_error());
	}
	
	public function Klimaty() {
		$id_uzyt = $_SESSION["zalogowany"];
		$wynik = $this -> Lacz()->prepare("select * from climate where id_uzyt = :id");
		$wynik->bindParam(':id', $id_uzyt, PDO::PARAM_STR);
		$wynik->execute();
		if (!$wynik) {
			throw new Exception('Wyświetlenie jest niemożliwe.');
		}
	
		return $wynik;
	}
	
	public function Mapy() {
		$id_uzyt = $_SESSION["zalogowany"];
		$wynik = $this -> Lacz()->prepare("select * from map where id_uzyt = :id");
		$wynik->bindParam(':id', $id_uzyt, PDO::PARAM_STR);
		$wynik->execute();
		if (!$wynik) {
			throw new Exception('Wyświetlenie jest niemożliwe.');
		}
	
		return $wynik;
	}
	
	public function Organizmy($gatunek) {
		$id_uzyt = $_SESSION["zalogowany"];
		$wynik = $this -> Lacz()->prepare("select * from organism where id_uzyt = :id and typ = :gatunek");
		$wynik->bindParam(':id', $id_uzyt, PDO::PARAM_STR);
		$wynik->bindParam(':gatunek', $gatunek, PDO::PARAM_STR);
		$wynik->execute();
		if (!$wynik) {
			throw new Exception('Wyświetlenie jest niemożliwe.');
		}
	
		return $wynik;
	}
	
	public function OrganizmyAll() {
		$id_uzyt = $_SESSION["zalogowany"];
		$wynik = $this -> Lacz()->prepare("select * from organism where id_uzyt = :id");
		$wynik->bindParam(':id', $id_uzyt, PDO::PARAM_STR);
		$wynik->execute();
		if (!$wynik) {
			throw new Exception('Wyświetlenie jest niemożliwe.');
		}
	
		return $wynik;
	}
	
	public function Uzytkownicy() {
		$wynik = $this -> Lacz()->query("select * from uzytkownicy");
		if (!$wynik) {
			throw new Exception('Wysiwetlenie newsa jest niemożliwe.');
		}
	
		return $wynik;
	}
	
	
}

?>