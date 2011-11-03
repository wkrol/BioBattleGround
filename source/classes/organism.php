<?php

//TODO: jeśli require jest konieczne, to niech to będzie require_once, ze ścieżką
require("stado.php");
require("wspolrzedne.php");
/*
 * Base Organism class
 * TODO: zmiana nazw funkcji i pól na angielskie,
 */
class Organism {
	
	private $id;
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
	
	/**
	 * create Organism function
	 *
	 * @param $name = organism's name
	 * @param $s1 = organism's vitality
	 * @param $s2 = organism's instinct
	 * @param $s3 = organism's resistance
	 */
	public function __construct($name, $vitality, $instinct, $toughness, $id = NULL){
	        $this->nazwa = $name;
	        $this->witalnosc = $vitality;
	        $this->instynkt = $instinct;
	        $this->odpornosc = $immunity;
					$this->punktyZycia = $this->witalnosc * 2;
					$this->stado = new Stado($this);
					$this->stado->setNazwa($name);
					$this->setNumerZagrody($this->stado->getId());
					$this->stado->dodajOrganizm($this);
			$this->id = $id;
		}
	/*
	 * clone Organism function
	 */
	public function __clone(){
			$this->punktyZycia= $this->witalnosc * 2;
			$this->glod = 10;
			$this->wiek = 0;
			$this->setNumerZagrody($this->stado->getId());
			$this->stado->dodajOrganizm($this);
		}
	/*
	 * Funkcja usuni�cia organizmu z zagrody
	 * i przesuni�cia id w zagrodzie
	 */
	public function anihilate(){
	
		$id = $this->getNumerZagrody();
		$this->stado -> zamien($id);

		unset($this);
	}
		
	
	public function setName($name){
	        $this->nazwa = $name;
	        }

