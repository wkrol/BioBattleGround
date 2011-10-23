<?php
session_start();
	require("strona.php");
	require("db2.php");
	class PrzegladOrganizmow extends Strona {
	
	
	public function WyswietlZawartosc() {
		$db = new DB();
		echo "Organizmy stworzone przez użytkownika ".$_SESSION["zalogowany"].":</br></br>";
		$stmt=$db -> OrganizmyAll();
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