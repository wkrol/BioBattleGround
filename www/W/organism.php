<?php
require("stado.php");
require("wspolrzedne.php");

class Organizm {

	private $nazwa;
	private $witalnosc;
	private $instynkt;
	private $odpornosc;
	private $punktyZycia;
	private $numerZagrody;
	private $glod=10;
	private $wiek=0;
	private $stado;
	
	
	protected $pozycja=array();
	
	public function __construct($name, $s1, $s2, $s3){
	        $this->nazwa = $name;
	        $this->witalnosc = $s1;
	        $this->instynkt = $s2;
	        $this->odpornosc = $s3;
					$this->punktyZycia = $this->witalnosc * 2;
					$this->stado = new Stado($this);
					$this->stado->setNazwa($name);
					$this->setNumerZagrody($this->stado->getId());
					$this->stado->dodajOrganizm($this);
		}
	
	public function __clone(){
			$this->punktyZycia= $this->witalnosc * 2;
			$this->glod = 10;
			$this->wiek = 0;
			$this->setNumerZagrody($this->stado->getId());
			$this->stado->dodajOrganizm($this);
		}
		
	public function anihilate(){
	
		$id = $this->getNumerZagrody();
		$this->stado -> zamien($id);

		unset($this);
	}
		
	
	public function setNazwa($name){
	        $this->nazwa = $name;
	        }

	public function getNazwa(){
	        return $this->nazwa;
	        }
		
	public function getWitalnosc() {
	 	return $this->witalnosc;
	 	}
	public function getInstynkt() {
		return $this->instynkt;
		}
	public function getOdpornosc() {
		return $this->odpornosc;
		}
	public function setWitalnosc($s1) {
		$this->witalnosc = $s1;
		}
	public function setInstynkt($s2) {
		$this->instynkt = $s2;
		}
	public function setOdpornosc($s3) {
		$this->odpornosc = $s3;
		}
		
	public function getGlod() {
		return $this->glod; 
		} 
	
	public function setGlod($x) {
		$this->glod = $x; 
		}
		
	public function setPunktyZycia($pz){
		$this->punktyZycia = $pz;
		}
		
	public function getPunktyZycia(){
		return $this->punktyZycia;
		}
		
	public function getStado() {
		return $this->stado; 
		} 
	
	public function setStado($x) {
		$this->stado = $x; 
		}
		
	public function setWiek($x) {
	
		$this->wiek = $x;
		}
		
	public function getWiek(){
		return $this->wiek;
		}
		
	public function setPozycja($x,$y){
		$this->pozycja['x']=$x;
		$this->pozycja['y']=$y;
		}
		
	public function getPozycja(){
		return $this->pozycja;
	}
	public function setNumerZagrody($x){
		$this->numerZagrody = $x;
	}
	
	public function getNumerZagrody(){
		return $this->numerZagrody;
	}
	
	public function postarz(){
		$this->wiek++;
		if($this->getWiek() > 5)
			$this->smierc();
		}
	
	public function glod(){
		$this->glod--;
		if($this->getGlod() < 1)
			$this->smierc();
	}
	
	public function ranny(){
		$this->punktyZycia--;
		if($this->getPunktyZycia() < 1)
			$this->smierc();
	}
	
	public function ruch(){
	
		do{
			$a=rand(-1,1);
			$b=rand(-1,1);
			$pozycja=$this->getPozycja();
			$x = $pozycja['x']+$a;
			$y = $pozycja['y']+$b;
			while($x < 10 || $x > 20 || $y < 20 || $y > 30){
				$a=rand(-1,1);
				$b=rand(-1,1);
				$pozycja=$this->getPozycja();
				$x = $pozycja['x']+$a;
				$y = $pozycja['y']+$b;
			}
			}
		while($a == 0 && $b == 0);
		
		$pozycja=$this->getPozycja();
		
		$this->setPozycja(($pozycja['x'])+$a,($pozycja['y'])+$b);
	}
	
	public function oddzialuj($teren){
		
		switch($teren){
		
		
			case "2":
				$utrataKolejki = rand(1,100);
				if($utrataKolejki < 3)
					$this->czekaj();
				$witalnosc = $this->getWitalnosc();
				if($witalnosc < 4){
					$los = rand(0,1);
					if($los == 0)
						$this->ranny();
				}
				break;
				
			case "3":
				$utrataKolejki = rand(1,100);
				if($utrataKolejki < 5)
					$this->czekaj();
				$odpornosc = $this->getOdpornosc();
				if($odpornosc < 4){
					$los = rand(0,1);
					if($los == 0)
						$this->smierc();
					}
				break;
		
		}
	}
	
