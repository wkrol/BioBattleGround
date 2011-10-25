<?php
session_start();
	require("strona.php");
	require("db2.php");
	class PrzegladKlimatow extends Strona {
	
	public function WyswietlZawartosc() {
		$db = new DB();
		echo "Klimaty stworzone przez użytkownika ".$_SESSION["zalogowany"].":</br></br>";
		$stmt=$db -> Klimaty();
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