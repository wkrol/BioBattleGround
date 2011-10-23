<?php
require("DB.php");
require("organism.php");
require("klimat.php");

class Symulacja {

	private $nazwa;
	private $populacja;
	private $pojemnik;
	private $pokarm = array();
	
	public function __construct($name){
		$this->nazwa = $name;
	}
	
	public function getPopulacja(){
	
		return $this->populacja;
	}
	
	public function setPopulacja($x){
	
		$this->populacja = $x;
	}
	
	public function setPojemnik($pojemnik){
		
		$this->pojemnik = $pojemnik;
	}
	
	public function getPojemnik(){
		
		return $this->pojemnik;
	}
	
	public function setPokarm($pokarm){
		
		$this->pokarm = $pokarm;
	}
	
	public function getPokarm(){
		
		return $this->pokarm;
	}
	
	public function wczytajOrganizm($name){
		Db::getInstance();
		$organism = Db::selectWhere('organizm', 'nazwa', $name);
		$type = $organism[5];
		$o = new $type($organism[1], $organism[2], $organism[3], $organism[4]);
		
		return $o;
	}
	
	public function wczytajKlimat($name){
		Db::getInstance();
		$c = Db::selectWhere('klimat', 'nazwa', $name);
		$climate = new Klimat($c[1], $c[2], $c[3], $c[4]);

		return $climate;
	}

	public function wczytajMape($name){
	
		Db::getInstance();
		$m = Db::selectWhere('mapa', 'nazwa', $name);
		$m=$m[2];
		for($i=0;$i<30;$i++){
			for($j=0;$j<50;$j++){
					$mapa[$i][$j]=substr($m,($i*50)+$j,1);

			}
		}

		return $mapa;
	
	}
	
	public function wczytajMalaMape($name){
	
		Db::getInstance();
		$m = Db::selectWhere('mapa', 'nazwa', $name);
		$m=$m[2];
		for($i=10;$i<20;$i++){
			for($j=20;$j<30;$j++){
					$mapa[$i][$j]=substr($m,($i*50)+$j,1);

			}
		}

		return $mapa;
	
	}

