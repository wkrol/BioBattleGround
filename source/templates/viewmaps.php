<?php
session_start();
require("strona.php");
// Include the main Propel script
require_once '../../vendor/propel/runtime/lib/Propel.php';

// Initialize Propel with the runtime configuration
Propel::init("../../build/conf/biobattleground-conf.php");

// Add the generated 'classes' directory to the include path
set_include_path("../../build/classes" . PATH_SEPARATOR . get_include_path());
	class PrzegladKlimatow extends Strona {
	
	public function WyswietlZawartosc() {
		
		echo "Mapy stworzone przez użytkownika ".$_SESSION["zalogowany"].":</br>";
		$c = new Criteria();
		$c->addJoin(MapPeer::ID, UserPrivilegesPeer::ID_MAP);
		$c->add(UserPrivilegesPeer::ID_USER, $_SESSION["user_id"]);
		//TODO: sprawdzanie czy może wyświetlić mapę na podstawie parametru 'play' w UP
		$maps = MapPeer::doSelect($c);
		
		foreach($maps as $map)
		{
			echo '<b>Nazwa</b>: '.$map->getName().' <br/>';
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