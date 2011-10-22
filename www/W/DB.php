<?php


class Db {

//zmienna instacji singletona
private static $instance;

private function __construct(){
		$server = "localhost";
		$dbuser = "root";
		$dbpassword = "";
		$dbname = "biobattleground";

		$connect = mysql_connect($server, $dbuser, $dbpassword) or die (" Blad polaczenia z baza danych - ".mysql_error());
		if(!mysql_select_db($dbname, $connect)){
			createBase($dbname);
			mysql_select_db($dbname, $connect);
			createTables();
		}
		else 
			mysql_select_db($dbname, $connect) or die("Blad wyboru bazy: ".mysql_error());
	}
	
private function __clone(){}

///////////////////////////////Singleton ////////////////////////////
public static function getInstance(){
	if(!isset($instance))
	        $instance = new Db();
	return $instance;
	}
	
public function insertOrganism($name, $stat1, $stat2, $stat3, $type){
		$result=mysql_query("INSERT INTO organizm(nazwa, hp, instynkt, odpornosc, typ) VALUES ('$name', '$stat1', '$stat2', '$stat3', '$type')");
	}
	
public function insertClimate($name, $rain, $wind, $sun){
		$result=mysql_query("INSERT INTO klimat(nazwa, opady, wiatr, naslonecznienie) VALUES ('$name', '$rain', '$wind', '$sun')");
	}

public function insertMap($name, $string){
		$result=mysql_query("INSERT INTO mapa(nazwa, mapString) VALUES ('$name', '$string')");
	}

public function select($tablename, $column = "*"){
		$result = mysql_query("SELECT $column FROM $tablename");
		//$row=array();
		//$row=mysql_fetch_array($result, MYSQL_BOTH);
		//$row['ile']= mysql_num_rows($result);
		
		
		
		
		echo "<table border='1'>";
		echo "<tr>";
			echo "<td>Nazwa</td>";
			echo "<td>HP</td>";
			echo "<td>Instynkt</td>";
			echo "<td>Odpornosæ</td>";
			echo "<td>Typ</td>";
		echo "</tr>";
		
		
		$o['ile']= mysql_num_rows($result);
		
		for($i=0; $i<$o['ile']; $i++){
			while($o=mysql_fetch_array($result, MYSQL_BOTH)){
			echo "<tr>";
				echo "<td>";
					echo $o['nazwa'];
				echo "</td>";
				echo "<td>";
					echo $o['hp'];
				echo "</td>";
				echo "<td>";
					echo $o['instynkt'];
				echo "</td>";
				echo "<td>";
					echo $o['odpornosc'];
				echo "</td>";
				echo "<td>";
					echo $o['typ'];
				echo "</td>";
			echo "</tr>";
			}
		echo "</table>";
		}
		
		
		
		
		//return $result;
	}
	
public function selectWhere($tablename, $whereVar, $whereValue, $column = "*"){
	$result = mysql_query("Select $column FROM $tablename WHERE $whereVar='$whereValue'");
	$row=array();
	$row=mysql_fetch_array($result, MYSQL_BOTH);
	
	return $row;
	}
	
public function selectNew($tablename){
	$result = mysql_query("Select * FROM $tablename'");
	$resultNumber = mysql_num_rows($result);
	for ($i = 0; $i < 2; $i++) {
		if(mysql_data_seek($result, $i)){
			$row[$i]= mysql_fetch_array($result, MYSQL_BOTH);
		}
	
	}
	
	
	return $row;
}
	

public function deleteOrganism($name_id, $name_value ){
	mysql_query("DELETE FROM organizm WHERE $name_id='$name_value'") or die("Wybrany organizm nie istnieje - ".mysql_error());
	}
}
// Funkcja tworzenia bazy
function createBase($dbname){
		$dbSQL= "CREATE DATABASE $dbname";
		mysql_query($dbSQL);
		
	}
//Funkcja tworzenia tablic
function createTables(){
		$organismSQL = "CREATE TABLE ORGANIZM(id int auto_increment, nazwa char(20), hp int, instynkt int, odpornosc int, typ char(20), primary key(id) )";
		$mapSQL = "CREATE TABLE MAPA(id int auto_increment, nazwa char(20), mapString text, primary key(id))";
		$climateSQL = "CREATE TABLE KLIMAT(id int auto_increment, nazwa char(20), opady int, wiatr int, naslonecznienie int, primary key (id))";
		
		mysql_query($organismSQL);
		mysql_query($mapSQL);
		mysql_query($climateSQL);
		

		return 0;
	}	

?>












