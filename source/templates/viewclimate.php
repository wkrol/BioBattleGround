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
	
		echo "Klimaty stworzone przez użytkownika ".$_SESSION["zalogowany"].":</br></br>";
		$c = new Criteria();
		$c->addJoin(ClimatePeer::ID, UserPrivilegesPeer::ID_CLIMATE);
		$c->add(UserPrivilegesPeer::ID_USER, $_SESSION["user_id"]);
		//TODO: sprawdzanie czy może wyświetlić klimat na podstawie parametru 'play' w UP
		$climates = ClimatePeer::doSelect($c);
		
		foreach($climates as $climate)
		{
			echo '<b>Nazwa</b>: '.$climate->getName().' <b>Wiatr</b>: '.$climate->getWind().' <b>Opady</b>: '.$climate->getRain().' <b>Nasłonecznienie</b>: '.$climate->getSun().' <br/>';
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