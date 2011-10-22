<?php
session_start();
	require("strona.php");
	class WyswietlanieUzytkownikow extends Strona {
	
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
	
	public function Uzytkownicy() {
		$wynik = $this -> Lacz()->query("select * from uzytkownicy");
		if (!$wynik) {
			throw new Exception('Wysiwetlenie newsa jest niemożliwe.');
		}

		return $wynik;
	}
	
	public function WyswietlZawartosc() {
		$stmt=$this -> Uzytkownicy();
		foreach($stmt as $row)
		{
			echo '<b>Nazwa</b>: '.$row['nazwa'].' | <a href="profil.php?id='.$row['nazwa'].'">Zobacz profil użytkownika.</a><br/>';
		} 
	}
	
	}
	$strona = new WyswietlanieUzytkownikow();
	$strona -> nazwadzialu = "Administracja";
	$strona -> przyciski = array("Startowa"   => "admin.php",
						"Wyświetl użytkowników"   => "viewusers.php",
						"Dodaj użytkownika"   => "addusers.php",
						"Zarządzaj użytkownikami"   => "adminusers.php"
                        );
	$strona -> Wyswietl();
?>