<?php
session_start();
	require("strona.php");
	require("db2.php");
	class WyswietlanieUzytkownikow extends Strona {
	
	
	public function WyswietlZawartosc() {
		$db = new DB();
		$stmt=$db -> Uzytkownicy();
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