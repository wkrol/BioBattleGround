<?php
require("symulacjaClass.php");

$symulacja = new Symulacja("nowa");
$mapa = $symulacja->wczytajMalaMape("dziwna");
$klimat = $symulacja->wczytajKlimat("okrutny");
$pogoda = $symulacja->stworzMalaPogode($klimat,$mapa);

$o[0] = new Roslina("krzak",3,8,5);
$o[0]->setPozycja(13,26);
$o[0]->reprodukcja();
$o[1] = new Roslinozerca("wrona",6,3,5);
$o[1]->setPozycja(13,26);
$o[1]->reprodukcja();
$o[1]->setGlod(8);
$o[2] = new Padlinozerca("hiena",2,4,4);
$o[2]->setPozycja(16,24);
$o[2]->reprodukcja();
$o[3] = new Miesozerca("pantera",4,5,4);
$o[3]->setPozycja(15,24);
$o[3]->reprodukcja();
$symulacja->napelnijPojemnik($o);
$pojemnik = $symulacja->getPojemnik();
$string = kreuj($mapa,$pojemnik);

for($czas=0;$czas<25;$czas++){
	
	
	for($k=0;$k<count($pojemnik);$k++){
		if(gettype($pojemnik[$k]) == "object"){
			$typ = get_class($pojemnik[$k]);
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
		else
			continue;
		}
	$pojemnik=$symulacja->tworzPojemnik($o);
	
	$thing[$czas] = kreuj($mapa,$pojemnik);
	//echo "-----------------------------------------------------------------------------";

	}
	

?>