<?php

class Stado {

	private $id;
	private $nazwa;
	private $zagroda=array();
	
	
	public function __construct(){
	
		$this->id=0;
	
	}
	
	public function zamien($a){
		$ilosc = $this->getId();
		for($i=$a;$i<$ilosc;$i++){
			$this->setZagroda($i,@$this->zagroda[$i+1]);
			$org = $this->getOrganizm($i);
			if(isset($org))
				$org->setNumerZagrody($i);
		}
		unset($this->zagroda[$i+1]);
		//$ilosc--;
		//$this->setId($ilosc);
		
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