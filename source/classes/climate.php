<?php

class Climate {

	private $id;
	private $nazwa;
	private $deszcz;
	private $wiatr;
	private $naslonecznienie;

public function __construct($nazwa, $deszcz, $wiatr, $naslonecznienie, $id = NULL){
		$this->nazwa = $nazwa;
		$this->deszcz = $deszcz;
		$this->wiatr = $wiatr;
		$this->naslonecznienie = $naslonecznienie;
		$this->id = $id;
		}
		
public function setNazwa($name){
		$this->nazwa = $name;
		}
		
public function getNazwa(){
		return $this->nazwa;
		}
		
public function setDeszcz($value){
		$this->deszcz = $value;
		}
		
public function getDeszcz(){
		return $this->deszcz;
		}

public function setWiatr($value){
		$this->wiatr = $value;
		}
		
public function getWiatr(){
		return $this->wiatr;
		}
		
public function setNaslonecznienie($value){
		$this->naslonecznienie = $value;
		}
		
public function getNaslonecznienie(){
		return $this->naslonecznienie;
		}


}


?>