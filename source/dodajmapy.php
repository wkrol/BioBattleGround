<?php
session_start();
	
	/*
	 * TODO: Musi chyba być klasa, żeby nie było tego errora :)
	 */
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
	
	public function insertClimate($name, $string){
		$wynik = $this -> Lacz()->prepare("INSERT INTO mapa(nazwa, mapString) VALUES (:name, :string)");
		$wynik->bindParam(':name', $name, PDO::PARAM_STR);
		$wynik->bindParam(':string', $string, PDO::PARAM_STR);
		$wynik->execute();
		if (!$wynik) {
			throw new Exception('Wykonanie zapytania nie powiodło się.');
		}
	}
	
	public function encodeMap($tab){
	$mapString="";
	for($i=0; $i<30; $i++){
		for($j=0;$j<50; $j++){
			$mapString.=$tab[$i][$j];
			}
		}
	return $mapString;
}
	
	
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


$test = encodeMap($map);
insertMap($name,$test);
}
	
		
?>