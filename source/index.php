<?php
session_start();
	require("strona.php");
	
	class StronaGlowna extends Strona {
	
	public function Wyswietl()
  {
	echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">";
    echo "<html xmlns=\"http://www.w3.org/1999/xhtml\">\n<head>\n";
	$this->WyswietlKodowanie();
    $this->WyswietlTytul();
    $this->WyswietlSlowaKluczowe();
    $this->WyswietlStyle();
	$this->WyswietlSkrypty();
    echo "</head>\n<body>\n";
    $this->WyswietlNaglowek();
    $this->WyswietlMenu($this->przyciski, $this->nazwadzialu);
	$this->WyswietlZawartosc();
    $this->WyswietlStopke();
    echo "</body>\n</html>\n";
  }
	
	public function WyswietlZawartosc() {
		echo "Witaj w symulacji organizmów w modelu biologicznym \"Biobattleground\"! <br/><br/>By uzyskać dostęp do wszystkich możliwości systemu należy posiadać własne konto i zalogować się.";
	}
	}
	$strona = new StronaGlowna();
	$strona -> nazwadzialu = "Strona Główna";
	$strona -> Wyswietl();
?>