	public function reprodukcja(){
		
		for($i=0;$i<8; $i++){
			$tmp = getWspolrzedne($i);
			$wsp = explode(",", $tmp);
			$pozycja=$this->getPozycja();
			$x = $pozycja['x']+$a;
			$y = $pozycja['y']+$b;
			
			if($x >= 10 || $x <= 20 || $y >= 20 || $y <= 30){
				$org[$i] = clone $this;
				$org[$i]->setPozycja(($this->pozycja['x'])+$wsp[0],($this->pozycja['y'])+$wsp[1]);
			}
		}
	}
	
	public function czekaj() {}
	
	public function smierc() {
		$padlina = new Padlina();
		$padlina->setPozycja($this->pozycja['x'],$this->pozycja['y']);
		$this->anihilate();
	}
	
	public function zamordowany($atakujacy) {
		$mieso = new Mieso();
		$mieso->setPozycja($this->pozycja['x'],$this->pozycja['y']);
		$atakujacy->jedz($mieso);
		$this->anihilate();
	}

}

class Roslina extends Organizm {

	public function akcja($pogoda){

		/*if($this->getWiek() > 2 && $this->getGlod() > 8){
		
			$this->reprodukcja();
			}
		else if($this->getGlod()<8)
				$this->szukajJedzenia($pogoda);
		else
			$this->czekaj();*/
		
		if($this->getWiek() >3 && $this->getGlod() > 8)
			$this->reprodukcja();
		else if($this->getGlod()<9)
			$check = $this->szukajJedzenia($pogoda);
		else
			$this->ruch();

	}

	public function ruch(){
		Organizm::czekaj();
	}
	
	public function smierc() {
		$this->anihilate();
		}
	
	public function zamordowany($x){
		Organizm::czekaj();
		}
		
	public function reprodukcja(){
		
		/*for($i=0;$i<8; $i++){
			$tmp = getWspolrzedne($i);
			$wsp = explode(",", $tmp);
			$org[$i] = clone $this;
			$org[$i]->setPozycja(($this->pozycja['x'])+$wsp[0],($this->pozycja['y'])+$wsp[1]);
		}
		$instynkt = $this->getInstynkt();
		$los = rand(1,100);
		//echo $instynkt."-".$los." ";
		if($instynkt >= $los)
			$this->rozsiew();*/
			
		for($i=0;$i<8; $i++){
			$tmp = getWspolrzedne($i);
			$wsp = explode(",", $tmp);
			$pozycja=$this->getPozycja();
			$x = $pozycja['x']+$wsp[0];
			$y = $pozycja['y']+$wsp[1];
			
			if($x >= 10 || $x <= 20 || $y >= 20 || $y <= 30){
				$org[$i] = clone $this;
				$org[$i]->setPozycja(($this->pozycja['x'])+$wsp[0],($this->pozycja['y'])+$wsp[1]);
				//$org[$i]->setPozycja($x,$y);
			}
		}
	}
	
	public function rozsiew(){
		$pozycja=$this->getPozycja();
		$new = clone $this;
		
		$x=rand(-2,2);
		$tab = array(0=>-2,1=>2);
		if( $x > -2 && $x < 2){
			$y=rand(0,1);
			$y=$tab[$y];
			}
		else{
			$y=rand(-2,2);
		}
		$new->setPozycja(($pozycja['x'])+$x,($pozycja['y'])+$y);
	}
	
	public function szukajJedzenia($pogoda){
			
			$poz = $this->getPozycja();
			
			$this->jedz($pogoda[$poz['x']][$poz['y']]['slonce']);
			
		}
	
	public function jedz($slonce){
		
		
		$glod = $this->getGlod();
		$glod+=$slonce;
		if($glod>10)
			$glod=10;
		$this->setGlod($glod);
	
	}
	
	public function oddzialuj($teren){
		
		switch($teren){
		
		
			case "1":
				break;
				
			case "2":
			
				//brak szansy na rozsiew
			
				$witalnosc = $this->getWitalnosc();
				if($witalnosc < 4){
					$los = rand(0,1);
					if($los == 0)
						$this->ranny();
					}
				break;
				
			case "3":
				
				//brak szansy na rozsiew
				
				$odpornosc = $this->getOdpornosc();
				if($odpornosc < 4){
					$los = rand(0,1);
					if($los == 0)
						$this->smierc();
					}
				break;
				
			case "4":
				break;
				
			case "5":
				//s³aby rozsiew
				break;
				
			case "6":
				//s³aby rozsiew
				break;
				
			case "7":
				break;
		
		}
	}
	
}

class Roslinozerca extends Organizm {

	public function akcja($pojemnik){
	
		if($this->getWiek() >2 && $this->getGlod() > 8)
			$this->reprodukcja();
		else if($this->getGlod()<8)
			$check = $this->szukajJedzenia($pojemnik);
		else
			$this->ruch();
		
		if(isset($check) == true && $check == 0)
			$this->ruch();
	}

	public function unik(){
		$szansa = 3 * $this->getInstynkt();
		$los = rand(1,100);
		if($szansa >= $los)
			return "unik";
		else
			return "fiasko";
	}
	
