<?php
/**
 * 
 * Klasa generująca szablon strony
 * @example
 * $page = new Page();
 * $page->addScript(nowyskrypt.js);
 * //nadpisanie WyswietlZawartosc()		// dla kompatybilności z przygotowanymi już stronami
 * $page->render();						// renderuje przygotowaną stronę
 *
 */
class Page {
	
	private $dtd = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">';
	
	private $keywords = 'symulacja, biobattleground';
	
	private $pageName = 'BioBattleground';
	
	private $encoding = 'utf-8';
	
	private $styles = array('style.css');
	
	private $scripts = array('jquery-ui-1.8.9.custom/js/jquery-1.4.4.min.js',
							 'script.js'
							 );
	private $buttons = array("Startowa"   => "index.php",
						"Administracja"   => "admin.php"
                        );
	
	private $subpageName = '';
	
	/**
	 * Sprawdzamy, czy istnieje ID sesji.
	 * Jeśli nie, tworzymy nową sesję
	 */
	public function __construct() {
		if(!session_id()) {
			session_start();
			session_name('bbg');
		}
	}
	
	/*
	 * Metody publiczne
	 */
	public function render() {
		print $this->dtd.
		$this->generateHead();
		
		print '<body>'.
		$this->generateTop().
		$this->generateMenu($this->buttons, $this->subpageName).
		$this->WyswietlZawartosc().
		$this->generateFooter().
		'	</body>
		</html>';
	}
	
	public function addScript($script) {
		array_push($this->scripts, $script);
	}
	public function addStyle($style) {
		array_push($this->styles, $style);
	}
	
	public function setButtons($buttons) {
		$this->buttons = $buttons;
	}
	public function setSubpageName($name) {
		$this->subpageName = $name;
	}
	
	/*
	 * Metody wewnętrzne, używane przez klasę do generowania kodu HTML
	 */
	private function generateHead() {
		$head = '<head>
		<title>'.$this->pageName.'</title>
		<meta http-equiv="Content-Type" content="text/html; charset='.$this->encoding.'"/>';
		/* Generowanie listy styli */
		foreach ($this->styles as $style) {
			$head .= '<link rel="stylesheet" type="text/css" href="../../css/'.$style.'"/>'; //Ścieżkę można zrobić generowaną php'em potem
		}
		/* Generowanie listy skryptów */
		foreach ($this->scripts as $script) {
			$head .= '<script type="text/javascript" src="../../scripts/'.$script.'"></script>';
		}
		$head .= '</head>';
		
		return $head;
	}
	
	/*
	 * Poniższe metody są na razie kopią tych ze strona.php
	 * Jak będzie czas, można to wygładzić ;)
	 */
	private function generateTop() {
		?>
		  <div id="strona">
			<div id="top">
				<?php
					if (isset($_SESSION['zalogowany'])) {
						echo "Witaj ".$_SESSION['zalogowany']."! <a href=\"logowanie.php?wyloguj=tak\">Wyloguj</a>";
					} else {
						echo "Odwiedzasz stronę jako niezalogowany użytkownik. <a href=\"logowanie.php\">Zaloguj się</a>";
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
	
	private function generateMenu($przyciski, $nazwadzialu) {
		echo "<div id=\"submenu\">";
		echo "<div id=\"tytulsubmenu\">";
		echo "<p>".$nazwadzialu."</p>";
		echo "</div>\n";
		echo "<ul>\n";
		
		//wyświetlanie przycisków
		
		
		foreach ($przyciski as $nazwa=>$url)
		{
			$this->generateButton($nazwa, $url,
			!$this->ifActiveUrl($url));
		}
		echo "</ul>\n";
		echo "</div>";
		echo "<div id=\"content\">";
	}
	
	private function ifActiveUrl($url) {
		if(strpos($_SERVER['PHP_SELF'], $url)==false) {
			return false;
		}
		else {
			return true;
		}
	}
	
	private function generateButton($nazwa, $url, $active = true)
	{
		if($active) {
			echo "<li><a href=\"".$url."\" class=\"deactive\">".$nazwa."</a></li>";
		} else {
			echo "<li><a href=\"".$url."\" class=\"active\">".$nazwa."</a></li>";
		}
	}
	
	private function showNotification()
	{
		echo "<img src=\"../../images/error.png\"><br/>By wyświetlić zawartość podstron należy się zalogować";
	}
	
	private function generateFooter() {
		?>
		</div>
		<div id="footer">
		<p>POMOC | KONTAKT | Wszelkie prawa zastrzeżone (C) 2011</p>
		</div>
		<?php
	}
	
	/* nadpisywane w zależności od obecnej strony
	 * TODO zmienić sposób generowania zawartości...
	 */
	public function WyswietlZawartosc()
	{
	
	}
}