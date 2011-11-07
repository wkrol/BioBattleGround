<?php
session_start();
require("strona.php");
// Include the main Propel script
require_once '../../vendor/propel/runtime/lib/Propel.php';

// Initialize Propel with the runtime configuration
Propel::init("../../build/conf/biobattleground-conf.php");

// Add the generated 'classes' directory to the include path
set_include_path("../../build/classes" . PATH_SEPARATOR . get_include_path());

	class Symulacja extends Strona {
	
	public function WyswietlZawartosc() {
		
		echo "<h3>Organizmy stworzone przez użytkownika ".$_SESSION["zalogowany"].":</h3></br>";
		
		echo "Rośliny:<br/>";
		echo "<select id=\"organismroslinaSelect\">";
		$gatunek = "Roslina";
		
		$c = new Criteria();
		$c->add(OrganismPeer::TYPE, $gatunek);
		$c->addJoin(OrganismPeer::ID, UserPrivilegesPeer::ID_ORGANISM);
		$c->add(UserPrivilegesPeer::ID_USER, $_SESSION["user_id"]);
		$rosliny = OrganismPeer::doSelect($c);
		foreach($rosliny as $roslina)
		{
			echo '<option>'.$roslina->getName().'</option>';
		} 
		echo "</select><br/><br/>";
		
		echo "Roślinożercy:<br/>";
		echo "<select id=\"organismroslinozercaSelect\">";
		$gatunek = "Roslinozerca";
		
		$c = new Criteria();
		$c->add(OrganismPeer::TYPE, $gatunek);
		$c->addJoin(OrganismPeer::ID, UserPrivilegesPeer::ID_ORGANISM);
		$c->add(UserPrivilegesPeer::ID_USER, $_SESSION["user_id"]);
		$roslinozercy = OrganismPeer::doSelect($c);
		foreach($roslinozercy as $roslinozerca)
		{
			echo '<option>'.$roslinozerca->getName().'</option>';
		} 
		echo "</select><br/><br/>";
		
		echo "Miesożercy:<br/>";
		echo "<select id=\"organismmiesozercaSelect\">";
		$gatunek = "Miesozerca";
		
		$c = new Criteria();
		$c->add(OrganismPeer::TYPE, $gatunek);
		$c->addJoin(OrganismPeer::ID, UserPrivilegesPeer::ID_ORGANISM);
		$c->add(UserPrivilegesPeer::ID_USER, $_SESSION["user_id"]);
		$miesozercy = OrganismPeer::doSelect($c);
		foreach($miesozercy as $miesozerca)
		{
			echo '<option>'.$miesozerca->getName().'</option>';
		} 
		echo "</select><br/><br/>";
		
		echo "Padlinożercy:<br/>";
		echo "<select id=\"organismpadlinozercaSelect\">";
		$gatunek = "Padlinozerca";
		
		$c = new Criteria();
		$c->add(OrganismPeer::TYPE, $gatunek);
		$c->addJoin(OrganismPeer::ID, UserPrivilegesPeer::ID_ORGANISM);
		$c->add(UserPrivilegesPeer::ID_USER, $_SESSION["user_id"]);
		$padlinozercy = OrganismPeer::doSelect($c);
		foreach($padlinozercy as $padlinozerca)
		{
			echo '<option>'.$padlinozerca->getName().'</option>';
		} 
		echo "</select><br/><br/>";
		
		echo "</br></br><h3>Klimaty stworzone przez użytkownika ".$_SESSION["zalogowany"].":</h3></br></br>";
		echo "<select id=\"climateSelect\">";
		
		$c = new Criteria();
		$c->addJoin(ClimatePeer::ID, UserPrivilegesPeer::ID_CLIMATE);
		$c->add(UserPrivilegesPeer::ID_USER, $_SESSION["user_id"]);
		$klimaty = ClimatePeer::doSelect($c);
		foreach($klimaty as $klimat)
		{
			echo '<option>'.$klimat->getName().'</option>';
		} 
		echo "</select>";
		
		
		echo "</br></br><h3>Mapy stworzone przez użytkownika ".$_SESSION["zalogowany"].":</h3></br>";
		echo "<select id=\"mapSelect\">";
		
		$c = new Criteria();
		$c->addJoin(MapPeer::ID, UserPrivilegesPeer::ID_MAP);
		$c->add(UserPrivilegesPeer::ID_USER, $_SESSION["user_id"]);
		$mapy = MapPeer::doSelect($c);

		foreach($mapy as $mapa)
		{
			echo '<option>'.$mapa->getName().'</option>';
		} 
		echo "</select></br></br>";
		
		echo "<p><input type=\"button\" id=\"startSimulate\" value=\"Start symulacji\"></INPUT></p>";
		
		
	
	}
	}
	$strona = new Symulacja();
	$strona -> nazwadzialu = "Symulacja";
	$strona -> przyciski = array(
                        );
	$strona -> Wyswietl();
?>