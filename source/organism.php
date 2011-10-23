<?php
require("stado.php");
require("wspolrzedne.php");
/*
 * Base Organism class
 */
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
	
	/**
	 * create Organism function
	 *
	 * @param $name = organism's name
	 * @param $s1 = organism's vitality
	 * @param $s2 = organism's instinct
	 * @param $s3 = organism's resistance
	 */
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
	 * Funkcja usuniêcia organizmu z zagrody
	 * i przesuniêcia id w zagrodzie
	 */
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
	/*
	 * Funkcja postarzania organizmów po ka¿dej turze
	 * 
	 * Wartoœæ porównywana w funkcji if okreœla d³ugoœæ ¿ycia organizmów
	 * 
	 * TODO balans d³ugoœci ¿ycia wraz z innymi czynnikami symulacji w celu
	 * TODO generowania przybli¿onych do za³o¿onych wyników symulacji
	 */
	public function postarz(){
		$this->wiek++;
		if($this->getWiek() > 5)
			$this->smierc();
		}
	/*
	 * Funkcja zwiêkszania g³odu ( poprzez zmniejszanie jego wartoœci :) )
	 * Gdy g³ód spadnie do zera organizm umiera
	 */
	public function glod(){
		$this->glod--;
		if($this->getGlod() < 1)
			$this->smierc();
	}
	/*
	 * Funkcja odnoszenia ran przez organizmy na skutek g³odowania lub innych wydarzeñ
	 * W efekcie punkty ¿ycia danego organizmu s¹ zmniejszane o 1
	 * jeœli osi¹gn¹ wartoœæ < 1 to organizm umiera
	 */
	public function ranny(){
		$this->punktyZycia--;
		if($this->getPunktyZycia() < 1)
			$this->smierc();
	}
	/*
	 * Funkcja odpowiadaj¹ca za poruszanie siê organizmów
	 * Na razie w sposób losowy
	 * 
	 * TODO stworzyæ lepszy algorytm ruchu, szczególnie w przypadku g³odu
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
	 * Funkcja oddzia³ywania organizmu na typ terenu na którym siê znajduje
	 * 
	 * @param $teren = typ terenu ( VALUES = [0-7] )
	 * 
	 * Odnosi siê tylko do dwóch typów terenów, bo wszystkie organizmy w
	 * ten sam sposób na nie reaguj¹, pozosta³e typy tereny s¹ nadpisane
	 * w tej funkcji poszczególnych typów organizmów
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
	 * Funkcja rozmna¿ania siê organizmów
	 * 
	 * Organizmy "rodz¹" siê na oœmiu s¹siaduj¹cych polach
	 */
	public function reprodukcja(){
		
		for($i=0;$i<8; $i++){
			$tmp = getWspolrzedne($i);
			$wsp = explode(",", $tmp);
			$pozycja=$this->getPozycja();
			$x = $pozycja['x']+$wsp[0];
			$y = $pozycja['y']+$wsp[1];
			
			/*
			 * Sprawdzanie czy wspó³rzedne mieszcz¹ siê w zakresie mapy
			 * 
			 * TODO Ustawiæ granice wspó³rzêdnych ( wstêpnie 0 < $x < 30; 0 < $y < 50 ) 
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
	 * Funkcja œmierci organizmu
	 */
	public function smierc() {
		$this->anihilate();
	}
	/**
	 * Funkcja œmierci organizmu
	 * 
	 * @param Object $atakuj¹cy = organizm zabijaj¹cy ofiarê
	 * 
	 */
	public function smierc2($atakujacy){
		$this->anihilate();
		// Drapie¿nik zjada ofiarê i jego nape³nia swój g³ód
		$atakujacy->setGlod(10);
	}
	/**
	 * Funkcja œmierci organizmu i stworzenia miêsa na jego pozycji
	 * 
	 * @param Object $atakujacy
	 * 
	 * TODO Aktualnie funkcja nie jest u¿ywana, a miêso nie jest przechowywane - naprawiæ ;)
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
	 * Funkcja wywo³ywana na pocz¹tku ka¿dej tury dla ka¿dego organizmu.
	 * Na podstawie parametrów organizmu i pogody okreœlana jest akcja jak¹
	 * wykona organizm w danej turze.
	 * 
	 * @param Array $pogoda = tablica z pogod¹ na danej mapie w danej turze 
	 */
	public function akcja($pogoda){
		
		/*
		 * W ifach ustalane s¹ wartoœci parametrów na podstawie, których
		 * organizmy wykonuj¹ dane akcje
		 * 
		 * TODO Dodaæ wiêcej zale¿noœci, zabalansowaæ i ew .dodaæ nowe akcje
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
	 * Roœliny nie mog¹ siê poruszaæ
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
	 * Funkcja rozmna¿ania Roœlin
	 * 
	 * Funkcja dodatkowo uwzglêdnia umiejêtnoœc specjaln¹ rozsiew
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
	 * Funkcja rozsiewu roœlin ( um. specjalna )
	 * 
	 * Rodzi siê dodatkowa roœlina na polu s¹siednim do któregoœ z oœmiu 
	 * otaczaj¹cych organizm
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
	 * Funkcja szukania jedzenia na podstawie nas³onecznienia na danym polu
	 * 
	 * @param Array $pogoda = tablica z pogod¹ na danej mapie w danej turze 
	 */
	public function szukajJedzenia($pogoda){
			
			$poz = $this->getPozycja();
			
			$this->jedz($pogoda[$poz['x']][$poz['y']]['slonce']);
			
		}
	/**
	 * Funkcja spo¿ywania s³oñca :) 
	 * 
	 * @param int $slonce = wartoœæ nas³onecznienia na polu na którym znajduje 
	 * siê organizm
	 */
	public function jedz($slonce){
		
		
		$glod = $this->getGlod();
		$glod+=$slonce;
		if($glod>10)
			$glod=10;
		$this->setGlod($glod);
	
	}
	/**
	 *  Funkcja oddzia³ywania organizmu na typ terenu na którym siê znajduje
	 * 
	 * @param int $teren = typ terenu ( VALUES = [0-7] )
	 * 
	 * @override Organizm::oddzialuj($teren)
	 */
	public function oddzialuj($teren){
		/*
		 * TODO Stworzyæ zale¿noœci dla roœlin od wszystkich typów terenu
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
	/**
	* Funkcja wywo³ywana na pocz¹tku ka¿dej tury dla ka¿dego organizmu.
	* Na podstawie parametrów organizmu i tabeli organizmów okreœlana jest akcja jak¹
	* wykona organizm w danej turze.
	*
	* @param Array $pojemnik = tabela z organizmami
	*/
	public function akcja($pojemnik){
		/*
		* W ifach ustalane s¹ wartoœci parametrów na podstawie, których
		* organizmy wykonuj¹ dane akcje
		*
		* TODO Dodaæ wiêcej zale¿noœci, zabalansowaæ i ew .dodaæ nowe akcje
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
	/** Funkcja uniku organizmu ( um. specjalna roœlino¿erców )
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
	* Funkcja szukania jedzenia ( roœlin )
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
	 * Funkcja spo¿ywania jedzenia
	 * 
	 * @param Object $roslina = roœlina, która jest zabijania w wyniku zjedzenia
	 */
	public function jedz($roslina){

		$roslina->smierc();
		$this->setGlod(10);
	}
	/**
	*  Funkcja oddzia³ywania organizmu na typ terenu na którym siê znajduje
	*
	* @param int $teren = typ terenu ( VALUES = [0-7] )
	*
	* @override Organizm::oddzialuj($teren)
	*/
	public function oddzialuj($teren){
		/*
		* TODO Stworzyæ zale¿noœci dla roœlin od wszystkich typów terenu
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
	* Funkcja wywo³ywana na pocz¹tku ka¿dej tury dla ka¿dego organizmu.
	* Na podstawie parametrów organizmu i tabeli organizmów okreœlana jest akcja jak¹
	* wykona organizm w danej turze.
	*
	* @param Array $pojemnik = tabela z organizmami
	*/
	public function akcja($pojemnik){
		/*
		* W ifach ustalane s¹ wartoœci parametrów na podstawie, których
		* organizmy wykonuj¹ dane akcje
		*
		* TODO Dodaæ wiêcej zale¿noœci, zabalansowaæ i ew .dodaæ nowe akcje
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
	 * Funkcja wêchu padlino¿erców - poszukiwania jedzenia przez drapie¿ników
	 * 
	 * @param Array $pojemnik = tabela z organizmami
	 * 
	 * TODO Zoptymalizowaæ, stworzyæ lepszy algorytm wyszukiwania, uwzglêdniæ padlinê
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
	 * Funkcja sêpienia ( um. specjalna padlino¿erców )
	 * 
	 * Umiejêtnoœæ polega na przyspieszaniu œmierci organizmu wybranego 
	 * jako ofiara stopniowo zmniejszaj¹c jego punkty ¿ycia i zwiêkszaj¹c g³ód
	 * 
	 * @param Object $ofiara = Organizm wybrany jako ofiara 
	 * 
	 * TODO Sprawdziæ poprawnoœæ, zabalansowaæ potêgê sêpienia 
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
	 * Funkcja spo¿ywania padliny
	 * 
	 * @param Object $padlina = pokarm dla padlino¿erców, powsta³y w wyniku œmierci
	 * organizmu na skutek inny ni¿ atak innego organizmu
	 * 
	 * TODO Aktualnie nieu¿ywana, bo pokarm nie jest przechowywwany na mapie - naprawiæ :)
	 */
	public function jedz($padlina){
		
		$this->setGlod(10);
		unset($padlina);
		}
	
}

class Miesozerca extends Organizm {
	/**
	* Funkcja wywo³ywana na pocz¹tku ka¿dej tury dla ka¿dego organizmu.
	* Na podstawie parametrów organizmu i tabeli organizmów okreœlana jest akcja jak¹
	* wykona organizm w danej turze.
	*
	* @param Array $pojemnik = tablica z organizmami
	*/
	public function akcja($pojemnik){
		/*
		* W ifach ustalane s¹ wartoœci parametrów na podstawie, których
		* organizmy wykonuj¹ dane akcje
		*
		* TODO Dodaæ wiêcej zale¿noœci, zabalansowaæ i ew .dodaæ nowe akcje
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
	* Funkcja wêchu miêso¿erców - poszukiwania jedzenia przez drapie¿ników
	*
	* @param Array $pojemnik = tabela z organizmami
	*
	* TODO Zoptymalizowaæ, stworzyæ lepszy algorytm wyszukiwania, uwzglêdniæ miêso
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
	 * Funkcja ataku innego organizmu ( um. specjalna miêso¿erców )
	 * 
	 * @param Object $ofiara = organizm wybrany jako ofiara
	 * 
	 * Tu ustalana jest si³a obra¿eñ jakie zadaje dany organizm
	 * 
	 * TODO zbalansowaæ, napisaæ funkcjê tworzenia miêsa na danym polu 
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
	* Funkcja spo¿ywania miêsa
	*
	* @param Object $mieso = pokarm dla miêso¿erców, powsta³y w wyniku œmierci
	* organizmu na skutek ataku innego organizmu
	*
	* TODO Aktualnie nieu¿ywana, bo pokarm nie jest przechowywwany na mapie - naprawiæ :)
	*/
	public function jedz($mieso){
		$ilosc = $mieso->getIlosc();
		$ilosc--;
		$mieso->setIlosc($ilosc);
		$this->setGlod(10);
	}
	
}


/*
 * Klasa Padlina definiuje pokarm dla padlino¿erców
 * 
 * TODO Niewykorzystywana w symulacji - naprawiæ
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
 * Klasa Miêso definiuje pokarm dla miêso¿erców
 * 
 * TODO Niewykorzystywana w symulacji - naprawiæ
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
