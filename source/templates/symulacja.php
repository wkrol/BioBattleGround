<?php
// Include the main Propel script
require_once '../../vendor/propel/runtime/lib/Propel.php';
// Initialize Propel with the runtime configuration
Propel::init("../../build/conf/biobattleground-conf.php");
// Add the generated 'classes' directory to the include path
set_include_path("../../build/classes" . PATH_SEPARATOR . get_include_path());

require_once 'base/page.php';

class Symulacja extends Page {
	
	public function WyswietlZawartosc() {
		
		echo "<div id='simulationPage'>";
		
		echo "<h3>Moje organizmy: </h3></br>";

		echo "<label>1. </label><select id=\"myOrganismsSelect\">";
		$c = new Criteria();
		$c->addJoin(OrganismPeer::ID, UserPrivilegesPeer::ID_ORGANISM);
		$c->add(UserPrivilegesPeer::ID_USER, $_SESSION["user_id"]);
		$c->add(UserPrivilegesPeer::EDIT, 1);
		$organisms = OrganismPeer::doSelect($c);
		foreach($organisms as $organism):
			echo "<option value=",$organism->getId(),">",$organism->getName(),"</option>";
		endforeach;
		echo "</select><br/><br/>";
		
		echo "<h3>Organizmy mi dostępne: </h3><br />";
		
		echo "<select id=\"enemyOrganisms\">";
		$c = new Criteria();
		$c->addJoin(OrganismPeer::ID, UserPrivilegesPeer::ID_ORGANISM);
		$c->add(UserPrivilegesPeer::ID_USER, $_SESSION["user_id"]);
		$c->add(UserPrivilegesPeer::FIGHT, 1);
		$enemies = OrganismPeer::doSelect($c);
		foreach($enemies as $enemy):
			echo "<option value=",$enemy->getId(),">",$enemy->getName()."</option>";
		endforeach;
		echo "</select><br/><br/>";
		
		echo "<input id=\"addEnemyButton\" type=\"button\" value=\"Dodaj\" /><br />";
		echo "<table>
			<label>Organizmy konkurencyjne: </label>
			<tr><td class='enemyField'></td></tr>
			<tr><td class='enemyField'></td></tr>
			<tr><td class='enemyField'></td></tr>
			<tr><td class='enemyField'></td></tr>
			<tr><td class='enemyField'></td></tr>
			<tr><td class='enemyField'></td></tr>
			<tr><td class='enemyField'></td></tr>
		</table>";
		
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

		foreach($mapy as $mapa) {
			echo '<option>'.$mapa->getName().'</option>';
		} 
		echo "</select></br></br>";
		
		echo "<p><input type=\"button\" id=\"startSimulate\" value=\"Start symulacji\"></INPUT></p>";
		
		echo "</div>";
	
	}
}

	/*
	 * Execute
	 */
	$strona = new Symulacja();
	$strona ->setSubpageName("Symulacja");
	$strona ->addScript('simulationPrepare.js');
	$strona ->setButtons(array());
	$strona ->render();
?>