	public function stworzPogode($klimat,$mapa){
	
	
		for($i=0;$i<30;$i++){
			for($j=0;$j<50;$j++){
				
					$teren = $mapa[$i][$j];
					switch($teren){
						
						case "0":
							$temperatura=0;
							$opady=0;
							$wiatr=2;
							$slonce=0;
							$nazwa="morze";
							break;
						
						case "1":
							$temperatura=5;
							$opady=-1;
							$wiatr=1;
							$slonce=1;
							$nazwa="step";
							break;
				
						case "2":
							$temperatura=5;
							$opady=2;
							$wiatr=0;
							$slonce=0;
							$nazwa="bagno";
							break;
						
						case "3":
							$temperatura=15;
							$opady=-2;
							$wiatr=0;
							$slonce=2;
							$nazwa="pustynia";
							break;
						
						case "4":
							$temperatura=0;
							$opady=0;
							$wiatr=-1;
							$slonce=0;
							$nazwa="las";
							break;
						
						case "5":
							$temperatura=-5;
							$opady=1;
							$wiatr=1;
							$slonce=1;
							$nazwa="gory";
							break;
						
						case "6":
							$temperatura=-5;
							$opady=0;
							$wiatr=1;
							$slonce=0;
							$nazwa="wzgorze";
							break;
						
						case "7":
							$temperatura=5;
							$opady=0;
							$wiatr=0;
							$slonce=0;
							$nazwa="wysch. jezioro";
							break;
						}				
					$pogoda[$i][$j]=array('temperatura' => $temperatura+(3*$klimat->getNaslonecznienie())+rand(-2,2), 'opady' => $klimat->getDeszcz()+$opady, 'wiatr' => $klimat->getWiatr()+$wiatr, 'slonce' => $klimat->getNaslonecznienie()+$slonce, nazwa => $nazwa);
				//zaleznosc od pol do napisania
				}
		}
	
		return $pogoda;
	
	}
	
public function stworzMalaPogode($klimat,$mapa){
	
	
		for($i=10;$i<20;$i++){
			for($j=20;$j<30;$j++){
				
					$teren = $mapa[$i][$j];
					switch($teren){
						
						case "0":
							$temperatura=0;
							$opady=0;
							$wiatr=2;
							$slonce=0;
							$nazwa="morze";
							break;
						
						case "1":
							$temperatura=5;
							$opady=-1;
							$wiatr=1;
							$slonce=1;
							$nazwa="step";
							break;
				
						case "2":
							$temperatura=5;
							$opady=2;
							$wiatr=0;
							$slonce=0;
							$nazwa="bagno";
							break;
						
						case "3":
							$temperatura=15;
							$opady=-2;
							$wiatr=0;
							$slonce=2;
							$nazwa="pustynia";
							break;
						
						case "4":
							$temperatura=0;
							$opady=0;
							$wiatr=-1;
							$slonce=0;
							$nazwa="las";
							break;
						
						case "5":
							$temperatura=-5;
							$opady=1;
							$wiatr=1;
							$slonce=1;
							$nazwa="gory";
							break;
						
						case "6":
							$temperatura=-5;
							$opady=0;
							$wiatr=1;
							$slonce=0;
							$nazwa="wzgorze";
							break;
						
						case "7":
							$temperatura=5;
							$opady=0;
							$wiatr=0;
							$slonce=0;
							$nazwa="wysch. jezioro";
							break;
						}				
					$pogoda[$i][$j]=array('temperatura' => $temperatura+(3*$klimat->getNaslonecznienie())+rand(-2,2), 'opady' => $klimat->getDeszcz()+$opady, 'wiatr' => $klimat->getWiatr()+$wiatr, 'slonce' => $klimat->getNaslonecznienie()+$slonce, 'nazwa' => $nazwa);
				//zaleznosc od pol do napisania
				}
		}
		
		return $pogoda;
	
	}
	
	
	
	public function napelnijPojemnik($organizmy){
		
		$this->setPopulacja(0);
		
		for($i=0;$i<count($organizmy);$i++){
		
			$typ = get_class($organizmy[$i]);
			
			if($typ == "Roslina")
				continue;
			else{
			
				for($j=$i+1;$j<count($organizmy);$j++){
				
					if(get_class($organizmy[$j]) == 'Roslina'){
					
						$temp = $organizmy[$i];
						$organizmy[$i] = $organizmy[$j];
						$organizmy[$j] = $temp;
						continue 2;
						}	
				
					}
				}
			
			}
			
			for($i=0;$i<count($organizmy);$i++){
				
				$typ = get_class($organizmy[$i]);
				
				if($typ == "Roslinozerca" || $typ == "Roslina")
					continue;
				else if(gettype($organizmy[$i]) != "object")
							unset($organizmy[$i]);
				else {
			
					for($j=$i+1;$j<count($organizmy);$j++){
					
						if(get_class($organizmy[$j]) == 'Roslinozerca'){
						
							$temp = $organizmy[$i];
							$organizmy[$i] = $organizmy[$j];
							$organizmy[$j] = $temp;
							continue 2;
							}
			
					}
			
				}
					
			
			
		}

		for($i=0;$i<count($organizmy);$i++){
			
			$stado = $organizmy[$i]->getStado();
			$zagroda = $stado->getZagroda();
			for($j=0;$j<count($zagroda);$j++){
				$pop = $this->getPopulacja();
				$this->pojemnik[$pop] = $zagroda[$j];
				$this->setPopulacja($pop+1);
				}
			}
		}
		
	public function uaktualnijPojemnik($pojemnik){
	
	for($i=0;$i<count($pojemnik);$i++){
		if(isset($pojemnik[0]) == FALSE)
			break;
		if($pojemnik[$i] == NULL){
			for ($j=$i;$j<count($pojemnik)-1;$j++){
				$pojemnik[$j]=$pojemnik[$j+1];
				}
				array_pop( $pojemnik );
			}
		}
	
	$this->setPojemnik($pojemnik);
	}
		
