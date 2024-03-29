﻿<?php
session_start();
require("strona.php");
// Include the main Propel script
require_once '../../vendor/propel/runtime/lib/Propel.php';

// Initialize Propel with the runtime configuration
Propel::init("../../build/conf/biobattleground-conf.php");

// Add the generated 'classes' directory to the include path
set_include_path("../../build/classes" . PATH_SEPARATOR . get_include_path());
	class DodajKlimat extends Strona {
	
	public function WyswietlZawartosc() {
		echo "
		<div id=\"addClimatePage\">

<h3> Cechy klimatu </h3>
	<table width=\"80%\">
	<tr>
		<td align=\"center\"><b>Opady atmosferyczne</b></td>
		<td align=\"center\"><b>Wiatr</b></td>
		<td align=\"center\"><b>Nasłonecznienie</b></td>
	</tr>
	<tr>
		<td align=\"left\"><select id=\"rain\">
		<option>Wybierz: </option>
		<option>Brak</option>
		<option>Bardzo małe</option>
		<option>Małe</option>
		<option>Średnie</option>
		<option>Duże</option>
		</select></td>
		<td align=\"left\"><select id=\"wind\">
			<option>Wybierz: </option>
			<option>Brak</option>
			<option>Słaby</option>
			<option>Średni</option>
			<option>Silny</option>
			<option>Bardzo silny</option>
		</select></td>
		<td align=\"left\"><select id=\"sun\">
			<option>Wybierz: </option>
			<option>Bardzo niskie</option>
			<option>Niskie</option>
			<option>Średnie</option>
			<option>Wysokie</option>
			<option>Bardzo wysokie</option>
		</select></td>
	</tr>
	<tr>
		<td align=\"left\"><img src=\"../../images/diagram.png\" height=\"250\" width=\"260\"></td>
		<td align=\"center\"><img src=\"../../images/diagram.png\" height=\"250\" width=\"260\"></td>
		<td align=\"right\"><img src=\"../../images/diagram.png\" height=\"250\" width=\"260\"></td>
	</tr>
	<tr>
		<td align=\"left\"><input type=\"button\" value=\"Generuj wykres\"></td>
		<td align=\"center\"><input type=\"button\" value=\"Generuj wykres\"></td>
		<td align=\"right\"><input type=\"button\" value=\"Generuj wykres\"></td>
	</tr>
	</table>
<h3>Nazwa klimatu </h3>
	<p>Nazwa klimatu: <input type=\"text\" id=\"climateName\"</p>
	<input type=\"button\" id=\"addClimate\" value=\"Stwórz klimat\"></input>




</div>
		";
		
	}
	}
	$strona = new DodajKlimat();
	$strona -> nazwadzialu = "Klimaty";
	$strona -> przyciski = array("Startowa"   => "klimaty.php",
						"Wyświetl klimaty"   => "viewclimate.php",
						"Dodaj klimat"   => "addclimate.php"
                        );
	$strona -> Wyswietl();
	
	if(isset($_GET['name'])){
		$climateName = $_GET['name'];
	}
	if(isset($_GET['rain'])){
		$rain = $_GET['rain'];
	}
	if(isset($_GET['wind'])){
		$wind = $_GET['wind'];
	}
	if(isset($_GET['sun'])){
		$sun = $_GET['sun'];
	}
	if(isset($_GET['name'])){
		
		$climate = new Climate();
		$climate->setName($climateName);
		$climate->setRain($rain);
		$climate->setSun($sun);
		$climate->setWind($wind);
		$climate->save();
		
		$userPrivileges = new UserPrivileges();
		$userPrivileges->setIdClimate($climate->getId());
		$userPrivileges->setIdUser($_SESSION["user_id"]);
		$userPrivileges->setPlay(1);
		$userPrivileges->setEdit(1); 
	
		
		$userPrivileges->save();
	}
		
?>