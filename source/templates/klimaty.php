<?php
session_start();
	require("strona.php");
	class Klimaty extends Strona {
	public function WyswietlZawartosc() {
		echo "Witamy!";
	}
	}
	$strona = new Klimaty();
	$strona -> nazwadzialu = "Klimaty";
	$strona -> przyciski = array("Startowa"   => "klimaty.php",
						"Wyświetl klimaty"   => "viewclimate.php",
						"Dodaj klimat"   => "addclimate.php"
                        );
	$strona -> Wyswietl();
?>