	public function tworzPojemnik($org){
	
		$this->napelnijPojemnik($org);
		$pojemnik=$this->getPojemnik();
		$this->uaktualnijPojemnik($pojemnik);
		
		return $this->getPojemnik();
	}
	
	public function generujPokarm(){
	
		/*for($i=10;$i<20;$i++){
			for($j=20;$j<30;$j++){
				$pokarm[$i][$j]['mieso']=0;
				$pokarm[$i][$j]['padlina']=0;
			}
		}
	
		return $pokarm;*/
		
		$pokarm = new Padlina();
		
		return $pokarm;
	}
	
	
}

function mapuj($mapa, $pojemnik){
	echo "<div id=\"symulacja\">";
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
	echo "<input type=\"button\" value=\"NastĂ„â„˘pna Tura\" id=\"nextTurn\"></input>";
	echo "<div id=\"simTooltip\"><h3>PrzykÄąâ€šadowe okno</h3> <img src=\" images/climate/slonce.png \"></img> <p>;<img src=\" images/climate/opady.png \"></img></p> <p><img src=\" images/climate/wiatr.png \"></img></p></div>";
	echo "</div>";
}

function kreuj($mapa, $pojemnik){
	$string="<div id=\"symulacja\">";
	$string.="<table border =\"1\">";
		for($i=10;$i<10+count($mapa);$i++){
			$string.="<tr>";
			for($j=20;$j<20+count($mapa);$j++){

				switch($mapa[$i][$j]){
		
				case 0:
					$string.="<td width=\"40\" height=\"40\" background=\" images/terrain/woda.png \">";
					break;
			
				case 1:
					$string.="<td width=\"40\" height=\"40\" background=\" images/terrain/step.png \">";
					break;
				
				case 2:
					$string.="<td width=\"40\" height=\"40\" background=\" images/terrain/bagno.png \">";
					break;
			
				case 3:
					$string.="<td width=\"40\" height=\"40\" background=\" images/terrain/pustynia.png \">";
					break;
			
				case 4:
					$string.="<td width=\"40\" height=\"40\" background=\" images/terrain/las.png \">";
					break;
			
				case 5:
					$string.="<td width=\"40\" height=\"40\" background=\" images/terrain/gory.png \">";
					break;
				
				case 6:
					$string.="<td width=\"40\" height=\"40\" background=\" images/terrain/wzgorze.png \">";
					break;
				
				case 7:
					$string.="<td width=\"40\" height=\"40\" background=\" images/terrain/woda.png \">";
					break;	
				}
				
				for($k=0;$k<count($pojemnik);$k++){
					if(gettype($pojemnik[$k]) == "object"){
					$poz = $pojemnik[$k]->getPozycja();
					
					if($poz['x'] == $i && $poz['y'] == $j){
						$typ = get_class($pojemnik[$k]);
						switch($typ){
							
							case "Roslina":
								$string.="<img src='images/organism/kroparoslina.png'>";
								break;
							
							case "Padlinozerca":
								$string.="<img src='images/organism/kropapadlinozercy.png'>";
								break;
							
							case "Roslinozerca":
								$string.="<img src='images/organism/kroparoslinozercy.png'>";
								break;
							
							case "Miesozerca":
								$string.="<img src='images/organism/kropamiesozercy.png'>";
								break;
						
							}
						}
					}
				}
	
				$string.="</td>";
			}
		$string.="</tr>";
		}
	$string.="</table>";
	$string.="<input type=\"button\" value=\"Następna Tura\"  id=\"0\"></input>";
	$string.="<div id=\"simTooltip\"><h3>Przykładowe okno</h3> <img src=\" images/climate/slonce.png \"></img> <p><img src=\" images/climate/opady.png \"></img></p> <p><img src=\" images/climate/wiatr.png \"></img></p></div>";
	$string.="</div>";
	
	return $string;
}



?>