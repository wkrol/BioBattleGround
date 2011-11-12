<?php
session_start();
	require("strona.php");
	class Administracja extends Strona {
	public function WyswietlZawartosc() {
		echo "Witamy! Znajdujesz się w panelu administratora. Możesz zarządzać użytkownikowi, zmieniać hasła i role, oraz tworzyć konta.";
	}
	}
	$strona = new Administracja();
	$strona -> nazwadzialu = "Administracja";
	$strona -> przyciski = array("Startowa"   => "admin.php",
						"Wyświetl użytkowników"   => "viewusers.php",
						"Dodaj użytkownika"   => "addusers.php",
                        );
	$strona -> Wyswietl();
?>