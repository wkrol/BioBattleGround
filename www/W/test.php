<?php
require("symulacja.php");

$symulacja = new Symulacja("nowa");
$mapa = $symulacja->wczytajMalaMape("dziwna");
$klimat = $symulacja->wczytajKlimat("okrutny");
$pogoda = $symulacja->stworzMalaPogode($klimat,$mapa);
$o[0] = new Roslina("krzak",3,8,5);
$o[0]->setPozycja(13,23);
$o[0]->reprodukcja();
$o[1] = new Roslinozerca("wrona",5,3,1);
$o[1]->setPozycja(14,22);
$o[1]->reprodukcja();
$o[2] = new Roslina("drzewo",7,7,7);
$o[2]->setPozycja(16,27);
$o[2]->reprodukcja();
$o[3] = new Roslinozerca("wrona",1,1,1);
$o[3]->setPozycja(18,28);
$o[3]->reprodukcja();
$symulacja->napelnijPojemnik($o);
$pojemnik = $symulacja->getPojemnik();
mapuj($mapa,$pojemnik);
//echo count($pojemnik);


for($czas=0;$czas<25;$czas++){
	$ile=0;
	for($k=0;$k<count($pojemnik);$k++){
		if(gettype($pojemnik[$k]) == "object"){
			$typ = get_class($pojemnik[$k]);
			$ile++;
			if($typ == "Roslina"){
				$poz = $pojemnik[$k]->getPozycja();
				$teren=$mapa[$poz['x']][$poz['y']];
				$pojemnik[$k]->oddzialuj($teren);
				$pojemnik[$k]->akcja($pogoda);
				$pojemnik[$k]->glod();
				$pojemnik[$k]->postarz();
				}
			else{
				$poz = $pojemnik[$k]->getPozycja();
				$teren=$mapa[$poz['x']][$poz['y']];
				$pojemnik[$k]->oddzialuj($teren);
				$pojemnik[$k]->akcja($pojemnik);
				$pojemnik[$k]->glod();
				$pojemnik[$k]->postarz();
				}
			}
		}
	echo $ile;
	$pojemnik=$symulacja->tworzPojemnik($o);
	//var_dump($pojemnik);
	//echo"<br><br>";
	mapuj($mapa,$pojemnik);
	//echo $symulacja->getPopulacja()."<br>";
	echo "-----------------------------------------------------------------------------";

}

//$pojemnik=$symulacja->getPojemnik();


function mapuj($mapa, $pojemnik){

	echo "<table border =\"1\">";
		for($i=10;$i<10+count($mapa);$i++){
			echo "<tr>";
			for($j=20;$j<20+count($mapa);$j++){

				switch($mapa[$i][$j]){
		
				case 0:
					echo "<td width=\"40\" height=\"40\" background=\" images/terrain/woda.png \">";
					break;
			
				case 1:
					echo "<td width=\"40\" height=\"40\" background=\" images/terrain/step.png \">";
					break;
				
				case 2:
					echo "<td width=\"40\" height=\"40\" background=\" images/terrain/bagno.png \">";
					break;
			
				case 3:
					echo "<td width=\"40\" height=\"40\" background=\" images/terrain/pustynia.png \">";
					break;
			
				case 4:
					echo "<td width=\"40\" height=\"40\" background=\" images/terrain/las.png \">";
					break;
			
				case 5:
					echo "<td width=\"40\" height=\"40\" background=\" images/terrain/gory.png \">";
					break;
				
				case 6:
					echo "<td width=\"40\" height=\"40\" background=\" images/terrain/wzgorze.png \">";
					break;
				
				case 7:
					echo "<td width=\"40\" height=\"40\" background=\" images/terrain/woda.png \">";
					break;	
				}
				
				for($k=0;$k<count($pojemnik);$k++){
					if(gettype($pojemnik[$k]) == "object"){
					$poz = $pojemnik[$k]->getPozycja();
					
					if($poz['x'] == $i && $poz['y'] == $j){
						$typ = get_class($pojemnik[$k]);
						switch($typ){
							
							case "Roslina":
								echo "<img src='images/organism/kroparoslina.png'>";
								break;
							
							case "Padlinozerca":
								echo "<img src='images/organism/kropapadlinozercy.png'>";
								break;
							
							case "Roslinozerca":
								echo "<img src='images/organism/kroparoslinozercy.png'>";
								break;
							
							case "Miesozerca":
								echo "<img src='images/organism/kropamiesozercy.png'>";
								break;
						
							}
						}
					}
				}
	
				echo "</td>";
			}
		echo "</tr>";
		}
	echo "</table>";
}

	
?>	