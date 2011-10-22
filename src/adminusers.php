<?php
session_start();
	require("strona.php");
	class AdministracjaUzytkownikami extends Strona {
	
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
	
	public function Edytuj_profil($nazwa, $haslo, $imie, $opis) {

  
		$wynik = lacz()->prepare("update uzytkownik set haslo = md5(:haslo), imie = :imie, opis = :opis where nazwa = :nazwa");
		$wynik->bindParam(':nazwa', $nazwa, PDO::PARAM_STR);
		$wynik->bindParam(':haslo', $haslo, PDO::PARAM_STR);
		$wynik->bindParam(':imie', $imie, PDO::PARAM_STR);
		$wynik->bindParam(':opis', $opis, PDO::PARAM_STR);
		$wynik->execute();
		if (!$wynik) {
			throw new Exception('Rejestracja w bazie danych niemożliwa — proszę spróbować później.');
		}

		return true;
	}
	
	
	
	public function WyswietlZawartosc() {
		echo "Opcja czasowo niedostępna";
	}
	}
	$strona = new AdministracjaUzytkownikami();
	$strona -> nazwadzialu = "Administracja";
	$strona -> przyciski = array("Startowa"   => "admin.php",
						"Wyświetl użytkowników"   => "viewusers.php",
						"Dodaj użytkownika"   => "addusers.php",
						"Zarządzaj użytkownikami"   => "adminusers.php"
                        );
	$strona -> Wyswietl();
?>