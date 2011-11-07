<?php
session_start();
require("strona.php");
// Include the main Propel script
require_once '../../vendor/propel/runtime/lib/Propel.php';

// Initialize Propel with the runtime configuration
Propel::init("../../build/conf/biobattleground-conf.php");

// Add the generated 'classes' directory to the include path
set_include_path("../../build/classes" . PATH_SEPARATOR . get_include_path());

	class WyswietlanieUzytkownikow extends Strona {
	
	
	public function WyswietlZawartosc() {
		
		$users =  UserPeer::doSelect(new Criteria());
		foreach($users as $user)
		{
			echo '<b>Nazwa</b>: '.$user->getName().' | <a href="profil.php?id='.$user->getName().'">Zobacz profil użytkownika.</a><br/>';
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