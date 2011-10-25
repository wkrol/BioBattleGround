<?php
session_start();
	require("strona.php");
	class Organizm extends Strona {
	public function WyswietlZawartosc() {
		echo "Witamy!";
	}
	}
	$strona = new Organizm();
	$strona -> nazwadzialu = "Organizmy";
	$strona -> przyciski = array("Startowa"   => "organizmy.php",
						"Wyświetl organizmy"   => "vieworganism.php",
						"Dodaj organizm"   => "addorganism.php"
                        );
	$strona -> Wyswietl();
?>