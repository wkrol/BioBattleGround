<?php

class Group {

	private $id;
	private $nazwa;
	private $zagroda=array();
	
	
	public function __construct($id = 0, $nazwa, $zagroda){
		
		$this->id = $id;
		$this->nazwa = $nazwa;
		
		//TODO: Sprawdzi�, czy to ma sens - nie patrzy�em czym dok�adnie jest zagroda ~Szorstki
		$count = 0;
		foreach ($zagrod as $organism) {
			$this->zagroda[$count] = $organism;
			$count++;
		}
	}
	/**
	 * Funkcja przesuwania organizm�w w stadzie po usuni�ciu jednego z nich
	 * 
	 * @param int $a = id organizmu w stadzie od kt�rego b�dzie nast�powa�o przesuwanie
	 */
	public function zamien($a){
		$ilosc = $this->getId();
		for($i=$a;$i<$ilosc;$i++){
			$this->setZagroda($i,@$this->zagroda[$i+1]);
			$org = $this->getOrganizm($i);
			if(isset($org))
				$org->setNumerZagrody($i);
		}
		unset($this->zagroda[$i+1]);
		
	}
	
	public function getId(){
	
		return $this->id;
	}
	
	public function setId($id){
	
		$this->id = $id;
		
	}

	public function getNazwa(){
	
		return $this->nazwa;
	}
	
	public function setNazwa($nazwa){
	
		$this->nazwa = $nazwa;
		
	}
	
	public function getOrganizm($x) {
		
		return $this->zagroda[$x]; 
	}
	
	public function getZagroda(){
		return $this->zagroda;
	}
	
	public function setZagroda($x,$org) {
		$this->zagroda[$x] = $org;
	} 

	public function dodajOrganizm($org){
		
			$this->zagroda[$this->id] = &$org;
			$this->id++;
		
	}

}




?>