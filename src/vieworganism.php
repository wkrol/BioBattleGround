<?php
session_start();
	require("strona.php");
	class PrzegladOrganizmow extends Strona {
	
	public function Lacz() {
		try
		{
			$pdo = new PDO('mysql:host=localhost;dbname=biobattleground', 'root', '');
			$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;
		}
		catch(PDOException $e)
		{
			echo 'Połączenie nie mogło zostać utworzone: ' . $e->getMessage();
		}
	}
	
	public function Organizmy() {
		$id_uzyt = $_SESSION["zalogowany"];
		$wynik = $this -> Lacz()->prepare("select * from organizm where id_uzyt = :id");
		$wynik->bindParam(':id', $id_uzyt, PDO::PARAM_STR);
		$wynik->execute();
		if (!$wynik) {
			throw new Exception('Wyświetlenie jest niemożliwe.');
		}

		return $wynik;
	}
	
	
	public function WyswietlZawartosc() {
		echo "Organizmy stworzone przez użytkownika ".$_SESSION["zalogowany"].":</br></br>";
		$stmt=$this -> Organizmy();
		foreach($stmt as $row)
		{
			if($row['typ'] == "Roslina") {
				$image = "roslina";
			}
			if($row['typ'] == "Roslinozerca") {
				$image = "roslinozerca";
			}
			if($row['typ'] == "Padlinozerca") {
				$image = "padlina";
			}
			if($row['typ'] == "Miesozerca") {
				$image = "mieso";
			}
			echo '<img src="images/organizmu/'.$image.'.png"> <b>Nazwa</b>: '.$row['nazwa'].' <b>Typ</b>: '.$row['typ'].' <b>Życie</b>: '.$row['hp'].' <b>Instynkt</b>: '.$row['instynkt'].' <b>Odporność</b>: '.$row['odpornosc'].' <br/>';
		} 
		
	}
	}
	$strona = new PrzegladOrganizmow();
	$strona -> nazwadzialu = "Organizmy";
	$strona -> przyciski = array("Startowa"   => "organizmy.php",
						"Wyświetl organizmy"   => "vieworganism.php",
						"Dodaj organizm"   => "addorganism.php"
                        );
	$strona -> Wyswietl();
	
		
?>