<?php
session_start();	
require("strona.php");
// Include the main Propel script
require_once '../../vendor/propel/runtime/lib/Propel.php';

// Initialize Propel with the runtime configuration
Propel::init("../../build/conf/biobattleground-conf.php");

// Add the generated 'classes' directory to the include path
set_include_path("../../build/classes" . PATH_SEPARATOR . get_include_path());
	class DodajOrganizm extends Strona {
	
	
	public function WyswietlZawartosc() {
		echo "
		<div id=\"addOrganismPage\">
		
	<p>
		Typ: <select id=\"organismType\">
	        <option>Wybierz:</option>
			<option>Roslina</option>
	        <option>Roslinozerca</option>
	        <option>Miesozerca</option>
	        <option>Padlinozerca</option>
			 </select>
	</p>
	<div id=\"typeTooltip\"></div>
	<div id=\"tooltip\"></div>
	<h3>Cechy organizmu: </h3>
	<p>Punkty życia: <INPUT TYPE=\"button\" id=\"substractHP\" value=\"-\"></input> 
			<INPUT TYPE=\"text\" id=\"hp\" value=\"1\" READONLY></input> 
			<INPUT TYPE=\"button\" id =\"addHP\" value=\"+\"></input> 
	</p>
	
	<p>Instynkt: <INPUT TYPE=\"button\" id=\"substractInstinct\"  value=\"-\"></input>
			<INPUT TYPE=\"text\" id=\"instinct\" value=\"1\" READONLY></input>
			<INPUT TYPE=\"button\" id=\"addInstinct\"  value=\"+\"></input>
	</p>
	
	<p>Odporność: <INPUT TYPE=\"button\" id=\"substractToughness\"  value=\"-\"></input>
			<INPUT TYPE=\"text\" id=\"toughness\" value=\"1\" READONLY></input>
			<INPUT TYPE=\"button\" id=\"addToughness\" value=\"+\"></input>
	</p>
	
	<p>Pozostałe punkty do rozdysponowania: <INPUT TYPE=\"text\" id=\"left\" value=\"10\" READONLY></input></p>		
	
	<h3>Nazwa Organizmu: </h3>
	<p><INPUT TYPE=\"text\" id=\"organismName\"></input></p>
	<p><INPUT TYPE=\"button\" id=\"createOrganism\" value=\"Stwórz Organizm\"></input></p>
	
	
		</div>
		";
		//<div id=\"tooltip\"></div>
	}
	}
	$strona = new DodajOrganizm();
	$strona -> nazwadzialu = "Organizmy";
	$strona -> przyciski = array("Startowa"   => "organizmy.php",
						"Wyświetl organizmy"   => "vieworganism.php",
						"Dodaj organizm"   => "addorganism.php"
                        );
	$strona -> Wyswietl();
	if(isset($_GET['name'])){
		$name = $_GET['name'];
	}
	if(isset($_GET['stat1'])){
		$stat1 = $_GET['stat1'];
	}
	if(isset($_GET['stat2'])){
		$stat2 = $_GET['stat2'];
	}
	if(isset($_GET['stat3'])){
		$stat3 = $_GET['stat3'];
	}
	if(isset($_GET['type'])){
		$type = $_GET['type'];
	}
	if(isset($_GET['name'])){
		$id = $_SESSION["zalogowany"];
		
		$org = new Organism();
		$org->setName($name);
		$org->setVitality($stat1);
		$org->setInstinct($stat2);
		$org->setToughness($stat3);
		$org->setType($type);
		$org->save();
		
		$userPrivileges = new UserPrivileges();
		$userPrivileges->setIdOrganism(5);
		$userPrivileges->setIdUser(1);
		$userPrivileges->setIdClimate(NULL);
		$userPrivileges->setIdMap(NULL);
		/*TODO: próba ustawienia parametrów play, fight, edit i show stats skutkuje
	 			przerwaniem zapisu do bazy danych - naprawić!
		$userPrivileges->setPlay(1);
		$userPrivileges->setFight(1);
		$userPrivileges->setEdit(1);
		$userPrivileges->setShowStats(1);
		*/
		$userPrivileges->save();

	}
		
?>