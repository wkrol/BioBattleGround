<?php
class Strona
{

  // atrybuty klasy Strona
  
  public $tytul = "Biobattleground";
  public $slowa_kluczowe = "symulacja";
  
  //nadpisywane w zależności od obecnego działu
  public $przyciski = array("Startowa"   => "index.php",
						"Logowanie"   => "logowanie.php",
						"Administracja"   => "admin.php"
                        );
  //nadpisywane w zależności od obecnego działu
  public $nazwadzialu;	
  
  
	// operacje klasy Strona

  public function __set($nazwa, $wartosc)
  {
    $this->$nazwa = $wartosc;
  }
 
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
	if(isset($_SESSION["zalogowany"])){
		$this->WyswietlZawartosc();
	} else {
		$this->WyswietlKomunikat();
	}
    $this->WyswietlStopke();
    echo "</body>\n</html>\n";
  }

  public function WyswietlKodowanie()
  {
    echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />";
  }
  
  public function WyswietlTytul()
  {
    echo "<title> $this->tytul </title>";
  }

  public function WyswietlSlowaKluczowe()
  {
    echo "<meta name=\"keywords\" content=\"".$this->slowa_kluczowe."\" />";
  }

  public function WyswietlStyle()
  {
	echo "<link href=\"../../css/style.css\" rel=\"stylesheet\" type=\"text/css\" />";
  }
  
  public function WyswietlSkrypty()
  {
	echo "<script type=\"text/javascript\" src=\"../../scripts/script.js\"></script>";
  }

public function WyswietlNaglowek()
  {
?>
  <div id="strona">
	<div id="top">
		<?php
			if (isset($_SESSION['zalogowany'])) {
				echo "Witaj ".$_SESSION['zalogowany']."!";
			} else {
				echo "Odwiedzasz stronę jako niezalogowany użytkownik.";
			}
		?>
	</div>
	
	<div id="menu">

		<img id="menuleft" src="../../images/menubgleft.png" alt=""/><img  id="menulogo"src="../../images/logo.png" alt=""/>
		<img id="menuright" src="../../images/menubgright.png" alt=""/>
		
		<ul>
		<li>
		<a href="index.php">Strona główna</a> | 
		</li><li>
		<a href="symulacja.php">Symulacja</a> | 
		</li><li>
		<a href="organizmy.php">Organizmy</a> | 
		</li><li>
		<a href="klimaty.php">Klimaty</a> | 
		</li><li>
		<a href="mapy.php">Mapy</a>
		</li>
		</ul>
		
	</div>
<?php
  }

  public function WyswietlMenu($przyciski, $nazwadzialu)
  {
		echo "<div id=\"submenu\">";
		echo "<div id=\"tytulsubmenu\">";
		echo "<p>".$nazwadzialu."</p>";
		echo "</div>\n";
		echo "<ul>\n";

    //wyświetlanie przycisków
    

    foreach ($przyciski as $nazwa=>$url)
    {
     $this->WyswietlPrzycisk($nazwa, $url,
                             !$this->CzyToAktualnyURL($url));
    }
	echo "</ul>\n";
    echo "</div>";
    echo "<div id=\"content\">";
  }

  public function CzyToAktualnyURL($url)
  {
    if(strpos($_SERVER['PHP_SELF'], $url)==false)
    {
      return false;
    }
    else
    {
      return true;
    }
  }

  public function WyswietlPrzycisk($nazwa, $url, $active = true)
  {
    if($active) {
      echo "<li><a href=\"".$url."\" class=\"deactive\">".$nazwa."</a></li>";
    } else {
     echo "<li><a href=\"".$url."\" class=\"active\">".$nazwa."</a></li>";
    }
  }
  
  
    //nadpisywane w zależności od obecnej strony
  public function WyswietlZawartosc()
  {
    
  }

  public function WyswietlKomunikat()
  {
    echo "<img src=\"../../images/error.png\"><br/>By wyświetlić zawartość podstron należy się zalogować";
  }
  
  public function WyswietlStopke()
  {
?>
	</div>
	<div id="footer">
	<p>POMOC | KONTAKT | Wszelkie prawa zastrzeżone (C) 2011</p>
	</div>
<?php
  }
}
?>
