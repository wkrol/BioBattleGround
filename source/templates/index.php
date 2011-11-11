<?php
require_once 'base/page.php';
	
class StronaGlowna extends Page {
	
	
	public function WyswietlZawartosc() {
		echo "Witaj w symulacji organizmów w modelu biologicznym \"Biobattleground\"! <br/><br/>By uzyskać dostęp do wszystkich możliwości systemu należy posiadać własne konto i zalogować się.";
	}
}


$page = new StronaGlowna();
$page->setSubpageName('Strona główna');
$page->render();
?>