	public function getName(){
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
	/*
	 * Funkcja postarzania organizm�w po ka�dej turze
	 * 
	 * Warto�� por�wnywana w funkcji if okre�la d�ugo�� �ycia organizm�w
	 * 
	 * TODO balans d�ugo�ci �ycia wraz z innymi czynnikami symulacji w celu
	 * TODO generowania przybli�onych do za�o�onych wynik�w symulacji
	 */
	public function postarz(){
		$this->wiek++;
		if($this->getWiek() > 5)
			$this->smierc();
		}
	/*
	 * Funkcja zwi�kszania g�odu ( poprzez zmniejszanie jego warto�ci :) )
	 * Gdy g��d spadnie do zera organizm umiera
	 */
	public function glod(){
		$this->glod--;
		if($this->getGlod() < 1)
			$this->smierc();
	}
	/*
	 * Funkcja odnoszenia ran przez organizmy na skutek g�odowania lub innych wydarze�
	 * W efekcie punkty �ycia danego organizmu s� zmniejszane o 1
	 * je�li osi�gn� warto�� < 1 to organizm umiera
	 */
	public function ranny(){
		$this->punktyZycia--;
		if($this->getPunktyZycia() < 1)
			$this->smierc();
	}
	/*
	 * Funkcja odpowiadaj�ca za poruszanie si� organizm�w
	 * Na razie w spos�b losowy
	 * 
	 * TODO stworzy� lepszy algorytm ruchu, szczeg�lnie w przypadku g�odu
	 */
	
	public function ruch(){
	
		do{
			$a=rand(-1,1);
			$b=rand(-1,1);
			$pozycja=$this->getPozycja();
			$x = $pozycja['x']+$a;
			$y = $pozycja['y']+$b;
			while($x <= 10 || $x >= 20 || $y <= 20 || $y >= 30){
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
	/**
	 * Funkcja oddzia�ywania organizmu na typ terenu na kt�rym si� znajduje
	 * 
	 * @param $teren = typ terenu ( VALUES = [0-7] )
	 * 
	 * Odnosi si� tylko do dw�ch typ�w teren�w, bo wszystkie organizmy w
	 * ten sam spos�b na nie reaguj�, pozosta�e typy tereny s� nadpisane
	 * w tej funkcji poszczeg�lnych typ�w organizm�w
	 * 
	 */
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
	/*
	 * Funkcja rozmna�ania si� organizm�w
	 * 
	 * Organizmy "rodz�" si� na o�miu s�siaduj�cych polach
	 */
	public function reprodukcja(){
		
		for($i=0;$i<8; $i++){
			$tmp = getWspolrzedne($i);
			$wsp = explode(",", $tmp);
			$pozycja=$this->getPozycja();
			$x = $pozycja['x']+$wsp[0];
			$y = $pozycja['y']+$wsp[1];
			
			/*
			 * Sprawdzanie czy wsp�rzedne mieszcz� si� w zakresie mapy
			 * 
			 * TODO Ustawi� granice wsp�rz�dnych ( wst�pnie 0 < $x < 30; 0 < $y < 50 ) 
			 */
			if($x >= 10 || $x <= 20 || $y >= 20 || $y <= 30){
				$org[$i] = clone $this;
				$org[$i]->setPozycja($x,$y);
			}
		}
	}
	/*
	 * Funkcja utraty kolejki
	 */
	public function czekaj() {}
	
	/*
	 * Funkcja �mierci organizmu
	 */
	public function smierc() {
		$this->anihilate();
	}
	/**
	 * Funkcja �mierci organizmu
	 * 
	 * @param Object $atakuj�cy = organizm zabijaj�cy ofiar�
	 * 
	 */
	public function smierc2($atakujacy){
		$this->anihilate();
		// Drapie�nik zjada ofiar� i jego nape�nia sw�j g��d
		$atakujacy->setGlod(10);
	}
	/**
	 * Funkcja �mierci organizmu i stworzenia mi�sa na jego pozycji
	 * 
	 * @param Object $atakujacy
	 * 
	 * TODO Aktualnie funkcja nie jest u�ywana, a mi�so nie jest przechowywane - naprawi� ;)
	 */
	public function zamordowany($atakujacy) {
		$mieso = new Mieso();
		$mieso->setPozycja($this->pozycja['x'],$this->pozycja['y']);
		$atakujacy->jedz($mieso);
		$this->anihilate();
	}

}

class Roslina extends Organizm {

	/**
	 * Funkcja wywo�ywana na pocz�tku ka�dej tury dla ka�dego organizmu.
	 * Na podstawie parametr�w organizmu i pogody okre�lana jest akcja jak�
	 * wykona organizm w danej turze.
	 * 
	 * @param Array $pogoda = tablica z pogod� na danej mapie w danej turze 
	 */
	public function akcja($pogoda){
		
		/*
		 * W ifach ustalane s� warto�ci parametr�w na podstawie, kt�rych
		 * organizmy wykonuj� dane akcje
		 * 
		 * TODO Doda� wi�cej zale�no�ci, zabalansowa� i ew .doda� nowe akcje
		 */
		if($this->getWiek() > 3 && $this->getGlod() > 8){
		
			$this->reprodukcja();
			}
		else if($this->getGlod()<8)
				$this->szukajJedzenia($pogoda);
		else
			$this->czekaj();		
	}
	/*
	 * Ro�liny nie mog� si� porusza�
	 */
	public function ruch(){
		Organizm::czekaj();
	}
	
	public function smierc() {
		$this->anihilate();
		}
	
	public function zamordowany($x){
		Organizm::czekaj();
		}
	/*
	 * Funkcja rozmna�ania Ro�lin
	 * 
	 * Funkcja dodatkowo uwzgl�dnia umiej�tno�c specjaln� rozsiew
	 */
	public function reprodukcja(){
			
		for($i=0;$i<8; $i++){
			$tmp = getWspolrzedne($i);
			$wsp = explode(",", $tmp);
			$pozycja=$this->getPozycja();
			$x = $pozycja['x']+$wsp[0];
			$y = $pozycja['y']+$wsp[1];
			
			if($x >= 10 || $x <= 20 || $y >= 20 || $y <= 30){
				$org[$i] = clone $this;
				$org[$i]->setPozycja($x,$y);
			}
		}
		$instynkt = $this->getInstynkt();
		$los = rand(1,100);

		if($instynkt >= $los)
			$this->rozsiew();
	}
	/*
	 * Funkcja rozsiewu ro�lin ( um. specjalna )
	 * 
	 * Rodzi si� dodatkowa ro�lina na polu s�siednim do kt�rego� z o�miu 
	 * otaczaj�cych organizm
	 */
	public function rozsiew(){
		$pozycja=$this->getPozycja();
		$new = clone $this;
		
		$check=FALSE;
		while($check == FALSE){
			$x=rand(-2,2);
			$tab = array(0=>-2,1=>2);
			if( $x > -2 && $x < 2){
				$y=rand(0,1);
				$y=$tab[$y];
			
				$pozX = $pozycja['x']+$x;
				$pozY = $pozycja['y']+$y;
			
				if($pozX >= 10 || $pozX <= 20 || $pozY >= 20 || $pozY <= 30)
					$check = TRUE;
				else
					continue;
			}
		else
			$y=rand(-2,2);
			
				$pozX = $pozycja['x']+$x;
				$pozY = $pozycja['y']+$y;
			
				if($pozX >= 10 || $pozX <= 20 || $pozY >= 20 || $pozY <= 30)
					$check = TRUE;
				else
					continue;
		}
		$new->setPozycja(($pozycja['x'])+$x,($pozycja['y'])+$y);
	}
	/**
	 * Funkcja szukania jedzenia na podstawie nas�onecznienia na danym polu
	 * 
	 * @param Array $pogoda = tablica z pogod� na danej mapie w danej turze 
	 */
	public function szukajJedzenia($pogoda){
			
			$poz = $this->getPozycja();
			
			$this->jedz($pogoda[$poz['x']][$poz['y']]['slonce']);
			
		}
	/**
	 * Funkcja spo�ywania s�o�ca :) 
	 * 
	 * @param int $slonce = warto�� nas�onecznienia na polu na kt�rym znajduje 
	 * si� organizm
	 */
	public function jedz($slonce){
		
		
		$glod = $this->getGlod();
		$glod+=$slonce;
		if($glod>10)
			$glod=10;
		$this->setGlod($glod);
	
	}
	/**
	 *  Funkcja oddzia�ywania organizmu na typ terenu na kt�rym si� znajduje
	 * 
	 * @param int $teren = typ terenu ( VALUES = [0-7] )
	 * 
	 * @override Organizm::oddzialuj($teren)
	 */
	public function oddzialuj($teren){
		/*
		 * TODO Stworzy� zale�no�ci dla ro�lin od wszystkich typ�w terenu
		 */
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
				//s�aby rozsiew
				break;
				
			case "6":
				//s�aby rozsiew
				break;
				
			case "7":
				break;
		
		}
	}
	
}


class Roslinozerca extends Organizm {
	/**
	* Funkcja wywo�ywana na pocz�tku ka�dej tury dla ka�dego organizmu.
	* Na podstawie parametr�w organizmu i tabeli organizm�w okre�lana jest akcja jak�
	* wykona organizm w danej turze.
	*
	* @param Array $pojemnik = tabela z organizmami
	*/
	public function akcja($pojemnik){
		/*
		* W ifach ustalane s� warto�ci parametr�w na podstawie, kt�rych
		* organizmy wykonuj� dane akcje
		*
		* TODO Doda� wi�cej zale�no�ci, zabalansowa� i ew .doda� nowe akcje
		*/
		if($this->getWiek() >2 && $this->getGlod() > 7)
			$this->reprodukcja();
		else if($this->getGlod()<9)
			$check = $this->szukajJedzenia($pojemnik);
		else
			$this->ruch();
		
		if(isset($check) == true && $check == 0)
			$this->ruch();
	}
	/** Funkcja uniku organizmu ( um. specjalna ro�lino�erc�w )
	 * 
	 * Losuje na podstawie @param int $szansa czy organizm wykona unik
	 */
	public function unik(){
		$szansa = 3 * $this->getInstynkt();
		$los = rand(1,100);
		if($szansa >= $los)
			return "unik";
		else
			return "fiasko";
	}
	/**
	* Funkcja szukania jedzenia ( ro�lin )
	*
	* @param Array $pojemnik = tabela z organizmami
	*/
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
	/**
	 * Funkcja spo�ywania jedzenia
	 * 
	 * @param Object $roslina = ro�lina, kt�ra jest zabijania w wyniku zjedzenia
	 */
	public function jedz($roslina){

		$roslina->smierc();
		$this->setGlod(10);
	}
	/**
	*  Funkcja oddzia�ywania organizmu na typ terenu na kt�rym si� znajduje
	*
	* @param int $teren = typ terenu ( VALUES = [0-7] )
	*
	* @override Organizm::oddzialuj($teren)
	*/
	public function oddzialuj($teren){
		/*
		* TODO Stworzy� zale�no�ci dla ro�lin od wszystkich typ�w terenu
		*/
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
	/**
	* Funkcja wywo�ywana na pocz�tku ka�dej tury dla ka�dego organizmu.
	* Na podstawie parametr�w organizmu i tabeli organizm�w okre�lana jest akcja jak�
	* wykona organizm w danej turze.
	*
	* @param Array $pojemnik = tabela z organizmami
	*/
	public function akcja($pojemnik){
		/*
		* W ifach ustalane s� warto�ci parametr�w na podstawie, kt�rych
		* organizmy wykonuj� dane akcje
		*
		* TODO Doda� wi�cej zale�no�ci, zabalansowa� i ew .doda� nowe akcje
		*/
		if($this->getWiek() >2 && $this->getGlod() > 7)
			$this->reprodukcja();
		else if($this->getGlod()<9)
			$check = $this->wech($pojemnik);
		else
			$this->ruch();
		
		/*if(isset($check) == true && $check == 0)
			$this->ruch();*/
	
		}
	/** 
	 * Funkcja w�chu padlino�erc�w - poszukiwania jedzenia przez drapie�nik�w
	 * 
	 * @param Array $pojemnik = tabela z organizmami
	 * 
	 * TODO Zoptymalizowa�, stworzy� lepszy algorytm wyszukiwania, uwzgl�dni� padlin�
	 */
	public function wech($pojemnik){
	
		$poz = $this->getPozycja();
		
		for($tmp=0;$tmp<count($pojemnik);$tmp++){
			if(gettype($pojemnik[$tmp]) == "object"){
				$pokarm = get_class($pojemnik[$tmp]);
				$pozycjaPokarmu = $pojemnik[$tmp]->getPozycja();
				
					if($pokarm === "Roslinozerca" && $poz['x'] == $pozycjaPokarmu['x'] && $poz['y'] == $pozycjaPokarmu['y']){
						$papu=$pojemnik[$tmp];
						$this->sepienie($papu);
						break;
						}
				}
		}
	}
	
	/**
	 * Funkcja s�pienia ( um. specjalna padlino�erc�w )
	 * 
	 * Umiej�tno�� polega na przyspieszaniu �mierci organizmu wybranego 
	 * jako ofiara stopniowo zmniejszaj�c jego punkty �ycia i zwi�kszaj�c g��d
	 * 
	 * @param Object $ofiara = Organizm wybrany jako ofiara 
	 * 
	 * TODO Sprawdzi� poprawno��, zabalansowa� pot�g� s�pienia 
	 */
	
	public function sepienie($ofiara){
	
		$result = $ofiara->unik();
		if(isset($result) != TRUE ||$result=="fiasko"){
			
			/*$hp = $ofiara->getPunktyZycia();
			$hp--;
			$ofiara->setPunktyZycia($hp);*/
			
			$glod = $ofiara->getGlod();
			$glod-=2;
			$ofiara->setGlod($glod);
			
			$zycie = $ofiara->getPunktyZycia();
			$glod = $ofiara->getGlod();
			if($zycie < 1 || $glod < 1){
				$ofiara->smierc2($this);
				
				}
		}
	}
	/**
	 * Funkcja spo�ywania padliny
	 * 
	 * @param Object $padlina = pokarm dla padlino�erc�w, powsta�y w wyniku �mierci
	 * organizmu na skutek inny ni� atak innego organizmu
	 * 
	 * TODO Aktualnie nieu�ywana, bo pokarm nie jest przechowywwany na mapie - naprawi� :)
	 */
	public function jedz($padlina){
		
		$this->setGlod(10);
		unset($padlina);
		}
	
}

class Miesozerca extends Organizm {
	/**
	* Funkcja wywo�ywana na pocz�tku ka�dej tury dla ka�dego organizmu.
	* Na podstawie parametr�w organizmu i tabeli organizm�w okre�lana jest akcja jak�
	* wykona organizm w danej turze.
	*
	* @param Array $pojemnik = tablica z organizmami
	*/
	public function akcja($pojemnik){
		/*
		* W ifach ustalane s� warto�ci parametr�w na podstawie, kt�rych
		* organizmy wykonuj� dane akcje
		*
		* TODO Doda� wi�cej zale�no�ci, zabalansowa� i ew .doda� nowe akcje
		*/
		if($this->getWiek() >2 && $this->getGlod() > 7)
			$this->reprodukcja();
		else if($this->getGlod()<9)
			$this->wech($pojemnik);
		else
			$this->ruch();
		
		/*if(isset($check) == true && $check == 0)
			$this->ruch();*/
	
		}
	/**
	* Funkcja w�chu mi�so�erc�w - poszukiwania jedzenia przez drapie�nik�w
	*
	* @param Array $pojemnik = tabela z organizmami
	*
	* TODO Zoptymalizowa�, stworzy� lepszy algorytm wyszukiwania, uwzgl�dni� mi�so
	*/
	public function wech($pojemnik){			
			
		$poz = $this->getPozycja();
		
		for($tmp=0;$tmp<count($pojemnik);$tmp++){
			if(gettype($pojemnik[$tmp]) == "object"){
				$pokarm = get_class($pojemnik[$tmp]);
				$pozycjaPokarmu = $pojemnik[$tmp]->getPozycja();
				if($pokarm == "Roslinozerca" && $poz['x'] == $pozycjaPokarmu['x'] && $poz['y'] == $pozycjaPokarmu['y']){
						$papu=$pojemnik[$tmp];
						$this->atak($papu);
						
						break;
						}
						
				}
			}
		
	}
	
	/**
	 * Funkcja ataku innego organizmu ( um. specjalna mi�so�erc�w )
	 * 
	 * @param Object $ofiara = organizm wybrany jako ofiara
	 * 
	 * Tu ustalana jest si�a obra�e� jakie zadaje dany organizm
	 * 
	 * TODO zbalansowa�, napisa� funkcj� tworzenia mi�sa na danym polu 
	 */
	public function atak($ofiara){
	
		$result = $ofiara->unik();
		if($result=="fiasko"){
	
				$obrazenia = 2 * $this->getInstynkt() - $ofiara->getOdpornosc();
				$los = $ofiara->getPunktyZycia() - $obrazenia;
				if($los > 0)
					$ofiara->setPunktyZycia($los);
				else
					$ofiara->zamordowany($this);
			}
			else
				$ofiara->ruch();
	}
	/**
	* Funkcja spo�ywania mi�sa
	*
	* @param Object $mieso = pokarm dla mi�so�erc�w, powsta�y w wyniku �mierci
	* organizmu na skutek ataku innego organizmu
	*
	* TODO Aktualnie nieu�ywana, bo pokarm nie jest przechowywwany na mapie - naprawi� :)
	*/
	public function jedz($mieso){
		$ilosc = $mieso->getIlosc();
		$ilosc--;
		$mieso->setIlosc($ilosc);
		$this->setGlod(10);
	}
	
}


/*
 * Klasa Padlina definiuje pokarm dla padlino�erc�w
 * 
 * TODO Niewykorzystywana w symulacji - naprawi�
 */
class Padlina {
	

	private $ilosc=0;
	
	public function __construct(){
		$this->ilosc++;
	}
	
	public function setIlosc($x){
		$this->ilosc = $x;
	}
	
	public function getIlosc(){
		return $this->ilosc;
	}
	
}
/*
 * Klasa Mi�so definiuje pokarm dla mi�so�erc�w
 * 
 * TODO Niewykorzystywana w symulacji - naprawi�
 */
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
