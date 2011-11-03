 <?php
 class DB {
 public function Lacz() {
		try
		{
			$pdo = new PDO('mysql:host=localhost;dbname=biobattleground', 'root', '');
			$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;
		}
		catch(PDOException $e)
		{
			echo 'Po³¹czenie nie mog³o zostaæ utworzone: ' . $e->getMessage();
		}
	}
	
	public function Loguj($nazwa_uz, $haslo) {


		$wynik = $this -> Lacz()->prepare("select * from uzytkownicy where NAZWA = :nazwa and HASLO = :haslo");
			$wynik->bindParam(':nazwa', $nazwa_uz, PDO::PARAM_STR);
			$wynik->bindParam(':haslo', $haslo, PDO::PARAM_STR);
			$wynik->execute();
			if (!$wynik) {
				throw new Exception('Logowanie nie powiod³o siê.');
			}
		$count = $wynik->fetchColumn();
		if ($count>0) {
				return true;
		}else {
			throw new Exception('Logowanie nie powiod³o siê.');
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
			throw new Exception('Wykonanie zapytania nie powiod³o siê.');
		}
	}
 public function insertMap($name, $string, $id){
		$wynik = $this -> Lacz()->prepare("INSERT INTO map(nazwa, mapString, id_uzyt) VALUES (:name, :string, :id)");
		$wynik->bindParam(':name', $name, PDO::PARAM_STR);
		$wynik->bindParam(':string', $string, PDO::PARAM_STR);
		$wynik->bindParam(':id', $id, PDO::PARAM_STR);
		$wynik->execute();
		if (!$wynik) {
			throw new Exception('Wykonanie zapytania nie powiod³o siê.');
		}
	}
	
 public function insertOrganism($name, $stat1, $stat2, $stat3, $type, $id){
		$wynik = $this -> Lacz()->prepare("INSERT INTO organism(nazwa, hp, instynkt, odpornosc, typ, id_uzyt) VALUES (:name, :stat1, :stat2, :stat3, :type, :id)");
		$wynik->bindParam(':name', $name, PDO::PARAM_STR);
		$wynik->bindParam(':stat1', $stat1, PDO::PARAM_INT);
		$wynik->bindParam(':stat2', $stat2, PDO::PARAM_INT);
		$wynik->bindParam(':stat3', $stat3, PDO::PARAM_INT);
		$wynik->bindParam(':type', $type, PDO::PARAM_STR);
		$wynik->bindParam(':id', $id, PDO::PARAM_STR);
		$wynik->execute();
		if (!$wynik) {
			throw new Exception('Wykonanie zapytania nie powiod³o siê.');
		}
	}
 public function Rejestruj($nazwa_uz, $haslo, $opis, $mistrz, $admin) {

		$wynik = $this -> Lacz()->prepare("select * from uzytkownicy where NAZWA = :nazwa");
		$wynik->bindParam(':nazwa', $nazwa_uz, PDO::PARAM_STR);
		$wynik->execute();
		if (!$wynik) {
			throw new Exception('Wykonanie zapytania nie powiod³o siê.');
		}

		$count = $wynik->fetchColumn();
		if ($count>0) {
			throw new Exception('Nazwa u¿ytkownika zajêta — proszê wróciæ i wybraæ inn¹.');
		}
		
		/* TODO: hashowanie hase³
		 * $hash = md5('i_like_salt'.sha256($password.$register_time).'very_long_salt');
		 */

		$wynik = $this -> Lacz()->prepare("insert into uzytkownicy (nazwa, haslo, opis, mistrz, admin) values
                       (:nazwa, :haslo, :opis, :mistrz, :admin)");
		$wynik->bindParam(':nazwa', $nazwa_uz, PDO::PARAM_STR);
		$wynik->bindParam(':haslo', $haslo, PDO::PARAM_STR);
		$wynik->bindParam(':opis', $opis, PDO::PARAM_STR);
		$wynik->bindParam(':mistrz', $mistrz, PDO::PARAM_STR);
		$wynik->bindParam(':admin', $admin, PDO::PARAM_STR);
	
		$wynik->execute();
		if (!$wynik) {
			throw new Exception('Rejestracja w bazie danych niemo¿liwa — proszê spróbowaæ póŸniej.');
		}

		return true;
	}
	
 public function Edytuj_profil($nazwa, $haslo, $imie, $opis) {

  
		$wynik = lacz()->prepare("update uzytkownik set haslo = md5(:haslo), imie = :imie, opis = :opis where nazwa = :nazwa");
		$wynik->bindParam(':nazwa', $nazwa, PDO::PARAM_STR);
		$wynik->bindParam(':haslo', $haslo, PDO::PARAM_STR);
		$wynik->bindParam(':imie', $imie, PDO::PARAM_STR);
		$wynik->bindParam(':opis', $opis, PDO::PARAM_STR);
		$wynik->execute();
		if (!$wynik) {
			throw new Exception('Rejestracja w bazie danych niemo¿liwa — proszê spróbowaæ póŸniej.');
		}

		return true;
	}
	
 public function Klimaty() {
		$id_uzyt = $_SESSION["zalogowany"];
		$wynik = $this -> Lacz()->prepare("select * from climate where id_uzyt = :id");
		$wynik->bindParam(':id', $id_uzyt, PDO::PARAM_STR);
		$wynik->execute();
		if (!$wynik) {
			throw new Exception('Wyœwietlenie jest niemo¿liwe.');
		}

		return $wynik;
	}
	
	public function Mapy() {
		$id_uzyt = $_SESSION["zalogowany"];
		$wynik = $this -> Lacz()->prepare("select * from map where id_uzyt = :id");
		$wynik->bindParam(':id', $id_uzyt, PDO::PARAM_STR);
		$wynik->execute();
		if (!$wynik) {
			throw new Exception('Wyœwietlenie jest niemo¿liwe.');
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
			throw new Exception('Wyœwietlenie jest niemo¿liwe.');
		}

		return $wynik;
	}
	public function OrganizmyAll() {
		$id_uzyt = $_SESSION["zalogowany"];
		$wynik = $this -> Lacz()->prepare("select * from organism where id_uzyt = :id");
		$wynik->bindParam(':id', $id_uzyt, PDO::PARAM_STR);
		$wynik->execute();
		if (!$wynik) {
			throw new Exception('Wyœwietlenie jest niemo¿liwe.');
		}

		return $wynik;
	}
 public function Uzytkownicy() {
		$wynik = $this -> Lacz()->query("select * from uzytkownicy");
		if (!$wynik) {
			throw new Exception('Wysiwetlenie newsa jest niemo¿liwe.');
		}

		return $wynik;
	}
 }	
?>