<?php
session_start();
require("strona.php");
// Include the main Propel script
require_once '../../vendor/propel/runtime/lib/Propel.php';

// Initialize Propel with the runtime configuration
Propel::init("../../build/conf/biobattleground-conf.php");

// Add the generated 'classes' directory to the include path
set_include_path("../../build/classes" . PATH_SEPARATOR . get_include_path());

	class DodajMape extends Strona {
	
	public function encodeMap($tab){
	$mapString="";
	for($i=0; $i<30; $i++){
		for($j=0;$j<50; $j++){
			$mapString.=$tab[$i][$j];
			}
		}
	return $mapString;
}
	
	public function WyswietlZawartosc() {
		echo '
		<div id="addMapPage">
	<div id="tooltip">aaaaaaaaa</div>

	<h3> Typy terenu: </h3>

		<p>Step:
		<INPUT TYPE="button" id="steppeDown"  value="<"></INPUT>
		<INPUT TYPE="text" name="terrain" id="steppe" value="50%" READONLY></INPUT>
		<INPUT TYPE="button" id="steppeUp"  value=">"></INPUT>
		</p>
		
		<p>Bagno: 
		<INPUT TYPE="button" id="swampDown"  value="<"></INPUT>
		<INPUT TYPE="text" name="terrain" id="swamp" value="50%" READONLY></INPUT>
		<INPUT TYPE="button" id="swampUp"  value=">"></INPUT>
		</p>
		
		<p>Pustynia:
		<INPUT TYPE="button" id="desertDown"  value="<"></INPUT>
		<INPUT TYPE="text" name="terrain" id="desert" value="50%" READONLY></INPUT>
		<INPUT TYPE="button" id="desertUp"  value=">"></INPUT>
		</p>
		
		<p>Las:
		<INPUT TYPE="button" id="forestDown"  value="<"></INPUT>
		<INPUT TYPE="text" name="terrain" id="forest" value="50%" READONLY></INPUT>
		<INPUT TYPE="button" id="forestUp"  value=">"></INPUT>
		</p>
		
		<p>Góry:
		<INPUT TYPE="button" id="mountainDown"  value="<"></INPUT>
		<INPUT TYPE="text" name="terrain" id="mountain" value="50%" READONLY></INPUT>
		<INPUT TYPE="button" id="mountainUp"  value=">"></INPUT>
		</p>
		
		<p>Wzgórza: 
		<INPUT TYPE="button" id="hillDown"  value="<"></INPUT>
		<INPUT TYPE="text" name="terrain" id="hill" value="50%" READONLY></INPUT>
		<INPUT TYPE="button" id="hillUp"  value=">"></INPUT>
		</p>
		
		<p>Rzeka: 
		<INPUT TYPE="button" id="riverDown"  value="<"></INPUT>
		<INPUT TYPE="text" name="terrain" id="river" value="50%" READONLY></INPUT>
		<INPUT TYPE="button" id="riverUp"  value=">"></INPUT>
		</p>
		
		
	<h3>Nazwa mapy:</h3>
	
		<p><input type="text" id="mapName"></input></p>
		<p><input type="button" id="addMap" value="Stwórz mape"></INPUT></p>
	
	</div>
		';
if(isset($_GET['name'])){
	$name = $_GET['name'];
	$steppe = $_GET['t1'];
	$swamp = $_GET['t2'];
	$desert = $_GET['t3'];
	$forest = $_GET['t4'];
	$mountain = $_GET['t5'];
	$hill = $_GET['t6'];
	$river = $_GET['t7'];

	$max[1]=150*$steppe;
	$max[2]=500*$swamp;
	$max[3]=50*$desert;
	$max[4]=100*$forest;
	$max[5]=50*$mountain;
	$max[6]=100*$hill;
	$max[7]=100*$river;

	echo "<table border='1'>";
	for($i=0; $i<30; $i++){
			echo "<tr>";
			for($j=0; $j<50; $j++){
				if($i==0 || $i==29 || $j==0 || $j==49)
						$map[$i][$j]=0;
				else{
						$l = rand(1,7);
						while($tab[$l] >= $max[$l]){
							$l = rand (1,7);
							if($tab[$l] < $max)
								continue;
						}
					$map[$i][$j]=$l;
					$tab[$l]++;
					}
			
			if($map[$i][$j]==0)
				echo "<td bgcolor='blue' width=24 height=22></td>";
			if($map[$i][$j]==1)
				echo "<td bgcolor='green' width=24 height=22></td>";
			if($map[$i][$j]==2)
				echo "<td bgcolor='yellow' width=24 height=22></td>";
			if($map[$i][$j]==3)
				echo "<td bgcolor='red' width=24 height=22></td>";
			if($map[$i][$j]==4)
				echo "<td bgcolor='purple' width=24 height=22></td>";
			if($map[$i][$j]==5)
				echo "<td bgcolor='gray' width=24 height=22></td>";
			if($map[$i][$j]==6)
				echo "<td bgcolor='brown' width=24 height=22></td>";
			if($map[$i][$j]==7)
				echo "<td bgcolor='orange' width=24 height=22></td>";
		}
		echo "</tr>";
	}
	echo "</table>";


	$test = $this->encodeMap($map);
	//$id = $_SESSION["zalogowany"];

	$map = new Map();
	$map->setName($name);
	$map->setMapString($test);
	$map->save();
	
	$userPrivileges = new UserPrivileges();
	$userPrivileges->setIdMap($map->getId());
	$userPrivileges->setIdUser($_SESSION["user_id"]);
	/* TODO: próba ustawienia parametrów play, fight, edit i show stats skutkuje
	 *  	 przerwaniem zapisu do bazy danych - naprawić 
	$userPrivileges->setPlay(1);
	$userPrivileges->setEdit(1);
	*/
	$userPrivileges->save();
	

}
	}
	}
	$strona = new DodajMape();
	$strona -> nazwadzialu = "Mapy";
	$strona -> przyciski = array("Startowa"   => "mapy.php",
						"Wyświetl mapy"   => "viewmaps.php",
						"Dodaj mapę"   => "addmap.php"
                        );
	$strona -> Wyswietl();
		
?>