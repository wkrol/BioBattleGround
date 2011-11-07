<?php
session_start();

require("strona.php");
// Include the main Propel script
require_once '../../vendor/propel/runtime/lib/Propel.php';

// Initialize Propel with the runtime configuration
Propel::init("../../build/conf/biobattleground-conf.php");

// Add the generated 'classes' directory to the include path
set_include_path("../../build/classes" . PATH_SEPARATOR . get_include_path());

	class PrzegladOrganizmow extends Strona {
	
	
	public function WyswietlZawartosc() {
		
		echo "Organizmy stworzone przez użytkownika ".$_SESSION["zalogowany"].":</br></br>";
		$c = new Criteria();
		$c->addJoin(OrganismPeer::ID, UserPrivilegesPeer::ID_ORGANISM);
		$c->add(UserPrivilegesPeer::ID_USER, $_SESSION["user_id"]);
		//TODO: sprawdzanie czy może wyświetlić organizm na podstawie parametru 'play' w UP
		$organisms = OrganismPeer::doSelect($c);

		foreach($organisms as $org)
		{
			if($org->getType() == "Roslina") {
				$image = "roslina";
			}
			if($org->getType() == "Roslinozerca") {
				$image = "roslinozerca";
			}
			if($org->getType() == "Padlinozerca") {
				$image = "padlina";
			}
			if($org->getType() == "Miesozerca") {
				$image = "mieso";
			}
			echo '<img src="../../images/organizmu/'.$image.'.png"> <b>Nazwa</b>: '.$org->getName().' <b>Typ</b>: '.$org->getType().' <b>Życie</b>: '.$org->getVitality().' <b>Instynkt</b>: '.$org->getInstinct().' <b>Odporność</b>: '.$org->getToughness().' <br/>';
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