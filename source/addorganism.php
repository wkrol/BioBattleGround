<?php
session_start();
	require("strona.php");
	class DodajOrganizm extends Strona {
	
	public function Lacz() {
		try
		{
			$pdo = new PDO('mysql:host=localhost;dbname=biobattleground', 'root', '');
			$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;
		}
		catch(PDOException $e)
		{
			echo 'Połączenie nie mogło zostać utworzone: ' . $e->getMessage();
		}
	}
	
	public function insertOrganism($name, $stat1, $stat2, $stat3, $type, $id){
		$wynik = $this -> Lacz()->prepare("INSERT INTO organizm(nazwa, hp, instynkt, odpornosc, typ, id_uzyt) VALUES (:name, :stat1, :stat2, :stat3, :type, :id)");
		$wynik->bindParam(':name', $name, PDO::PARAM_STR);
		$wynik->bindParam(':stat1', $stat1, PDO::PARAM_INT);
		$wynik->bindParam(':stat2', $stat2, PDO::PARAM_INT);
		$wynik->bindParam(':stat3', $stat3, PDO::PARAM_INT);
		$wynik->bindParam(':type', $type, PDO::PARAM_STR);
		$wynik->bindParam(':id', $id, PDO::PARAM_STR);
		$wynik->execute();
		if (!$wynik) {
			throw new Exception('Wykonanie zapytania nie powiodło się.');
		}
	}
	
	
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
		$strona->insertOrganism($name,$stat1,$stat2,$stat3,$type,$id);
	}
		
?>