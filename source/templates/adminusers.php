<?php
session_start();
	require("strona.php");

	class AdministracjaUzytkownikami extends Strona {	
	
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