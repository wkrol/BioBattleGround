<?php
session_start();
	require("strona.php");
	require("db2.php");
	class PrzegladKlimatow extends Strona {
	
	public function WyswietlZawartosc() {
		$db = new DB();
		echo "Mapy stworzone przez użytkownika ".$_SESSION["zalogowany"].":</br>";
		$stmt=$db -> Mapy();
		foreach($stmt as $row)
		{
			echo '<b>Nazwa</b>: '.$row['nazwa'].' <br/>';
		} 
		
	}
	}
	$strona = new PrzegladKlimatow();
	$strona -> nazwadzialu = "Mapy";
	$strona -> przyciski = array("Startowa"   => "mapy.php",
						"Wyświetl mapy"   => "viewmaps.php",
						"Dodaj mapę"   => "addmap.php"
                        );
	$strona -> Wyswietl();	
?>