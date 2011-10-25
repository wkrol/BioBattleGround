<?php
session_start();
	require("strona.php");
	class Mapy extends Strona {
	public function WyswietlZawartosc() {
		echo "Witamy!";
	}
	}
	$strona = new Mapy();
	$strona -> nazwadzialu = "Mapy";
	$strona -> przyciski = array("Startowa"   => "mapy.php",
						"Wyświetl mapy"   => "viewmaps.php",
						"Dodaj mapę"   => "addmap.php"
                        );
	$strona -> Wyswietl();
?>