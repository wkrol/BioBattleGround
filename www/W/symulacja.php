<?php
require("DB.php");
require("organism.php");
require("klimat.php");

class Symulacja {

	private $nazwa;
	private $populacja;
	private $pojemnik;
	
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
	
	public function wczytajOrganizm($name){
		Db::getInstance();
		$organism = Db::selectWhere(organizm, nazwa, $name);
		$type = "$organism[5]";
		$o = new $type("$organism[1]", $organism[2], $organism[3], $organism[4]);
		
		return $o;
	}
	
	public function wczytajKlimat($name){
		Db::getInstance();
		$c = Db::selectWhere(klimat, nazwa, $name);
		$climate = new Klimat("$c[1]", $c[2], $c[3], $c[4]);

		return $climate;
	}

	public function wczytajMape($name){
	
		Db::getInstance();
		$m = Db::selectWhere(mapa, nazwa, $name);
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
		$m = Db::selectWhere(mapa, nazwa, $name);
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
					$pogoda[$i][$j]=array(temperatura => $temperatura+(3*$klimat->getNaslonecznienie())+rand(-2,2), opady => $klimat->getDeszcz()+$opady, wiatr => $klimat->getWiatr()+$wiatr, slonce => $klimat->getNaslonecznienie()+$slonce, nazwa => $nazwa);
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
					$pogoda[$i][$j]=array("temperatura" => $temperatura+(3*$klimat->getNaslonecznienie())+rand(-2,2), "opady" => $klimat->getDeszcz()+$opady, "wiatr" => $klimat->getWiatr()+$wiatr, "slonce" => $klimat->getNaslonecznienie()+$slonce, "nazwa" => $nazwa);
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
	
	/*
		$poj=array_filter($pojemnik);
		$this->setPopulacja(count($poj));
		$this->setPojemnik($poj);*/
		for($i=0;$i<count($pojemnik);$i++){
			if($pojemnik[$i] == NULL){
			
				$pojemnik[$i]=$pojemnik[$i+1];
				unset($pojemnik[$i+1]);
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
}



?>