	public function szukajJedzenia($pojemnik){
	
		$poz = $this->getPozycja();
		
		for($tmp=0;$tmp<count($pojemnik);$tmp++){
			if(gettype($pojemnik[$tmp]) == "object"){
				$pokarm = get_class($pojemnik[$tmp]);
				$pozycjaPokarmu = $pojemnik[$tmp]->getPozycja();
				if($pokarm == "Roslina" && $poz['x'] == $pozycjaPokarmu['x'] && $poz['y'] == $pozycjaPokarmu['y']){
					$papu=$pojemnik[$tmp];
					$this->jedz($papu);
					return 1;
					}
				else
					return 0;
				}
			}
	}
	
	public function jedz($roslina){

		$roslina->smierc();
		$this->setGlod(10);
	}
	
	public function oddzialuj($teren){
		
		switch($teren){
		
		
			case "1":
				//szansa zdobycia pozywienia
				break;
				
			case "2":
				$utrataKolejki = rand(1,100);
				if($utrataKolejki < 3)
					$this->czekaj();
				$witalnosc = $this->getWitalnosc();
				if($witalnosc < 4){
					$los = rand(0,1);
					if($los == 0)
						$this->ranny();
				}
				break;
				
			case "3":
				$utrataKolejki = rand(1,100);
				if($utrataKolejki < 5)
					$this->czekaj();
				$odpornosc = $this->getOdpornosc();
				if($odpornosc < 4){
					$los = rand(0,1);
					if($los == 0)
						$this->smierc();
					}
				break;
				
			case "4":
				//unik x2
				//szansa zdobycia pozywienia
				break;
				
			case "5":
				//unik x4
				break;
				
			case "6":
				//unik x4
				break;
				
			case "7":
				break;
		
		}
	}
}
	
class Padlinozerca extends Organizm {

	public function wech(){}
	
		public function szukajJedzenia($pokarm){
	
		$poz = $this->getPozycja();
		
	}
	
	public function sepienie($ofiara){
		$hp = $ofiara->getPunktyZycia();
		$hp--;
		$ofiara->setPunktyZycia($hp);
		
		if($ofiara->getPuntkyZycia() == 0){
			$padlina = $ofiara->smierc();
			$this->jedz($padlina);
			}
	}
	
	public function jedz($padlina){
		$poz = $this->getPozycja();
		$ilosc = $padlina->getIlosc();
		$ilosc--;
		$padlina->setIlosc($poz['x'],$poz['y']);
		$this->setGlod(10);
		}
	
}

class Miesozerca extends Organizm {

	public function wech(){
		$poz = $this->getPozycja();
		
		for($tmp=0;$tmp<count($pojemnik);$tmp++){
			
			$pokarm = get_class($pojemnik[$tmp]);
			$pozycjaPokarmu = $pojemnik[$tmp]->getPozycja();
			if($pokarm == "Roslinozerca" && $poz['x'] == $pozycjaPokarmu['x'] && $poz['y'] == $pozycjaPokarmu['y'])
				$this->atak($pojemnik[$tmp]);
			
			}
		
	}
	

	public function atak($ofiara){
	
		$result = $ofiara->unik();
		if($result=="fiasko"){
	
				$obrazenia = $this->getInstynkt() - $ofiara->getOdpornosc();
				$los = $ofiara->getPunktyZycia() - $obrazenia;
				if($los > 0)
					$ofiara->setPunktyZycia($los);
				else
					$ofiara->zamordowany($this);
			}
			else
				$ofiara->ruch();
	}
	
	public function jedz($mieso){
		$ilosc = $mieso->getIlosc();
		$ilosc--;
		$mieso->setIlosc($ilosc);
		$this->setGlod(10);
	}
	
}

class Padlina {
	

	private $pozycja=array();
	private $ilosc=0;
	
	public function __construct(){
		
		$this->ilosc+=1;
	}
	
	public function setIlosc($x){
		$this->ilosc = $x;
	}
	
	public function getIlosc(){
		return $this->ilosc;
	}
	
	public function setPozycja($x,$y){
		$this->pozycja['x']=$x;
		$this->pozycja['y']=$y;
		}
		
	public function getPozycja(){
		return $this->pozycja;
	}
	
	public function sprawdz($x,$y){

	}
}

class Mieso {


	private $pozycja=array();
	private $ilosc=0;
	
	public function __construct(){
		$this->ilosc+=2;
	}
	
	public function setIlosc($x){
		$this->ilosc = $x;
	}
	
	public function getIlosc(){
		return $this->ilosc;
	}
	
	public function setPozycja($x,$y){
		$this->pozycja['x']=$x;
		$this->pozycja['y']=$y;
		}
		
	public function getPozycja(){
		return $this->pozycja;
	}
	
}



?>
