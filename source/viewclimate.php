<?php
session_start();
	require("strona.php");
	class PrzegladKlimatow extends Strona {
	
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
	
	public function Klimaty() {
		$id_uzyt = $_SESSION["zalogowany"];
		$wynik = $this -> Lacz()->prepare("select * from klimat where id_uzyt = :id");
		$wynik->bindParam(':id', $id_uzyt, PDO::PARAM_STR);
		$wynik->execute();
		if (!$wynik) {
			throw new Exception('Wyświetlenie jest niemożliwe.');
		}

		return $wynik;
	}
	
	
	public function WyswietlZawartosc() {
		echo "Klimaty stworzone przez użytkownika ".$_SESSION["zalogowany"].":</br></br>";
		$stmt=$this -> Klimaty();
		foreach($stmt as $row)
		{
			echo '<b>Nazwa</b>: '.$row['nazwa'].' <b>Wiatr</b>: '.$row['wiatr'].' <b>Opady</b>: '.$row['opady'].' <b>Nasłonecznienie</b>: '.$row['naslonecznienie'].' <br/>';
		} 
		
	}
	}
	$strona = new PrzegladKlimatow();
	$strona -> nazwadzialu = "Klimaty";
	$strona -> przyciski = array("Startowa"   => "klimaty.php",
						"Wyświetl klimaty"   => "viewclimate.php",
						"Dodaj klimat"   => "addclimate.php"
                        );
	$strona -> Wyswietl();
	
		
?>